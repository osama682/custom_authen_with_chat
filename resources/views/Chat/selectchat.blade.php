<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">


    <title>messages chat widget - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        body {
            margin-top: 20px;
            background: #ebeef0;
        }

        .panel {
            box-shadow: 0 2px 0 rgba(0, 0, 0, 0.075);
            border-radius: 0;
            border: 0;
            margin-bottom: 24px;
        }

        .panel .panel-heading, .panel > :first-child {
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }

        .panel-heading {
            position: relative;
            height: 50px;
            padding: 0;
            border-bottom: 1px solid #eee;
        }

        .panel-control {
            height: 100%;
            position: relative;
            float: right;
            padding: 0 15px;
        }

        .panel-title {
            font-weight: normal;
            padding: 0 20px 0 20px;
            font-size: 1.416em;
            line-height: 50px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .panel-control > .btn:last-child, .panel-control > .btn-group:last-child > .btn:first-child {
            border-bottom-right-radius: 0;
        }

        .panel-control .btn, .panel-control .dropdown-toggle.btn {
            border: 0;
        }

        .nano {
            position: relative;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        .nano > .nano-content {
            position: absolute;
            overflow: scroll;
            overflow-x: hidden;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
        }

        .pad-all {
            padding: 15px;
        }

        .mar-btm {
            margin-bottom: 15px;
        }

        .media-block .media-left {
            display: block;
            float: left;
        }

        .img-sm {
            width: 46px;
            height: 46px;
        }

        .media-block .media-body {
            display: block;
            overflow: hidden;
            width: auto;
        }

        .pad-hor {
            padding-left: 15px;
            padding-right: 15px;
        }

        .speech {
            position: relative;
            background: #b7dcfe;
            color: #317787;
            display: inline-block;
            border-radius: 0;
            padding: 12px 20px;
        }

        .speech:before {
            content: "";
            display: block;
            position: absolute;
            width: 0;
            height: 0;
            left: 0;
            top: 0;
            border-top: 7px solid transparent;
            border-bottom: 7px solid transparent;
            border-right: 7px solid #b7dcfe;
            margin: 15px 0 0 -6px;
        }

        .speech-right > .speech:before {
            left: auto;
            right: 0;
            border-top: 7px solid transparent;
            border-bottom: 7px solid transparent;
            border-left: 7px solid #ffdc91;
            border-right: 0;
            margin: 15px -6px 0 0;
        }

        .speech .media-heading {
            font-size: 1.2em;
            color: #317787;
            display: block;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
            margin-bottom: 10px;
            padding-bottom: 5px;
            font-weight: 300;
        }

        .speech-time {
            margin-top: 20px;
            margin-bottom: 0;
            font-size: .8em;
            font-weight: 300;
        }

        .media-block .media-right {
            float: right;
        }

        .speech-right {
            text-align: right;
        }

        .pad-hor {
            padding-left: 15px;
            padding-right: 15px;
        }

        .speech-right > .speech {
            background: #ffda87;
            color: #a07617;
            text-align: right;
        }

        .speech-right > .speech .media-heading {
            color: #a07617;
        }

        .btn-primary, .btn-primary:focus, .btn-hover-primary:hover, .btn-hover-primary:active, .btn-hover-primary.active, .btn.btn-active-primary:active, .btn.btn-active-primary.active, .dropdown.open > .btn.btn-active-primary, .btn-group.open .dropdown-toggle.btn.btn-active-primary {
            background-color: #579ddb;
            border-color: #5fa2dd;
            color: #fff !important;
        }

        .btn {
            cursor: pointer;
            /* background-color: transparent; */
            color: inherit;
            padding: 6px 12px;
            border-radius: 0;
            border: 1px solid 0;
            font-size: 11px;
            line-height: 1.42857;
            vertical-align: middle;
            -webkit-transition: all .25s;
            transition: all .25s;
        }

        .form-control {
            font-size: 11px;
            height: 100%;
            border-radius: 0;
            box-shadow: none;
            border: 1px solid #e9e9e9;
            transition-duration: .5s;
        }

        .nano > .nano-pane {
            background-color: rgba(0, 0, 0, 0.1);
            position: absolute;
            width: 5px;
            right: 0;
            top: 0;
            bottom: 0;
            opacity: 0;
            -webkit-transition: all .7s;
            transition: all .7s;
        }
    </style>
</head>
<body>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
    <div class="col-md-12">
        <div class="panel">

            <div class="panel-heading">
                <div class="panel-control">
                    <div class="btn-group">
                        <button class="btn btn-default" type="button" data-toggle="collapse"
                                data-target="#demo-chat-body"><i class="fa fa-chevron-down"></i></button>
                    </div>
                </div>
                <p style="display: none" id="unique_receiver_id">{{$user->id}}</p>
                <h3 class="panel-title">Chat of <b>{{session('user')->name}}</b> with <b>{{$user->name}}</b></h3>
            </div>


            <div id="demo-chat-body" class="collapse in">
                <div class="nano has-scrollbar" style="height:380px">

                    <div class="nano-content messages pad-all" tabindex="0">
                        <ul class="list-unstyled media-block">
                            @foreach($messages as $message)
                                <input style="display: none" class="final-try-2" value="{{$message->sender_id}}">
                                <input style="display: none" class="final-try" value="{{$message->receiver_id}}">
                                @if(session('user')->id === $message->sender_id)
                                    <li class="mar-btm message">
                                        <div class="media-right">
                                            <img src="https://bootdey.com/img/Content/avatar/avatar2.png"
                                                 class="img-circle img-sm" alt="Profile Picture">
                                        </div>
                                        <div class="media-body pad-hor speech-right">
                                            <div class="speech">
                                                <h4>{{$message->message}}</h4>
                                                <p class="speech-time">
                                                    <i class="fa fa-clock-o fa-fw"></i>{{$message->created_at->diffForHumans()}}
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                @else
                                    <li class="mar-btm receive-msg">
                                        <div class="media-left">
                                            <img src="https://bootdey.com/img/Content/avatar/avatar1.png"
                                                 class="img-circle img-sm" alt="Profile Picture">
                                        </div>
                                        <div class="media-body pad-hor">
                                            <div class="speech">
                                                <h4>{{$message->message}}</h4>
                                                <p class="speech-time">
                                                    <i class="fa fa-clock-o fa-fw"></i>{{$message->created_at->diffForHumans()}}
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                @endif
                            @endforeach

                        </ul>
                    </div>
                    <div class="nano-pane">
                        <div class="nano-slider" style="height: 141px; transform: translate(0px, 0px);"></div>
                    </div>
                </div>

                <div class="panel-footer">
                    <div class="row">
                        <div class="col-xs-9">
                            <input style="display:none;" class="form-control sender-id" id="sender-receiver-id"
                                   value={{session('user')->id}}>
                            <input style="display: none" class="form-control user-id" value="{{$user->id}}">
                            <input type="text" placeholder="Enter your text"
                                   class="form-control chat-input user-message">
                        </div>
                        <div class="col-xs-3">
                            <button class="btn btn-primary btn-block submit" type="submit">Send</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script type="text/javascript">

    const pusher = new Pusher('{{config('broadcasting.connections.pusher.key')}}', {cluster: 'ap2'});
    const channel = pusher.subscribe('public');


    $(document).ready(function () {
        var receiver_id = $('#unique_receiver_id').text();

        channel.bind('chat', function (response) {
            console.log(response)
            var sender_id = $('.sender-id').val();

            var final_try = $('.final-try').val();
            var final_try_2 = $('.final-try-2').val();
            console.log(final_try)
            if (final_try === response.user_id || final_try_2 === response.user_id) {
                let data = {
                    '_token': '{{csrf_token()}}',
                    'message': response.message,
                    'receiver_id': receiver_id,
                }
                let url = '{{route('receive')}}'
                $.post(url, data, function (response) {
                    var msg = response.message;
                    var receiceMsg = $('<ul class="list-unstyled media-block">' +
                        '<li class="mar-btm">' +
                        '<div class="media-left">' +
                        '<img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="img-circle img-sm" alt="Profile Picture">' +
                        '</div>' +
                        '<div class="media-body pad-hor">' +
                        '<div class="speech">' +
                        '<h4>' + msg + '</h4>' +
                        '<p class="speech-time">' +
                        '<i class="fa fa-clock-o fa-fw"></i>just now' +
                        '</p>' +
                        '</div>' +
                        '</div>' +
                        '</li>' +
                        '</ul>');

                    $('.messages').append(receiceMsg)
                    $(".messages > .receive-msg").last().after(response);
                    $(document).scrollTop($(document).height());


                });
            }


        });

        $('.submit').click(function () {
            // event.preventDefault();
            var message = $('.user-message').val();
            var user_id = $('.user-id').val();
            var sender_id = $('.sender-id').val()

            var url = '{{route('broadcast')}}';
            $.ajaxSetup({
                headers: {
                    'X-Socket-Id': pusher.connection.socket_id
                }
            });
            let data = {
                '_token': '{{csrf_token()}}',
                'message': message,
                'user_id': user_id,
                'sender_id': sender_id,
            }

            $.post(url, data, function (response) {
                var message = response.message['message'];
                var listItem = $('<ul class="list-unstyled media-block">' +
                    '<li class="mar-btm message">' +
                    '<div class="media-right">' +
                    '<img src="https://bootdey.com/img/Content/avatar/avatar2.png" class="img-circle img-sm" alt="Profile Picture">' +
                    '</div>' +
                    '<div class="media-body pad-hor speech-right">' +
                    '<div class="speech">' +
                    '<h4>' + message + '</h4>' +
                    '<p class="speech-time">' +
                    '<i class="fa fa-clock-o fa-fw"></i> Just now' + // You can set the timestamp as needed
                    '</p>' +
                    '</div>' +
                    '</div>' +
                    '</li>' +
                    '</ul>');


                $('.messages').append(listItem)
                $(".messages > .message").last().after(response);
                $(document).scrollTop($(document).height());
                $('.user-message').val('');
            });
        });
    });

</script>
</body>
</html>
