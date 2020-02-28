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
                <li class="nav-item user-nav-item"><a class="nav-link user-nav-link " href="#tab4" data-toggle="tab"><span class="fa fa-table"></span> Professional Information</a></li>
                <li class="nav-item user-nav-item dropright">
                    <a class="nav-link user-nav-link  dropdown-toggle" href="#"id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="/images/messenger.png" alt="" style="width:15px;height:15px"> Messenger
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                      <a class="dropdown-item" href="#tab2" data-toggle="tab"><span class="fa fa-envelope"></span> Inbox <span class="badge badge-primary" style="margin-left:120px;">{{$attorney->countInbox()}}</span></a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#tab5" data-toggle="tab"><span class="fa fa-chevron-right"></span> Sent </a>

                    </div>
                </li>
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
                                <div class="sectionTitle">Profile image</div>
                                <div class="sectionContent">
                                    <ul class="list-unstyled" style="margin:0">
                                        <li> <img class="attorney-img" src="{{$attorney->image}}" alt="" style="border-radius:50%;"></li>
                                    </ul>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="sectionDetails">
                            <div class="sectionWrapper">
                                <div class="sectionTitle">Name</div>
                                <div class="sectionContent">
                                    <ul class="list-unstyled" style="margin:0">
                                        <li>{{$attorney->firstname}} {{$attorney->lastname}}</li>
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
                                        <li>{{$attorney->email}}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="sectionDetails">
                            <div class="sectionWrapper">
                                <div class="sectionTitle">ID No</div>
                                <div class="sectionContent">
                                    <ul class="list-unstyled" style="margin:0">
                                        <li>{{$attorney->national_id}}</li>
                                    </ul>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="sectionDetails">
                            <div class="sectionWrapper">
                                <div class="sectionTitle">Phone Number</div>
                                <div class="sectionContent">
                                    <ul class="list-unstyled" style="margin:0">
                                        <li>{{$attorney->mobile}}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                       
                        <div class="sectionDetails">
                            <div class="sectionWrapper">
                                <div class="sectionTitle">Registered On</div>
                                <div class="sectionContent">
                                    <ul class="list-unstyled" style="margin:0">
                                        <li>{{ date('d M, h:i a', strtotime($attorney->created_at)) }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab4">
                <h5 class="mb-2 pb-3" style="border-bottom: #afa939 solid 2px;">Professional information</h5>
                  <div class="tab-item">
                    <div class="sectionDetails">
                        <div class="sectionWrapper">
                            <div class="sectionTitle">Place Of Work</div>
                            <div class="sectionContent">
                                <ul class="list-unstyled" style="margin:0">
                                    @foreach ($attorney->locations as $location)
                                         <li>{{$location->company_name}}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="sectionDetails">
                        <div class="sectionWrapper">
                            <div class="sectionTitle">Office Location</div>
                            <div class="sectionContent">
                                <ul class="list-unstyled" style="margin:0">
                                    @foreach ($attorney->locations as $location)
                                         <li>{{$location->location}}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="sectionDetails">
                        <div class="sectionWrapper">
                            <div class="sectionTitle">County</div>
                            <div class="sectionContent">
                                <ul class="list-unstyled" style="margin:0">
                                  <li>{{$attorney->county}}</li>
                                </ul>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="sectionDetails">
                        <div class="sectionWrapper">
                            <div class="sectionTitle">Practice Area(s)</div>
                            <div class="sectionContent">
                                <ul class="list-unstyled" style="margin:0">
                                    @foreach ($attorney->practiceareas as $area)
                                         <li>{{$area->area_practice}}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="sectionDetails">
                        <div class="sectionWrapper">
                            <div class="sectionTitle">Certificate No</div>
                            <div class="sectionContent">
                                <ul class="list-unstyled" style="margin:0">
                                    <li>{{$attorney->license_no}}</li>
                                </ul>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                  </div>
              </div>
              <div class="tab-pane" id="tab2">
                <h5 class="mb-2 pb-3" style="border-bottom: #afa939 solid 2px;">Messages Received</h5>
                @if(count($messages)>0)
                    @foreach ($messages as $message)
                        <input type="hidden" value="{{$message->id}}" id="mId{{$message->id}}">
                        @if($message->status==0)
                            <div class="inbox" id="msg{{$message->id}}" style="background:#ccc;">
                                <ul class="list-unstyled px-3" style="font-size:15px">
                                    <a  class="text-decoration-none " href="#" data-toggle="collapse" data-target="#d{{$message->id}}">
                                        <li class="list-item">Message from:<b> {{$message->user->name}} {{$message->user->lastname}} <span class="badge badge-pill bg-color"> New</span> </b></li>
                                        <small class="text-secondary">Sent on:{{ date('d M, h:i a', strtotime($message->created_at)) }}</small>
                                    </a>
                                    <div class="collapse" id="d{{$message->id}}">{{$message->description}}</div>
                                    <hr>
                                </ul>
                            </div>
                            @else
                            <div class="inbox">
                                <ul class="list-unstyled px-3" style="font-size:15px">
                                    <a  class="text-decoration-none" href="#" data-toggle="collapse" data-target="#d{{$message->id}}">
                                        <li class="list-item">Message from:<b>{{$message->user->name}} {{$message->user->lastname}}</b></li>
                                        <small class="text-secondary mt-0">Received on:{{ date('d M, h:i a', strtotime($message->created_at)) }}</small>
                                    </a>
                                    <div class="collapse" id="d{{$message->id}}">
                                        <p>{{$message->description}}</p>
                                        <div class="sent">
                                            @foreach ($usermessages as $usermess)
                                                @if ( $usermess->message_id == $message->id)
                                                    <ul class="list-unstyled">
                                                        <li class="list-item sent-item mt-2">{{$usermess->description}}
                                                            <br>
                                                            <small class="text-secondary">{{ date('d M, h:i a', strtotime($usermess->created_a)) }}</small>
                                                        </li>
                                                        <div class="clearfix"></div>
                                                    </ul>
                                                    
                                                @endif
                                            @endforeach
                                        </div>
                                        <form action="{{route('user.send.message')}}" method="post">
                                            {{ csrf_field() }}
                                            <div class="form-group">
                                                <input class="form-control mt-2" type="text" name="description" placeholder="Type message....">
                                            </div>
                                            <input type="hidden" name="attorney_id" value="{{$message->attorney->id}}">
                                            <input type="hidden" name="user_id" value="{{$message->user->id}}">
                                            <input type="hidden" name="message_id" value="{{$message->id}}">
        
                                            <button type="submit" class="btn btn-success mt-1 px-4">Send</button>
                                        </form>
                                    </div>
                                    <hr>
                                </ul>
                            </div>
                        @endif 
                    @endforeach
                    @else
                    <p class="lead text-center text-primary">No Messages Yet</p>
                @endif
              </div>
              <div class="tab-pane" id="tab5">
                <h5 class="mb-2 pb-3" style="border-bottom: #afa939 solid 2px;">Sent Messages</h5>

                @if(count($usermessages )>0)
                    @foreach ($usermessages as $usermess)
                        <input type="hidden" value="{{$usermess->id}}" id="mId{{$usermess->id}}">
                        <div class="inbox">
                            <ul class="list-unstyled px-3" style="font-size:15px">
                                <a  class="text-decoration-none" href="#" data-toggle="collapse" data-target="#d{{$usermess->id}}">
                                    <li class="list-item">Message to:<b>{{$usermess->user->name}}</b></li>
                                    <small class="text-secondary mt-0">Sent on:{{ date('d M, h:i a', strtotime($usermess->created_at)) }}</small>
                                </a>
                                <hr>
                                <div class="collapse" id="d{{$usermess->id}}">
                                    <div class="sent">
                                            <ul class="list-unstyled">
                                                <li class="list-item  sent-message mt-2">{{$usermess->description}}
                                                    <br>
                                                    <small class="text-secondary">{{ date('d M, h:i a', strtotime($usermess->created_at)) }}</small>
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
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab3">
                <h5 class="mb-2 pb-3" style="border-bottom: #afa939 solid 2px;">Your Reviews</h5>
                @if(count($reviews)>0)
                    @foreach ($reviews as $review)
                        <ul class="list-unstyled">
                           <li> 
                                <div class="row">
                                    <div class="float-left col-md-3">
                                        <small class="mb-0"><star-rating :star-size="20" active-color="#fc9735" :rating="{{$review->rating}}"></star-rating></small>
                                        <small class="text-secondary"><span class="text-dark">Posted On:</span> {{ date('d M, h:i a', strtotime($review->created_at)) }}</small>
                                        <br>
                                        <small class="text-secondary"><span class="text-dark">By:</span> {{ $review->user->name}}</small>
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
            @foreach($messages as $message)
                $('#msg{{$message->id}}').click(function(){
                    var mId=$('#mId{{$message->id}}').val();
                    $.ajax({
                        type:'get',
                        data:'msgId='+mId,
                        url:'{{url('/updateInbox')}}',
                        success:function(response){
                            window.location.reload();
                            // $('#d{{$message->id}}').show();
                            // console.log(response);
                        }
                    });
                });
            @endforeach  
        });
    </script>

@endsection
