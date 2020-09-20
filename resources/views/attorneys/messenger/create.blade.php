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
    

</style>

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <p><b>New Message</b> </p>
           <div class="row">
               <div class="col-md-4">
                 @include('partials.messages_sidebar')
               </div>
               <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('user.message.send')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Recipient</label>
                                    <input type="Email" class="form-control" name="email" id="email" placeholder="Enter recipients email" required>
                                </div>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                                <div class="form-group">
                                    <label for="subject">Subject</label>
                                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject of the message" required minlength="5" maxlength="200">
                                </div>

                                <div class="form-group">
                                    <label for="content">Content</label>
                                    <textarea name="content"  class="form-control" id="content" cols="30" rows="6" placeholder="Write your message here........" required minlength="5" maxlength="400"></textarea>
                                </div>
                                 <input type="hidden" name="attorney_id" id="attorney_id" value="{{Auth::id()}}">
                                <button type="submit" class="btn btn-primary px-3">Send</button>
                            </form>
                        </div>
                    </div>                                                                                                         
               </div>
           </div>
        </div>
    </div>
</div>
@endsection
