@extends('layouts.app')
@section('content')
    <div class="row user-dashboard">
      <div class="col-12 col-md-3">
        <div class="user-nav">
            <h4>Your Profile</h4>
            <hr>
            {{-- <div class="p-0">
              <ul class="nav user-nav-tabs nav-fill ml-auto pt-0" style="flex-direction:column;">
                <li class="nav-item user-nav-item"><a class="nav-link user-nav-link active" href="#tab1" data-toggle="tab"><span class="fa fa-user"></span> Account</a></li>
                <li class="nav-item user-nav-item dropright">
                    <a class="nav-link user-nav-link  dropdown-toggle" href="#"id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="/images/messenger.png" alt="" style="width:15px;height:15px"> Messenger
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                      <a class="dropdown-item" href="#tab2" data-toggle="tab"><span class="fa fa-envelope"></span> Inbox <span class="badge badge-primary" style="margin-left:120px;">{{$user->countUserInbox()}}</span></a>
                        <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#tab4" data-toggle="tab"><span class="fa fa-chevron-right"></span> Sent </a>

                    </div>
                </li>
                <li class="nav-item user-nav-item"><a class="nav-link user-nav-link " href="#tab3" data-toggle="tab"><span class="fa fa-pencil"></span> Reviews</a></li>
                <li class="nav-item user-nav-item"><a class="nav-link user-nav-link " href="#tab5" data-toggle="tab"><span > <img src="/images/questions.png"  style="height:22px;width:22px;" alt="" srcset=""></span> Questions Asked</a></li>

              </ul>
            </div> --}}
            @include('partials.usernav')

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
                        
                        {{-- <div class="sectionDetails">
                            <div class="sectionWrapper">
                                <div class="sectionTitle">Phone Number</div>
                                <div class="sectionContent">
                                    <ul class="list-unstyled" style="margin:0">
                                        <li>0{{$user->mobile}}</li>
                                    </ul>
                                </div>
                            </div>
                        </div> --}}
                       
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
                        <div class="sectionDetails">
                            <div class="sectionWrapper">
                                <div class="sectionTitle">Account type</div>
                                <div class="sectionContent">
                                    <ul class="list-unstyled" style="margin:0">
                                        <li class="float-left">User Account</li>
                                        {{-- <li class="float-right">
                                            <button type="button" class="btn btn-primary  btn-sm" data-toggle="modal" data-target="#exampleModal">
                                                <span class="fa fa-trash"></span> Close Account
                                            </button>
                                        </li> --}}
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete Account</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    <p class="lead">Are you sure you want to delete your Account?</p> 
                                </div>
                                <div class="modal-footer"> 
                                    <form action="{{route('user.delete',$user->id)}}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-success px-3 py-2" type="submit">Delete</button>
                                    </form>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab2">
                    <h5 class="mb-2 pb-3" style="border-bottom: #afa939 solid 2px;">Messages Received</h5>

                    @if(count($usermessages)>0)
                        @foreach ($usermessages as $usermess)
                            <input type="hidden" value="{{$usermess->id}}" id="mId{{$usermess->id}}">
                            @if($usermess->status==0)
                                <div class="inbox" id="msg{{$usermess->id}}" style="background:#ccc;">
                                    <ul class="list-unstyled px-3" style="font-size:15px">
                                        <a  class="text-decoration-none text-dark" href="#" data-toggle="collapse" data-target="#d{{$usermess->id}}">
                                            <li class="list-item">Message from:<b> {{$usermess->attorney->firstname}} {{$usermess->attorney->lastname}} <span class="badge badge-pill bg-color"> New</span></b></li>
                                            <small class="text-secondary">Sent on:{{ date('d M, h:i a', strtotime($usermess->created_at)) }}</small>
                                        </a>
                                        <div class="collapse" id="d{{$usermess->id}}">{{$usermess->description}}</div>
                                        <hr>
                                    </ul>
                                </div>
                                @else
                                <div class="inbox">
                                    <ul class="list-unstyled">
                                        <a  class="text-decoration-none text-dark" href="#" data-toggle="collapse" data-target="#d{{$usermess->id}}">
                                            <li class="list-item">Message from:<b> {{$usermess->attorney->firstname}} {{$usermess->attorney->lastname}}</b> </li>           
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
              
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab4">
                    <h5 class="mb-2 pb-3" style="border-bottom: #afa939 solid 2px;">Sent Messages</h5>

                    @if(count($messages )>0)
                        @foreach ($messages as $message)
                            <input type="hidden" value="{{$message->id}}" id="mId{{$message->id}}">
                            <div class="inbox">
                                <ul class="list-unstyled px-3" style="font-size:15px">
                                    <a  class="text-decoration-none" href="#" data-toggle="collapse" data-target="#d{{$message->id}}">
                                        <li class="list-item">Message to:<b> {{$message->attorney->firstname}} {{$message->attorney->lastname}}</b></li>
                                        <small class="text-secondary mt-0">Sent on:{{ date('d M, h:i a', strtotime($message->created_at)) }}</small>
                                    </a>
                                    <hr>
                                    <div class="collapse" id="d{{$message->id}}">
                                        <div class="sent">
                                                <ul class="list-unstyled">
                                                    <li class="list-item  sent-messageage mt-2">{{$message->description}}
                                                        <br>
                                                        <small class="text-secondary">{{ date('d M, h:i a', strtotime($message->created_at)) }}</small>
                                                    </li>
                                                    <div class="clearfix"></div>
                                                </ul>
                                        </div>
                                    </div>
                                </ul>
                            </div>
                        @endforeach
                        @else
                        <p class="lead text-center text-primary">No Messages Sent Yet</p>
                    @endif
              </div>
                
           
            </div>
            <!-- /.tab-content -->
        </div>
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
