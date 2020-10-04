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
            <h5><b>Outbox</b> </h5>
           <div class="row">
               <div class="col-md-4">
                 @include('partials.usermessages_sidebar')
               </div>
               <div class="col-md-8">
                    <div class="card" style="width:800px;">
                        <div class="card-body">
                            @if (count($attorneyMessages)<1)
                                <p class="mb-0">You outbox is empty !</p>
                            @endif
                            @foreach ($attorneyMessages as $attorneyMessage)
                                <div class="row inbox-row pt-2">
                                    <div class="col-md-4">
                                     <a href="/home/messenger/outbox/{{$attorneyMessage->id}}" class="text-decoration-none">To:{{$attorneyMessage->attorney->firstname}} {{$attorneyMessage->attorney->lastname}}</a>
                                    </div>
                                    <div class="col-md-4">
                                        
                                        <a href="/home/messenger/outbox/{{$attorneyMessage->id}}"  class="text-decoration-none">{{$attorneyMessage->subject}}</a>
                                    </div>
                                    <div class="col-md-2">
                                        <small class="text-secondary mt-0">{{ date('d M, h:i a', strtotime($attorneyMessage->created_at)) }}</small>
                                    </div>
                                    <div class="col-md-2">
                                        <button class="btn-danger btn-sm btn mb-2" id="del">Delete</button>
                                    </div>
                                </div> 
                            @endforeach
                        </div>
                    </div>                                                                                                         
               </div>
           </div>
        </div>
    </div>
</div>

@endsection
