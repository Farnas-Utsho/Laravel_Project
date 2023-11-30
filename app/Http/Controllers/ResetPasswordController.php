<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\User;

class ResetPasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'User not found']);
        }

        // Generate a reset token
        $token = Str::random(60);
        $user->update([
            'reset_token' => $token,
            'reset_token_expiry' => now()->addHour(), // You can adjust the expiration time as needed
        ]);

        // Send the reset email
        Mail::to($user->email)->send(new \App\Mail\ResetPassword($user));

        return back()->with('status', 'Reset link sent to your email');
    }

    public function showResetForm($token)
    {
        $user = User::where('reset_token', $token)
            ->where('reset_token_expiry', '>', now())
            ->first();

        if (!$user) {
            return redirect('/')->withErrors(['token' => 'Invalid token']);
        }

        return view('auth.passwords.reset', ['token' => $token]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

      $user = User::where('reset_token',$request->token)
    ->where('reset_token_expiry', '>', now())
      ->first();



        if (!$user) {
            return redirect('/')->withErrors(['token' => 'Invalid token']);
        }

        $user->update([
            'password' => Hash::make($request->password),
            'reset_token' => null,
            'reset_token_expiry' => null,
        ]);

        return redirect('/')->with('status', 'Password reset successfully');
    }
}
