<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Hello, world!</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="colum-4"></div>
            <div class="colum-4">
                <h1>Student Detail</h1>
                @foreach ($data as $id => $student)
                    <p> Name: {{ $student->name }}</p>
                    <p> Email: {{ $student->email }}</p>
                    <p> Age: {{ $student->age }}</p>
                    <p> City: {{ $student->city }}</p>
                    <p> Country: {{ $student->country }}</p>
                @endforeach
            </div>
            <div class="colum-4"></div>
        </div>
    </div>
</body>

</html>
