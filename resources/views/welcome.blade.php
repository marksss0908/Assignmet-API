<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body class = "w-100 p-3">
        <div class="container">
            <div class="row">
                <div class="col-12">
                @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                @if(Session::has('deleted'))
                    <div class="alert alert-danger" role="alert">
                        {{ Session::get('deleted') }}
                    </div>
                @endif
                </div>
            </div>

            <div class="row">  
                <div class="col-6">
                <h2>Student List</h2>
                    <table class="table table-success table-striped">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Grade</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($students as $student)
                                <tr>
                                    <td>{{$student['id']}}</td>
                                    <td>{{$student['name']}}</td>
                                    <td>{{$student['grade']}}</td>
                                    <!-- edit route button give the whole object student to method edit-->
                                    <td>
                                    <a class="btn btn-sm btn-primary btn-action" href="{{route ('student.edit', $student)}}"> Edit </a>
                                    </td>
                                    <!-- delete function give the whole object student -->
                                    <td>
                                    <form action="{{ route('student.destroy', $student) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class = "btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-6">
                    <h2>Insert Student</h2>
                    <form action="{{ route('student.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                        <label>Email address</label>
                        <input class="form-control" type="text" name="name" placeholder="Name">
                        </div>

                        <div class="form-group">
                        <label>Grade</label>
                        <input class="form-control" type="text" name="grade" placeholder="Grade"> 

                        <button type="submit" class = "btn btn-sm btn-primary mt-1">Save</button>
                        </div>
                    </form>
                </div>
            </div>


        </div>
    </body>
</html>
