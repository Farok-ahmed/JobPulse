<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Student table</title>
  </head>
  <body>
    <div class="container py-4 mt-4">
        <div class="row">
            <div class="colum-2"></div>
            <div class="colum-6">
                <h1>All Student </h1>
                <a href="{{ Route('add.student') }}" class="btn btn-primary mb-4">Add Student</a>
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Age</th>
                        <th>City</th>
                        <th>Country</th>
                        <th>View</th>
                        <th>Edit</th>
                        <th>Delete</th>

                    </tr>
                    @foreach ($data as $id=>$student )


                    <tr><td>{{ $student->id }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->age }}</td>
                        <td>{{ $student->city }}</td>
                        <td>{{ $student->country }}</td>
                        <td> <a href="{{ Route('view.student',$student->id ) }}" class="btn btn-primary">View</a></td>
                        <td> <a href="{{ Route('view.student',$student->id ) }}" class="btn btn-primary">Edit</a></td>
                        <td> <a href="{{ Route('view.student',$student->id ) }}" class="btn btn-primary">Delete</a></td>
                    </tr>
                    @endforeach
                </table>
                <div>
                    {{ $data->links() }};
                </div>
            </div>
            <div class="colum-2"></div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>


  </body>
</html>





