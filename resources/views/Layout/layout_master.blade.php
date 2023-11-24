<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Homepage</title>
    <link rel="stylesheet" href="Css/style.css">

</head>
<body>
    <div class="header">
        <a href="#default" class="logo">CompanyLogo</a>
        <div class="header-right">
          <a  href="/">Home</a>
          <a href="/">Solution</a>
          <a href="/">Virtual Communication</a>
          <a href="/">Project</a>

          <a href="/" class="lg">Logout</a>

        </div>
      </div>
    @yield('body')

    <div class="box-left"></div>
    <div class="box-right"></div>



    {{-- <footer>
        <p>Enhancing Education ,Empowering Minds</p>
        <p>2023 Illusion.All rights reserved</p>
    </footer> --}}
    <div class="footer">
        <p>Enhanching Education,Empowering Minds</p>
        <p><span>&copy</span>2023 Illusion.All rights reserved</p>
      </div>
</body>

</html>
