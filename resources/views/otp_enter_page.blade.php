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
    <h3>Enter OTP</h3>
    <hr>
    @if(session()->has('profile-update'))
        <div class="alert alert-success">
            {{ session()->get('profile-update') }}
        </div>

    @elseif(session()->has('otp-failed'))
        <div class="alert alert-danger">
            {{ session()->get('otp-failed') }}
        </div>
    @endif
    <div class="container card-body">
        <form method="POST" action="{{route('verify-otp')}}" enctype="multipart/form-data">
            @csrf

            <div class="form-row">

                <div class="form-group col-md-6">
                    <label>OTP <sup style="color: red">*</sup></label>
                    <input type="text" class="form-control" id="otp" name="otp"
                           placeholder="6-digit OTP">
                    <br>
                </div>

                <br>

            </div>
            <button type="submit" class='btn btn-primary'>Verify</button>
        </form>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

</body>
</html>






