<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>
<body>
<div style="padding-top: 30px" class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="list-group">
                @foreach($users as $user)
                    <div style="margin: 10px;box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.1);" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        <div>
                            <img height="50px" style="border-radius: 50%" src="data:image/jpeg;base64,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" alt="image">
                            <span class="font-weight-bold">{{$user->name}}</span>
                            <p style="padding: 10px 0 0 50px; color: grey">
                                3 minutes ago
                            </p>
                        </div>
                        <form method="POST" action="{{route('start.chat',['user' => $user, 'sender' => $sender])}}">
                            @csrf
                            <button type="submit" class="btn btn-primary">Chat</button>
                        </form>
                    </div>
                @endforeach



            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>













