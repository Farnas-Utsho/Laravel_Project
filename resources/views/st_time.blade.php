<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Homepage</title>
    <link rel="stylesheet" href="{{ asset('css/st_time.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="header">
        <a href="#default" class="logo">
            <img src="Image/uiu.png" alt="Logo" class="img">
        </a>
        <div class="header-right">
            <a href="/">Home</a>
            <a href="/">Solution</a>
            <a href="/">Virtual Communication</a>
            <a href="/">Project</a>
            <a href="/" class="lg">Logout</a>
        </div>
    </div>

    <div class="container">
        <!-- Faculty Routine Table -->
        <h1 class="h1">Faculty Routine</h1>
        <div class="uperbox">
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
                        </tr>
                    
                        @foreach ($data as $user=>$x )
                        <tr>
                            <td class="td">{{ $x->course_id }}</td>
                            <td class="td">{{ $x->course_name }}</td>
                            <td class="td">{{ $x->section_name }}</td>
                            <td class="td">{{ $x->day_of_week }}</td>
                            <td class="td">{{ $x->start_time }}</td>
                            <td class="td">{{ $x->end_time }}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>

        <!-- Form for Submitting the Problem -->
        <div class="lowerbox">
            <form action="{{ route('info') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <div class="row">
                        <div class="column-4">
                            <table class="table">
                                <tr>
                                    <!-- Right Box For Submitting the problem -->
                                </tr>
                                <tr>
                                    <th>Problem Description</th>
                                    <td><textarea id="description" style="resize: none" name="des" placeholder="Enter your description here...">{{ old('des') }}</textarea></td>
                                </tr>
                                <tr>
                                    <th>Document</th>
                                    <td><input type="file" class="form-control" name="doc" placeholder="Upload document"></td>
                                </tr>
                                <tr>
                                    <th>Select Time</th>
                                    <td><input type="time" class="form-control" name="time"></td>
                                </tr>
                                <tr>
                                    <th>Date</th>
                                    <td><input type="date" class="form-control" name="date"></td>
                                </tr>
                            </table>
                            <tr>
                                <td colspan="2"><input type="submit" class="form-control btn btn-warning btn-sm" name="btn" value="Submit"></td>
                            </tr>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="footer">
        <p>Enhancing Education, Empowering Minds</p>
        <p><span>&copy;</span>2023 Illusion. All rights reserved</p>
    </div>
</body>

</html>
