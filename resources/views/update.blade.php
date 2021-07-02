<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">   
            <div class="row">  
                <div class="col-6">
                    <h2>Edit Student </h2>
                            <form action ="{{ route('student.update', $std_edit)}}" method="post">
                                    @csrf
                                    @method('PUT')
                                <div class="form-group">
                                    <label for="Filename">Name</label>
                                    <input class="form-control" type="text" name="name" autocomplete="off" value ="{{$std_edit['name']}}" >
                                </div>

                                <div class="form-group">
                                    <label for="Description">Grade</label>
                                    <input class="form-control" type="text"  name="grade" autocomplete="off" value ="{{$std_edit['grade']}}" >
                                </div>     
                                <button type = "submit" class="btn btn-md btn-primary mt-1"}}> Update </button>
                            </form>            
                </div>
            </div>
        </div>
    </body>
</html>



