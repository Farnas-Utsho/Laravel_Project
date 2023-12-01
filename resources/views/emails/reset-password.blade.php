{{-- Click here to reset your password: {{ route('reset-password/'.$token) }} --}}
<!-- resources/views/emails/reset-password.blade.php -->
{{-- Click here to reset your password: {{ route('password.reset', ['token' => $token]) }} --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .reset-container {
            text-align: center;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="reset-container">
    <h1>Password Reset</h1>

    <p>Click the button below to reset your password:</p>

    <a href="{{ route('password.reset', ['token' => $token]) }}" class="button">Reset Password</a>
</div>

</body>
</html>


