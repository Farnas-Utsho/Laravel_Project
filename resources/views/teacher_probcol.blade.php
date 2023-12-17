<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Counseling Time Request</title>
    <link rel="stylesheet" href="{{ asset('css/teacher_sol.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="header">
        <a href="#default" class="logo">
            <img src="Image/uiu.png" alt="Logo" class="img">
        </a>
        <div class="header-right">
             <a href="{{ route('teacher', $user_id) }}">Home</a>

            <input id="notification-count" type="text" class="notification-count" value="0" readonly>
            <a href="{{ route('request_list',$user_id) }}">Request</a>
               <a href="{{ route('meet',$user_id) }}">Meet Link</a>
            <a href="/" class="lg">Logout</a>
        </div>
    </div>
    <h3 style="text-align: center">Solution description</h3>
    <hr>



    <div class="uperbox">

        @if(Session::has('success'))
    <div id="successMessage" class="alert alert-success">
        {{ Session::get('success') }}
    </div>

    <script>
        // Add a delay and then hide the success message
        setTimeout(function(){
            document.getElementById('successMessage').style.display = 'none';
        }, 1000); // Adjust the delay time in milliseconds (e.g., 1000ms = 1 second)
    </script>
@endif
                <form action="{{ route('solution') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <div class="row">
                        <div class="column-4">
                            <table class="table">
                                <tr>
                        <input type="hidden" class="form-control" name="user_id" value="{{ request('user_id') }}">
                        <input type="hidden" class="form-control" name="student_id" value="{{ request('student_id') }}">
                        <input type="hidden" class="form-control" name="problem_id" value="{{ request('problem_id') }}">
                                <tr>
                                    <th>Problem Description</th>
                                    <td><textarea id="description" style="resize: none" name="des" placeholder="Enter your description here..." value='{{ old('des') }}' ></textarea></td>
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
                                 <tr>
                                    <th>Meet Link</th>
                                    <td><input type="text" class="form-control" name="meet" placeholder="Provide Meet link here"></td>
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
    </div>
    </div>



    <div class="footer">
        <p>Enhancing Education, Empowering Minds</p>
        <p><span>&copy;</span>2023 Illusion. All rights reserved</p>
    </div>
</body>
<script>
    var count = {{ $count[0]->count }};
    document.getElementById('notification-count').value = count;
</script>

</html>
