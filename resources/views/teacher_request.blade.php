<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Request List</title>
    <link rel="stylesheet" href="{{ asset('css/request_list.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="header">
                                <a href="#default" class="logo"><img src="{{ asset('Image/uiu.png') }}" alt="Logo" class="img"></a>

        <div class="header-right">
             <a href="{{ route('teacher', $user_id) }}">Home</a>

    <input id="notification-count" type="text" class="notification-count" value="0" readonly>
    <a href="{{ route('request_list',$user_id) }}">Request</a>


            <a href="{{ route('meet',$user_id) }}">Meet Link</a>

            <a href="{{ route('login') }}" class="lg">Logout</a>
        </div>
    </div>

    <div>

        <h3 style="text-align: center">Request List</h3>

        <div class="box-right">
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
            <div class="row">
                <div class="column-4">
                    <table class="table table-bordered">
                        <tr>
                                {{-- <h1>{{ $id }}</h1> --}}
                             <th>Student Id</th>
                            <th>Course Code</th>
                            <th>Course Name</th>
                            <th>Section</th>
                            <th>Status</th>

                        </tr>
                        @foreach ($data as $user=>$x)
                            <tr>
                                <td class="td">{{ $x->student_id }}</td>
                                <td class="td">{{ $x->course_id }}</td>
                                <td class="td">{{ $x->course_name }}</td>
                                <td class="td">{{ $x->s_name }}</td>
                                @if ($x->solved ==1)
                                        <td class="td">Pending</td>
                                    @else
                                    <td class="td"> Solved</td>
                                @endif
                                          <td><a href="{{ route('problem', ['user_id' => $user_id, 'student_id' => $x->student_id,'problem_id'=>$x->problem_id]) }}"class="btn btn-primary btn-sm">View</a></td>
                                           <td><a href="{{ route('del_reqst', ['user_id' => $user_id, 'student_id' => $x->student_id,'problem_id'=>$x->problem_id]) }}" class="btn btn-danger btn-sm">Delete</a></td>

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
     <script>

      var count = {{ $count[0]->count }}; //

    // Update the textarea value with the count
    document.getElementById('notification-count').value = count;
</script>
</body>
</html>
