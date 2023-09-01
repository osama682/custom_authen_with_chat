<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>
<body>

<div class="container">
    <h3>Create Employee</h3>
    <hr>
    <div class="container card-body">
        <form method="POST" action="{{route('register.submit')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Name <sup style="color: red">*</sup></label>
                    <input type="text" class="form-control" id="name" name="name" value=""
                           placeholder="First Name">
                    <br>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Username <sup style="color: red">*</sup></label>
                    <input type="text" class="form-control" id="username" name="username" value=""
                           placeholder="Enter username">
                    <br>
                </div>
                <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Email <sup style="color: red">*</sup></label>
                    <input type="text" class="form-control" id="email" name="email" value=""
                           placeholder="Enter E-Mail">
                    <br>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Password <sup style="color: red">*</sup></label>
                        <input type="password" class="form-control" id="password" name="password" value=""
                               placeholder="Enter password">
                        <br>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Confirm Password <sup style="color: red">*</sup></label>
                        <input type="password" class="form-control" name="password_confirmation" value=""
                               placeholder="Re Enter password">
                        <br>
                    </div>
                </div>
            </div>
            <button class='btn btn-primary'>Add</button>
        </form>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

</body>
</html>






