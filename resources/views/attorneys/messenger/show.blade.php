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
                 @include('partials.messages_sidebar')
               </div>
               <div class="col-md-8 col-lg-8">
                   {{-- <button class="btn-primary btn px-3">Reply</button> --}}
                    <a href="{{route('message.reply',$message->id)}}" class="btn-primary btn px-3"> <i class="fa fa-reply" aria-hidden="true"></i> Reply</a>
                    <div class="card mt-3" style="width:800px;">
                        <div class="card-body">                            
                            <div class="row inbox-row pt-2">
                                <div class="col-md-1">
                                    <div class="user-image" style="height:60px;width:60px;background:blue;border-radius:50%;font-size:20px;">
                                        <div class="user-image-text text-center text-white m-auto pt-3">
                                            <strong class="text-uppercase">{{substr($message->user->name,0,1)}}{{strlen($message->user->name)>1 ?"":""}} {{substr($message->user->lastname,0,1)}}{{strlen($message->user->lastname)>1 ?"":""}}</strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <b>{{$message->user->name}} {{$message->user->lastname}}</b>
                                    <br>
                                   <small class=" mt-0 text-secondary"><b>to me</b></small>
                                    <!-- Example split danger button -->
                                    <div class="btn-group">
                                        {{-- <button type="button" class="btn btn-danger">Action</button> --}}
                                        <button type="button" class="btn btn-secondary px-1 btn-sm dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#"><small class="text-muted">from: <b>{{$message->user->name}} {{$message->user->lastname}}</b>({{$message->user->email}})</small></a>
                                        <a class="dropdown-item" href="#"><small class="text-muted">to: <b>{{$message->attorney->firstname}} {{$message->attorney->lastname}}</b>({{$message->attorney->email}})</small></a>
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
                            @foreach($replyMessages as  $replyMessage)
                                <div class="row inbox-row pt-2">

                                        <div class="col-md-1">
                                            <img src="{{$message->attorney->image}}" alt="" style="height:60px;width:60px;border-radius: 50%;">

                                        </div>
                                        <div class="col-md-7">
                                            <b>{{$replyMessage->attorney->firstname}} {{$replyMessage->attorney->lastname}}</b>
                                            <br>
                                            <small class=" mt-0 text-secondary"><b>to {{$replyMessage->user->name}} {{$replyMessage->user->lastname}}</b></small>
                                        
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-secondary px-1 btn-sm dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#"><small class="text-muted">from: <b>{{$replyMessage->attorney->firstname}} {{$replyMessage->attorney->lastname}}</b>({{$replyMessage->attorney->email}})</small></a>
                                                <a class="dropdown-item" href="#"><small class="text-muted">to: <b>{{$replyMessage->user->name}}</b>({{$replyMessage->user->email}})</small></a>
                                                <a class="dropdown-item" href="#"><small class="text-muted">date: {{ date('D, d M y, h:i a', strtotime($replyMessage->created_at)) }}</small></a>
                                                <a class="dropdown-item" href="#"><small class="text-muted">subject: <b>{{$replyMessage->subject}}</b></small></a>
                                                </div>
                                            </div>
                                            <p>{{$replyMessage->content}}</p> </div>
                                            
                                        </div>
                                        <div class="col-md-3">
                                            <small class="text-secondary mt-0">{{ date('D, d M y, h:i a', strtotime($replyMessage->created_at)) }}</small>
                                        </div>
                                </div>
                            @endforeach

                            {{-- @if ($replyMessages != null )
                                @foreach($replyMessages as  $replyMessage)
                                    @if (  $replyMessage->replied_id == $message->id )
                                        <div class="row inbox-row pt-2">
                                                <div class="col-md-1">
                                                    <img src="{{$message->attorney->image}}" alt="" style="height:60px;width:60px;border-radius: 50%;">

                                                </div>
                                                <div class="col-md-7">
                                                    <b>{{$replyMessage->attorney->firstname}} {{$replyMessage->attorney->lastname}}</b>
                                                    <br>
                                                    <small class=" mt-0 text-secondary"><b>to {{$replyMessage->user->name}} {{$replyMessage->user->lastname}}</b></small>
                                                
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-secondary px-1 btn-sm dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="#"><small class="text-muted">from: <b>{{$replyMessage->attorney->firstname}} {{$replyMessage->attorney->lastname}}</b>({{$replyMessage->attorney->email}})</small></a>
                                                        <a class="dropdown-item" href="#"><small class="text-muted">to: <b>{{$replyMessage->user->name}}</b>({{$replyMessage->user->email}})</small></a>
                                                        <a class="dropdown-item" href="#"><small class="text-muted">date: {{ date('D, d M y, h:i a', strtotime($replyMessage->created_at)) }}</small></a>
                                                        <a class="dropdown-item" href="#"><small class="text-muted">subject: <b>{{$replyMessage->subject}}</b></small></a>
                                                        </div>
                                                    </div>
                                                    <p>{{$replyMessage->content}}</p> </div>
                                                    
                                                </div>
                                                <div class="col-md-3">
                                                    <small class="text-secondary mt-0">{{ date('D, d M y, h:i a', strtotime($replyMessage->created_at)) }}</small>
                                                </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif   --}}
                            
                                               
                        </div>
                    </div>                                                                                                         
               </div>
           </div>
        </div>
    </div>
</div>
@endsection
{{-- @if ($userReplyMessages != null)
                                @foreach($userReplyMessages as  $userReplyMessage)
                                    <div class="row inbox-row pt-2">
                                        <div class="col-md-8">
                                            <b>{{$userReplyMessage->user->name}}</b>
                                            <br>
                                            <small class=" mt-0 text-secondary"><b>to me</b></small>
                                        
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-secondary px-1 btn-sm dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#"><small class="text-muted">from: <b>{{$userReplyMessage->user->name}}</b>({{$userReplyMessage->user->email}})</small></a>
                                                <a class="dropdown-item" href="#"><small class="text-muted">to: <b>{{$userReplyMessage->attorney->firstname}} {{$userReplyMessage->attorney->lastname}}</b>({{$userReplyMessage->attorney->email}})</small></a>
                                                <a class="dropdown-item" href="#"><small class="text-muted">date: {{ date('D, d M y, h:i a', strtotime($userReplyMessage->created_at)) }}</small></a>
                                                <a class="dropdown-item" href="#"><small class="text-muted">subject: <b>{{$userReplyMessage->subject}}</b></small></a>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="col-md-3">
                                            <small class="text-secondary mt-0">{{ date('D, d M y, h:i a', strtotime($userReplyMessage->created_at)) }}</small>
                                        </div>
                                        <p class="px-3">{{$userReplyMessage->content}}</p> 
                                    </div>
                                @endforeach
                            @endif   --}}