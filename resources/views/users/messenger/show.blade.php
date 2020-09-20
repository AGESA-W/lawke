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
            <h5><b>{{$message->subject}}</b><span class="badge ml-1 badge-success">inbox</span></h5>
           <div class="row">
               <div class="col-md-4">
                 @include('partials.usermessages_sidebar')
               </div>
               <div class="col-md-8">
                   {{-- <button class="btn-primary btn px-3">Reply</button> --}}
                    <a href="{{route('usermessage.reply',$message->id)}}" class="btn-primary btn px-3"> <i class="fa fa-reply" aria-hidden="true"></i> Reply</a>
                    <div class="card mt-3" style="width:800px;">
                        <div class="card-body">                            
                            <div class="row inbox-row pt-2">
                                <div class="col-md-1">
                                    <img src="{{$message->attorney->image}}" alt="" style="height:60px;width:60px;border-radius: 50%;">
                                </div>
                                <div class="col-md-7">
                                    <b>{{$message->attorney->firstname}} {{$message->attorney->lastname}}</b>
                                    <br>
                                   <small class=" mt-0 text-secondary"><b>to me</b></small>
                                    <!-- Example split danger button -->
                                    <div class="btn-group">
                                        {{-- <button type="button" class="btn btn-danger">Action</button> --}}
                                        <button type="button" class="btn btn-secondary px-1 btn-sm dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#"><small class="text-muted">from: <b>{{$message->attorney->firstname}} {{$message->attorney->lastname}}</b>({{$message->attorney->email}})</small></a>
                                        <a class="dropdown-item" href="#"><small class="text-muted">to: <b>{{$message->user->name}} {{$message->user->lastname}}</b> ({{$message->user->email}})</small></a>
                                        <a class="dropdown-item" href="#"><small class="text-muted">date: {{ date('D, d M y, h:i a', strtotime($message->created_at)) }}</small></a>
                                        <a class="dropdown-item" href="#"><small class="text-muted">subject: <b>{{$message->subject}}</b></small></a>
                                        </div>
                                    </div>
                                    <p>{{$message->content}}</p>
                                    
                                </div>
                                <div class="col-md-3">
                                    <small class="text-secondary mt-0">{{ date('D, d M y, h:i a', strtotime($message->created_at)) }}</small>
                                </div>
                            </div>                             
                        </div>
                    </div>                                                                                                         
               </div>
           </div>
        </div>
    </div>
</div>
@endsection
