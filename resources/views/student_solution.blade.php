<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Solution View</title>
    <link rel="stylesheet" href="{{ asset('css/teacher_sol.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="header">
        <a href="#default" class="logo">
            <img src="Image/uiu.png" alt="Logo" class="img">
        </a>
        <div class="header-right">
       <a href="{{ route('home',$user_id) }}">Home</a>
            <input id="notification-count" type="text" class="notification-count" value="0" readonly>
            <a href="{{ route('st_solution', $user_id) }}">Solution</a>
           <a href="{{ route('student_meetlist',$user_id) }}">Meet Link</a>

            <a href="/" class="lg">Logout</a>
        </div>
    </div>

    <hr>

    <div class="uperbox">
        <div class="row">
            <div class="column-4">
                <table class="table">
                     @foreach ($data as $problem=>$x )
                    <tr>
                        <th>Solution Description</th>
                        <td class="td">
                            <textarea id="description" style="resize: none" name="des" placeholder="Problem description ..." value='{{ old('des') }}' readonly>{{ $x->response_text }}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>Suggested  Time</th>
                        <td class="td">
                            <input type="text" class="form-control" name="time" value="{{$x->formatted_requested_time  }}" readonly>
                        </td>
                    </tr>
                    <tr>
                        <th> Suggested  Date</th>
                        <td class="td">
                            <input type="date" class="form-control" name="date" value="{{$x->formatted_requested_date  }}" readonly>
                        </td>
                    </tr>
                    <tr>
                        <th style="font-weight:bolder">Document:</th>
                        <td class="td">
                            @if ($x->problem_path)
                            @if (pathinfo($x->problem_path, PATHINFO_EXTENSION) === 'pdf')
                             Display PDF embed or link
                             <embed src="{{ asset($x->problem_path) }}" type="application/pdf" width="600" height="400">
                            @else
                            {{-- Display image --}}
                             <img src="{{ asset($x->problem_path) }}" alt="Document Image" style="max-width: 100%; height: auto;">
                            @endif
                            @else
                            <span>No document available</span>
                            @endif
                        </td>

                    </tr>

                     @endforeach

                </table>
                  <tr><td colspan="2">
                        <input type="submit" class="form-control btn btn-warning btn-sm" name="btn" value="Download">
                    </td></tr>
                    <br>
                    <br>


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
