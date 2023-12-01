<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Homepage</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="header">
        <a href="#default" class="logo"><img src="Image/uiu.png" alt="Logo" class="img"></a>
        <div class="header-right">
            <a href="/">Home</a>
            <a href="/">Solution</a>
            <a href="/">Virtual Communication</a>
            <a href="/">Project</a>
            <a href="{{ route('login') }}" class="lg">Logout</a>
        </div>
    </div>

    <div>
        <h1 class="h1">Profile</h1>
        <div class="box-left">
            <div><img src="Image/profile.jpg" alt="Picture" class="image"></div>
            <div class="profile">
                {{-- Profile information goes here --}}
            </div>
        </div>

        <div class="box-right">
            <div class="row">
                <div class="column-4">
                    <table class="table table-bordered">
                        <tr>
                            <th>Course Code</th>
                            <th>Course Name</th>
                            <th>Section Name</th>
                            <th>Day</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Faculty</th>
                        </tr>
                        @foreach ($data as $user=>$x)
                            <tr>
                                <td class="td">{{ $x->course_id }}</td>
                                <td class="td">{{ $x->course_name }}</td>
                                <td class="td">{{ $x->section_name }}</td>
                                <td class="td">{{ $x->day_of_week }}</td>
                                <td class="td">{{ $x->start_time }}</td>
                                <td class="td">{{ $x->end_time }}</td>
                                <td class="td">{{ $x->teacher_name }}</td>
                                <td><a href="{{ route('problem',$x->teacher_id) }}" class="btn btn-primary btn-sm">View</a></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <p>Enhancing Education, Empowering Minds</p>
        <p><span>&copy;</span>2023 Illusion. All rights reserved</p>
    </div>
</body>
</html>
