@extends('layouts.app')
@section('content')
    @if(count($usermessages)>0)
        @foreach ($usermessages as $usermess)
            <input type="hidden" value="{{$usermess->id}}" id="mId{{$usermess->id}}">
            @if($usermess->status==0)
                <div class="inbox" id="msg{{$usermess->id}}" style="background:#ccc;">
                    <ul class="list-unstyled px-3" style="font-size:15px">
                        <a  class="text-decoration-none " href="#" data-toggle="collapse" data-target="#d{{$usermess->id}}">
                            <li class="list-item">Message from:<b>{{$usermess->user->name}}</b></li>
                            <small class="text-secondary">Sent on:{{ date('d M, h:i a', strtotime($usermess->created_at)) }}</small>
                        </a>
                        <div class="collapse" id="d{{$usermess->id}}">{{$usermess->description}}</div>
                        <hr>
                    </ul>
                </div>
                @else
                <div class="inbox">
                        <ul class="list-unstyled">
                        <a  class="text-decoration-none" href="#" data-toggle="collapse" data-target="#d{{$usermess->id}}">
                            <li class="list-item">Message from:<b>{{$usermess->attorney->firstname}} {{$usermess->attorney->lastname}}</b> </li>           
                        </a>
                        <hr>
                        <div class="collapse" id="d{{$usermess->id}}">
                            <div class="received">
                                @foreach ($messages as $message)
                                    @if ( $usermess->message_id == $message->id)
                                        <ul class="list-unstyled">
                                            <li class="list-item received-item mt-2">{{$message->description}}
                                                <br>
                                                <small class="text-secondary">sent on:{{ date('d M, h:i a', strtotime($message->created_a)) }}</small>
                                            </li>
                                            <div class="clearfix"></div>
                                        </ul>
                                    @endif
                                @endforeach
                                <ul class="list-unstyled">
                                    <li class="list-item sent-item"> <p>{{$usermess->description}}</p>
                                        <small class="text-secondary mt-0">Received on:{{ date('d M, h:i a', strtotime($usermess->created_at)) }}</small>
                                    </li>
                                    <div class="clearfix"></div>
                                </ul>
                            </div>
                            <form action="{{route('send.message')}}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input class="form-control mt-2" type="text" name="description" placeholder="Type message....">
                                </div>
                                <input type="hidden" name="attorney_id" value="{{$usermess->attorney->id}}">
                                    <input type="hidden" name="user_id" value="{{$usermess->user->id}}"> 
                                {{-- <input type="hidden" name="message_id" value="{{$message->id}}">  --}}
                                <button type="submit" class="btn btn-success mt-1 px-4">Send</button>
                            </form>

                        </div>
                    </ul>
                </div>
                
            @endif
        @endforeach
        @else
        <p>No messages found</p>
    @endif
    <script>
        $(document).ready(function (){
            @foreach($usermessages as $usermess)
                $('#msg{{$usermess->id}}').click(function(){
                    var mId=$('#mId{{$usermess->id}}').val();
                    $.ajax({
                        type:'get',
                        data:'msgId='+mId,
                        url:'{{url('/updateUserInbox')}}',
                        success:function(response){
                            window.location.reload();
                            // console.log(response);
                        }
                    });
                });
            @endforeach  
        });
    </script>   
@endsection