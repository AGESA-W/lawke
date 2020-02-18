@extends('layouts.app')
@section('content')
    <div class="row user-dashboard">
      <div class="col-12 col-md-3">
        <div class="user-nav">
            <h4>Your Profile</h4>
            <hr>
            <div class="p-0">
              <ul class="nav user-nav-tabs nav-fill ml-auto pt-0" style="flex-direction:column;">
                <li class="nav-item user-nav-item"><a class="nav-link user-nav-link active" href="#tab1" data-toggle="tab"><span class="fa fa-user"></span> Account</a></li>
                <li class="nav-item user-nav-item"><a class="nav-link user-nav-link " href="#tab2" data-toggle="tab"><span class="fa fa-envelope"></span> Inbox</a></li>
                <li class="nav-item user-nav-item"><a class="nav-link user-nav-link " href="#tab3" data-toggle="tab"><span class="fa fa-pencil"></span> Reviews</a></li>
              </ul>
            </div><!-- /.card-header -->
        </div>
      </div>
      <div class="col-12 col-md-9">
        <div class="user-text-wrapper">
            <div class="tab-content">
                <div class="tab-pane active" id="tab1">
                  <h5 class="mb-2 pb-3" style="border-bottom: #afa939 solid 2px;">Personal information</h5>
                    <div class="tab-item">
                        <div class="sectionDetails">
                            <div class="sectionWrapper">
                                <div class="sectionTitle">Name</div>
                                <div class="sectionContent">
                                    <ul class="list-unstyled" style="margin:0">
                                        <li>{{$user->name}} {{$user->lastname}}</li>
                                    </ul>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        
                        <div class="sectionDetails">
                            <div class="sectionWrapper">
                                <div class="sectionTitle">Email</div>
                                <div class="sectionContent">
                                    <ul class="list-unstyled" style="margin:0">
                                        <li>{{$user->email}}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                        <div class="sectionDetails">
                            <div class="sectionWrapper">
                                <div class="sectionTitle">Phone Number</div>
                                <div class="sectionContent">
                                    <ul class="list-unstyled" style="margin:0">
                                        <li>0{{$user->mobile}}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                       
                        <div class="sectionDetails">
                            <div class="sectionWrapper">
                                <div class="sectionTitle">Registered On</div>
                                <div class="sectionContent">
                                    <ul class="list-unstyled" style="margin:0">
                                        <li>{{ date('d M, h:i a', strtotime($user->created_at)) }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab2">
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
                        <p class="lead text-center text-primary"> <b>No Messages Yet</b> </p>
                    @endif
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab3">
                <h5 class="mb-2 pb-3" style="border-bottom: #afa939 solid 2px;">My Reviews</h5>
                @if(count($reviews)>0)
                    @foreach ($reviews as $review)
                        <ul class="list-unstyled">
                           <li> 
                                <div class="row">
                                    <div class="float-left col-md-3">
                                        <small class="mb-0"><star-rating :star-size="20" active-color="#fc9735" :rating="{{$review->rating}}"></star-rating></small>
                                        <small class="text-secondary"><span class="text-dark">Posted On:</span> {{ date('d M, h:i a', strtotime($review->created_at)) }}</small>
                                    </div>
                                    <div class="float-right col-md-9">
                                        <b>{{$review->headline}}</b>
                                        <p>{{$review->description}}</p>
                                        {{-- <button  class="btn btn-success px-4">Edit</button>
                                        <button  class="float-right btn btn-danger px-4">Delete</button> --}}
                                        {{-- <a href="">See Actions</a> --}}
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </li> 
                        </ul>
                        
                    @endforeach
                    @else
                    <p class="lead text-center text-primary"> <b>There are no reviews in your account.</b> </p>
                @endif
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
        </div><!-- /.card-body -->
      </div>
        
    </div>
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
