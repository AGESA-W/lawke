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
            <h5><b>All Messages</b></h5>
           <div class="row">
               <div class="col-md-4">
                 @include('partials.messages_sidebar')
               </div>
               <div class="col-md-8">
                    <div class="card" style="width:800px;">
                        <div class="card-body">
                            @if (count($attorneyMessages) <1 && count($userMessages) <1)
                                <p class="mb-0">You have no messages!</p>
                            @endif
                            @foreach ($attorneyMessages as $attorneyMessage)
                                <input type="hidden" value="{{$attorneyMessage->id}}" id="mId{{$attorneyMessage->id}}">
                                @if ($attorneyMessage->status=="1")
                                <div class="row inbox-row pt-2" id="msg{{$attorneyMessage->id}}" style="background:#ccc;font-weight:bold;">
                                @else
                                    <div class="row inbox-row pt-2">
                                @endif
                                    <div class="col-md-4">
                                    <a href="/attorney_dashboard/messenger/inbox/{{$attorneyMessage->id}}" class="text-decoration-none">{{$attorneyMessage->user->name}} {{$attorneyMessage->user->lastname}}</a>
                                    </div>
                                    <div class="col-md-4">
                                        
                                        <a href="/attorney_dashboard/messenger/inbox/{{$attorneyMessage->id}}"  class="text-decoration-none">{{$attorneyMessage->subject}}</a>
                                    </div>
                                    <div class="col-md-2">
                                        <small class="text-secondary mt-0">{{ date('d M, h:i a', strtotime($attorneyMessage->created_at)) }}</small>
                                    </div>
                                    {{-- <div class="col-md-2">
                                        <button class="btn-danger btn-sm btn mb-2"> <span class="fa fa-trash"></span> Delete</button>
                                    </div> --}}
                                </div> 
                            @endforeach
                            @foreach ($userMessages as $userMessage)
                                <div class="row inbox-row pt-2">
                                    <div class="col-md-4">
                                    <a href="/attorney_dashboard/messenger/outbox/{{$userMessage->id}}" class="text-decoration-none">{{$userMessage->user->name}} {{$userMessage->user->lastname}}</a>
                                    </div>
                                    <div class="col-md-4">
                                        
                                        <a href="/attorney_dashboard/messenger/outbox/{{$userMessage->id}}"  class="text-decoration-none">{{$userMessage->subject}}</a>
                                    </div>
                                    <div class="col-md-2">
                                        <small class="text-secondary mt-0">{{ date('d M, h:i a', strtotime($userMessage->created_at)) }}</small>
                                    </div>
                                    {{-- <div class="col-md-2">
                                        <button class="btn-danger btn-sm btn mb-2">Delete</button>
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
        @foreach($attorneyMessages as $attorneyMessage)
        $('#msg{{$attorneyMessage->id}}').click(function(){
        var mId=$('#mId{{$attorneyMessage->id}}').val();
            $.ajax({
                type:'get',
                data:'msgId='+mId,
                url:'{{url('/updateLawyerInbox')}}',
                success:function(response){
                    // window.location.reload();
                    $('#msg{{$attorneyMessage->id}}').css("background", "#fff");
                }
            });
        });
    @endforeach
    });
</script>
@endsection
