<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Custom Authentication</title>

    <link rel="stylesheet" href="{{ asset('Css/login.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body style="background-image: url('Image/login.jpg'); background-size: cover; background-position: center;">

    <header>
        <div class="motto-container">
            <h1 class="motto">Guiding success through every counseling hour</h1>
        </div>
    </header>

    <div class="left"></div>

    <div class="right">
        <h4 id="h4">Login </h4>
        <hr style="color: black ">
        <form action="{{ route('check') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control"  placeholder="Enter Email" name="email"value="{{ old('email') }}" required
                    style="background-color: transparent; padding: 10px;" value="{{ old('email') }}" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" placeholder="Enter Password"value="" name="password"
                    style="background-color: transparent;padding: 10px;"  value="{{ old('password') }}" required>
            </div>
            <br>
            <div class="form-group">
                <button class="btn btn-block btn-primary" type="submit">Log In</button>
            </div>

            <a href="{{ url('/forgot-password') }}"  style="color: rgb(41, 37, 37); font-weight: bolder">Forgot Password? Click Here</a>
        </form>
    </div>

    <script>
        // Clear input fields when the page is loaded
        window.onload = function() {
            document.getElementById('email').value = '';
            document.getElementById('password').value = '';
        };
    </script>

</body>

</html>
