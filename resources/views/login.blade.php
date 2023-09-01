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

<div style="padding-top: 30px" class="container">
    <h3>Login</h3>
    <hr>
    @if($errors->has('message_key'))
        <div class="alert alert-danger">
            {{ $errors->first('message_key') }}
        </div>
    @elseif(session()->has('password-change-success'))
        <div class="alert alert-success">
            {{ session()->get('password-change-success') }}
        </div>
    @endif


    <div class="container card-body">
        <form method="POST" action="{{route('login.submit')}}" enctype="multipart/form-data">
            @csrf

            <div class="form-row">

                <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Email <sup style="color: red">*</sup></label>
                    <input type="email" class="form-control" id="email" name="email" value=""
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
                </div>
                <div>
                    <a href="{{route('enter-email')}}">Forget password?</a>
                </div>
                <br>

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






