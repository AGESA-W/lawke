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
            <h5>Reply</h5>
           <div class="row">
               <div class="col-md-4">
                 @include('partials.messages_sidebar')
               </div>
               <div class="col-md-8">
                    <div class="card mt-3" style="width:800px;">
                        <div class="card-body">                            
                           <form action="{{route('message.reply.send')}}" method="POST">
                            @csrf
                             <div class="form-group">
                                 <label for="content">Content</label>
                                 <textarea name="content" id="content" class="form-control" cols="30" rows="6"></textarea>
                             </div>  
                                <input type="hidden" name="subject" value="{{$message->subject}}">
                                <input type="hidden" name="replied_id" value="{{$message->id}}">
                                <input type="hidden" name="user_id" value="{{$message->user->id}}">
                                <input type="hidden" name="attorney_id" value="{{Auth::id()}}">

                                <button type="submit" class="btn btn-success">Reply</button>
                          </form>                        
                        </div>
                    </div>                                                                                                         
               </div>
           </div>
        </div>
    </div>
</div>
@endsection
