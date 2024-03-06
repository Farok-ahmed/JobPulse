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
    <div class="container pt-4 mt-4">
        <div class="row">
            <div class="colum-3">
                <h1 class="mb-4">Add Student</h1>
            </div>
            <div class="colum-6">
                <form>
                    <div class="mb-3">
                        <label for="studentName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="studentName">
                      </div>
                    <div class="mb-3">
                      <label for="studentEmail" class="form-label">Email address</label>
                      <input type="email" class="form-control" id="studentEmail" >
                    </div>
                    <div class="mb-3">
                      <label for="studentAge" class="form-label">Age</label>
                      <input type="number" class="form-control" id="studentAge">
                    </div>
                    <div class="mb-3">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control" id="city" >
                      </div>
                      <div class="mb-3">
                        <label for="country" class="form-label">Country</label>
                        <input type="text" class="form-control" id="country" >
                      </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
            <div class="colum-3"></div>
        </div>
    </div>

</body>
</html>

