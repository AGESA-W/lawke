@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="user-wrapper">
                    <ul class="users">
                        @foreach ($users as $user)
                            <li class="user" id="{{$user->id}}">
                                {{-- will show unread messages count notification --}}
                                @if ($user->unread)
                                    <span class="pending">{{$user->unread}}</span>
                                @endif
                                <div class="media">
                                    <div class="media-left">
                                    <img src="/images/attorneys/man78.jpg" alt="" class="media-object" style="width:100px;height:100px;border-radius:50%;">
                                    </div>
                                    <div class="media-body">
                                        <p class="name">{{$user->name}}</p>
                                        <p class="email">{{$user->email}}</p>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-md-8" id="messages">
               
            </div>
        </div>
    </div>
    {{-- <style>
        ul{
            margin: 0;
            padding:0;
        }
        li{
            list-style: none;
        }
        .user-wrapper, .message-wrapper{
            border: 1px solid #dddddd;
            overflow-y: auto;
        }
        .user-wrapper{
            height:600px;
        }
        .user{
            cursor: pointer;
            padding: 5px 0;
            position: relative;
        }

        .user:hover{
            background: #eeeeee;
            color:#333;
        }
        .user:last-child{
            margin-bottom:0;
        }
        .pending{
            position:absolute;
            left:13px;
            top:5px;
            background:#b600ff;
            margin:0;
            border-radius:50%;
            width:20px;
            height:20px;
            line-height: 16px;
            padding-left: 5px;
            color:#ffffff;
            font-size:12px;
        }
        .media-left{
            margin-left:0 10px;
        }

        .media-body p{
            padding:6px 0;
        }
         .message-wrapper{
             padding:10px;
             height:536px;
             background:#eeeeee;
         }
         .messages .message{
             margin-bottom:15px;
         }
         .messages .message:last-child{
             margin-bottom:0;
         }
         .received, .sent{
             width:45%;
             padding:3px 10px;
             border-radius:10px;
         }
         .received{
             background:#ffffff;
         }
         .sent{
             background: #3bebff;
             float:right;
             text-align:right;
         }
         .message p{
             margin:5px 0;
         }
         .date{
             color: #777777;
             font-size:12px;
         }

         .active{
             background: #38c172;
             color:#ffffff;
         }

         input[type=text]{
             width:100%;
             padding:12px 20px;
             margin:15px 0 0 0;
             display:inline-block;
             border-radius:4px;
             box-sizing: border-box;
             outline: none;
             border: 1px solid #cccccc;
         }
         input[type=text]:focus{
             border:1px solid #aaaaaa;
         }
    </style> --}}

  

    {{-- <script>
        var receiver_id = '';
        var my_id = "{{ Auth::id() }}";
        $(document).ready(function(){
            // ajax setup form csrf token
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // Enable pusher logging - don't include this in production
            Pusher.logToConsole = true;

            var pusher = new Pusher('f2dc213d12fc52e61e51', {
            cluster: 'mt1',
            forceTLS: true
            });

            var channel = pusher.subscribe('my-channel');
            channel.bind('my-event', function(data) {
            // alert(JSON.stringify(data));
            if (my_id == data.from) {
                $('#' + data.to).click();
            } 
            else if (my_id == data.to) {
                if (receiver_id == data.from) {
                    // if receiver is selected, reload the selected user ...
                    $('#' + data.from).click();
                } 
                else {
                    // if receiver is not seleted, add notification for that user
                    var pending = parseInt($('#' + data.from).find('.pending').html());
                    if (pending) {
                        $('#' + data.from).find('.pending').html(pending + 1);
                    } 
                    else {
                        $('#' + data.from).append('<span class="pending">1</span>');
                    }
                }
            }
            }); 

            $('.user').click(function(){
                $('.user').removeClass('active');
                $(this).addClass('active');
                $(this).find('.pending').remove();
              
                receiver_id = $(this).attr('id');
                $.ajax({
                    type: "get",
                    url: "message/" + receiver_id, // need to create this route
                    data: "",
                    cache: false,
                    success: function (data) {
                        $('#messages').html(data);
                        scrollToBottomFunc();
                    }
                });
            });

            $(document).on('keyup', '.input-text input', function (e) {
                var message = $(this).val();
                // check if enter key is pressed and message is not null also receiver is selected
                if (e.keyCode == 13 && message != '' && receiver_id != '') {
                    $(this).val(''); // while pressed enter text box will be empty
                    var datastr = "receiver_id=" + receiver_id + "&message=" + message;
                    $.ajax({
                        type: "post",
                        url: "message", // need to create this post route
                        data: datastr,
                        cache: false,
                        success: function (data) {
                        },
                        error: function (jqXHR, status, err) {
                        },
                        complete: function () {
                            scrollToBottomFunc();
                        }
                    })
                }
            });
        });

        // make a function to scroll down auto
        function scrollToBottomFunc() {
            $('.message-wrapper').animate({
                scrollTop: $('.message-wrapper').get(0).scrollHeight
            }, 50);
        }
    </script> --}}
@endsection
