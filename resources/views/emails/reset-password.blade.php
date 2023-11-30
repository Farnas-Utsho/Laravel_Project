{{-- Click here to reset your password: {{ route('reset-password/'.$token) }} --}}
<!-- resources/views/emails/reset-password.blade.php -->
Click here to reset your password: {{ route('password.reset', ['token' => $token]) }}
