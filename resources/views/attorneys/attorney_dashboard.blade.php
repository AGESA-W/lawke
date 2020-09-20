@extends('layouts.app')
@section('content')
    <div class="row user-dashboard">
      <div class="col-12 col-md-3">
        <div class="user-nav">
            <h4>Your Profile</h4>
            <hr>
            <div class="p-0">
                @include('partials.lawyernav')

            </div>
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

                        <div class="sectionDetails">
                            <div class="sectionWrapper">
                                <div class="sectionTitle">About</div>
                                <div class="sectionContent">
                                    @if ($attorney->about != null)
                                        <p>{{$attorney->about}}</p>
                                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#editAboutModal">
                                            <span class="fa fa-pencil"></span> Edit information
                                        </button>
                                        @else
                                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#aboutModal">
                                            <span class="fa fa-pencil"></span> Tell us about yourself
                                        </button>
                                    @endif
                                     <!-- Tell us about yourself Modal -->
                                    <div class="modal fade" id="aboutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Tell us about yourself</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                            <form method="POST" action="{{route('about.attorney',$attorney->id)}}">
                                                @method('PUT')
                                                    {{ csrf_field() }}
                            
                                                <div class="form-group">
                                                    <label for="about" class="pl-1" style="border-left:3px solid #afa939">{{ __('About yourself') }}</label>
                        
                                                    <textarea class="form-control" name="about" id="about" cols="30" rows="10" 
                                                        placeholder="Briefly give information about yourself that can allow clients to know more about you. The information can contain your education background, your area of specilisation or any relevant information you wish your clients to know about you. ">
                                                    </textarea>
                                                    @error('about')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success">Submit</button>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <!-- ./Tell us about yourself Modal -->

                                     <!-- edit about yourself Modal -->
                                     <div class="modal fade" id="editAboutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Tell us about yourself</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                            <form method="POST" action="{{route('about.attorney',$attorney->id)}}">
                                                @method('PUT')
                                                    {{ csrf_field() }}
                            
                                                <div class="form-group">
                                                    <label for="about" class="pl-1" style="border-left:3px solid #afa939">{{ __('About yourself') }}</label>
                        
                                                    <textarea class="form-control" class="ml-0" name="about" id="about" cols="30" rows="10">{{$attorney->about}}</textarea>
                                                    @error('about')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success">Save changes</button>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <!-- ./edit about yourself Modal -->


                                 </div>
                            </div>
                        </div>
                    </div>
                </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab4">
                
              </div>
              <div class="tab-pane" id="tab6">
                
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
                
              </div>
              <div class="tab-pane" id="tab7">
                
              </div>
              <div class="tab-pane" id="tab8">
               
              </div>
              <div class="tab-pane" id="tab9">
               
               
              </div>

              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
        </div><!-- /.card-body -->
      </div>
    </div>
@endsection
