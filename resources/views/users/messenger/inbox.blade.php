@extends('layouts.app')

<style>
    .user-nav-tabs .nav-link.active {
        background-color: #fff;
        border-left: 3px solid #afa939;
        font-weight: 700;
        color: #000;

    }
    .user-nav-link{
        border: 1px solid #eaeced;
        color:#4A4A4A; 
        padding-left:20px; 
        text-align: left;
    }
    .user-nav-link:hover{
        color:#afa939; 
        
    }
    .inbox-row{
        border:1px solid #eaeced;
    }
    

</style>

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h5><b>Inbox</b> </h5>
           <div class="row">
               <div class="col-md-4">
                 @include('partials.usermessages_sidebar')
               </div>
               <div class="col-md-8">
                    <div class="card" style="width:800px;">
                        <div class="card-body">
                            @if (count($userMessages)<1)
                                <p class="mb-0">You inbox is empty !</p>
                            @endif
                            @foreach ($userMessages as $userMessage)
                                <input type="hidden" value="{{$userMessage->id}}" id="mId{{$userMessage->id}}">
                                @if ($userMessage->status=="1")
                                <div class="row inbox-row pt-2" id="msg{{$userMessage->id}}" style="background:#ccc;font-weight:bold;">
                                @else
                                    <div class="row inbox-row pt-2">
                                @endif
                                    <div class="col-md-4">
                                     <a href="/home/messenger/inbox/{{$userMessage->id}}" class="text-decoration-none">{{$userMessage->attorney->firstname}} {{$userMessage->attorney->lastname}}</a>
                                    </div>
                                    <div class="col-md-4">
                                        
                                        <a href="/home/messenger/inbox/{{$userMessage->id}}"  class="text-decoration-none">{{$userMessage->subject}}</a>
                                    </div>
                                    <div class="col-md-2">
                                        <small class="text-secondary mt-0">{{ date('d M, h:i a', strtotime($userMessage->created_at)) }}</small>
                                    </div>
                                    {{-- <div class="col-md-2">
                                        <form action="{{route('usermessage.delete',$userMessage->id)}}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger mb-2">Delete</button>
                                        </form>
                                        
                                    </div> --}}
                                </div> 
                            @endforeach
                          
                        </div>
                    </div>                                                                                                         
               </div>
           </div>
        </div>
    </div>
</div>

<script>
     $(document).ready(function (){
         @foreach($userMessages as $userMessage)
         $('#msg{{$userMessage->id}}').click(function(){
            var mId=$('#mId{{$userMessage->id}}').val();
                $.ajax({
                    type:'get',
                    data:'msgId='+mId,
                    url:'{{url('/updateUserInbox')}}',
                    success:function(response){
                        // window.location.reload();
                        $('#msg{{$userMessage->id}}').css("background", "#fff");
                    }
                });
            });
        @endforeach
        });
</script>
@endsection
