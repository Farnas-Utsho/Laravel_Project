<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class loginController extends Controller
{
    public function login(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            $credentials = $request->only('email', 'password');

            $user = DB::select('SELECT * FROM users WHERE email = ? LIMIT 1', [$credentials['email']]);

            if (!empty($user)) {
                if ($credentials['email'] == $user[0]->email) {
                    if (password_verify($credentials['password'], $user[0]->password) || ($credentials['password'] == $user[0]->password)) {
                        $role = $user[0]->role;
                        if ($role == "Student") {
                            return redirect()->intended('/home/' . $user[0]->id)->with('success', 'Login successful');
                        } else {
                            return redirect()->intended('/teacher/' . $user[0]->id)->with('success', 'Login successful');
                        }
                    } else {
                        throw ValidationException::withMessages(['password' => 'Incorrect password']);
                    }
                } else {
                    throw ValidationException::withMessages(['email' => 'Incorrect email']);
                }
            } else {
                throw ValidationException::withMessages(['email' => 'Incorrect email']);
            }
        } catch (ValidationException $e) {
            return redirect('/')
                ->withInput()
                ->withErrors($e->errors());
        }
    }
}


