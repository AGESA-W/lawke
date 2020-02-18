@extends('layouts.app')

@section('content')
    <div class="container">
        @if(count($messages)>0)
            @foreach ($messages as $message)
                <input type="hidden" value="{{$message->id}}" id="mId{{$message->id}}">
                @if($message->status==0)
                    <div class="inbox" id="msg{{$message->id}}" style="background:#ccc;">
                        <ul class="list-unstyled px-3" style="font-size:15px">
                            <a  class="text-decoration-none " href="#" data-toggle="collapse" data-target="#d{{$message->id}}">
                                <li class="list-item">Message from:<b>{{$message->user->name}}</b></li>
                                <small class="text-secondary">Sent on:{{ date('d M, h:i a', strtotime($message->created_at)) }}</small>
                            </a>
                            <div class="collapse" id="d{{$message->id}}">{{$message->description}}</div>
                            <hr>
                        </ul>
                    </div>
                    @else
                    <div class="inbox">
                        <ul class="list-unstyled px-3" style="font-size:15px">
                            <a  class="text-decoration-none" href="#" data-toggle="collapse" data-target="#d{{$message->id}}">
                                <li class="list-item">Message from:<b>{{$message->user->name}}</b></li>
                                <small class="text-secondary mt-0">Received on:{{ date('d M, h:i a', strtotime($message->created_at)) }}</small>
                            </a>
                            <div class="collapse" id="d{{$message->id}}">
                                <p>{{$message->description}}</p>
                                <div class="sent">
                                    @foreach ($usermessages as $usermess)
                                        @if ( $usermess->message_id == $message->id)
                                            <ul class="list-unstyled">
                                                <li class="list-item sent-item mt-2">{{$usermess->description}}
                                                    <br>
                                                    <small class="text-secondary">{{ date('d M, h:i a', strtotime($usermess->created_a)) }}</small>
                                                </li>
                                                <div class="clearfix"></div>
                                            </ul>
                                            
                                        @endif
                                    @endforeach
                                </div>
                                <form action="{{route('user.send.message')}}" method="post">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <input class="form-control mt-2" type="text" name="description" placeholder="Type message....">
                                    </div>
                                    <input type="hidden" name="attorney_id" value="{{$message->attorney->id}}">
                                    <input type="hidden" name="user_id" value="{{$message->user->id}}">
                                    <input type="hidden" name="message_id" value="{{$message->id}}">

                                    <button type="submit" class="btn btn-success mt-1 px-4">Send</button>
                                </form>
                            </div>
                            
                            <hr>
                        </ul>
                    </div>

                @endif 
            @endforeach
            @else
            <p>no messages</p>
        @endif
    </div>
    <script>
        $(document).ready(function (){
            @foreach($messages as $message)
                $('#msg{{$message->id}}').click(function(){
                    var mId=$('#mId{{$message->id}}').val();
                    $.ajax({
                        type:'get',
                        data:'msgId='+mId,
                        url:'{{url('/updateInbox')}}',
                        success:function(response){
                            window.location.reload();
                            // $('#d{{$message->id}}').show();
                            // console.log(response);
                        }
                    });
                });
            @endforeach  
        });
    </script>
@endsection
