<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Homepage</title>
    <link rel="stylesheet" href="Css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


</head>
<body>
    <div class="header">
        <a href="#default" class="logo">CompanyLogo</a>
        <div class="header-right">
          <a  href="/">Home</a>
          <a href="/">Solution</a>
          <a href="/">Meet Link</a>
          <a href="/">Project</a>

          <a href="/" class="lg">Logout</a>

        </div>
      </div>


<div><h1 class="h1">Profile</h1>
    <div class="box-left">
        <div><img src="" alt="User Profile"></div>


    </div>
<div class="box-right">

    <div class="row">
        <div class="column-4">
            <table class="table table-bordered">
              <tr>
                <th>Course Code</th>
                <th>Solution</th>

              </tr>
              @foreach ($paginatedResults as $user=>$x )
                <tr>
                    <td class="td">{{ $x->user_id }}</td>
                    <td class="td">{{ $x->username }}</td>
                    <td class="td">{{ $x->first_name }}</td>
                    <td class="td">{{ $x->last_name }}</td>
                    <td class="td">{{ $x->gender }}</td>
                    <td class="td">{{ $x->password }}</td>
                </tr>
@endforeach

            </table>
            {{-- <div class="mt-5">{{ $data ->links('pagination::bootstrap-5')}}</div> --}}
          <div> {{ $paginatedResults->links() }}</div>
        </div>
    </div>
</div>
</div>






    <div class="footer">
        <p>Enhanching Education,Empowering Minds</p>
        <p><span>&copy</span>2023 Illusion.All rights reserved</p>
      </div>
</body>

</html>

