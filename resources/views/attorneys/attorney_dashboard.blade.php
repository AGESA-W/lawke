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
                
                {{-- <li class="nav-item user-nav-item"><a class="nav-link user-nav-link " href="#tab4" data-toggle="tab"><span class="fa fa-table"></span> Professional Information</a></li> --}}
                <li class="nav-item user-nav-item dropright">
                    <a class="nav-link user-nav-link  dropdown-toggle" href="#"id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="fa fa-table"></span> Professional Information
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                      <a class="dropdown-item" href="#tab4" data-toggle="tab"><span class="fa fa-map-marker"></span> Location</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#tab6" data-toggle="tab"><span class="fa fa-book"></span> Education </a>

                    </div>
                </li>
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
                <li class="nav-item user-nav-item dropright">
                    <a class="nav-link user-nav-link  dropdown-toggle" href="#"id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="fa fa-thumbs-up"></span> Endorsments
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                      <a class="dropdown-item" href="#tab7" data-toggle="tab"><span class="fa fa-users"></span> Endorsements received</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#tab8" data-toggle="tab"><span class="fa fa-user"></span> Endorsements done </a>

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
                <h5 class="mb-2 pb-3" style="border-bottom: #afa939 solid 2px;">Location</h5>
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
                            <div class="sectionTitle">Address</div>
                            <div class="sectionContent">
                                <ul class="list-unstyled" style="margin:0">
                                    <li>{{$location->address}}</li>
                                </ul>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="sectionDetails">
                        <div class="sectionWrapper">
                            <div class="sectionTitle">Action</div>
                            <div class="sectionContent">
                                <ul class="list-unstyled" style="margin:0">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#locationModal">
                                        Edit information
                                    </button>
                                </ul>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="locationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Location</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{ route('location.update',$location->id) }}">
                                    @method('PUT')
                                    {{ csrf_field() }}
            
                                    <div class="form-group row">
                                        <label for="company_name" class="col-md-4 col-form-label text-md-right text-dark">{{ __('Company Name') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="company_name" type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" value="{{$location->company_name}}" required autocomplete="name" autofocus>
            
                                            @error('company_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="location" class="col-md-4 col-form-label text-md-right text-dark">{{ __('Location') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="location" type="text" class="form-control @error('location') is-invalid @enderror" name="location" value="{{$location->location}}" required autocomplete="lastname" autofocus>
            
                                            @error('location')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="address" class="col-md-4 col-form-label text-md-right text-dark">{{ __('Address') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{$location->address}}" required autocomplete="mobile" autofocus>
            
                                            @error('address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
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
                  </div>
              </div>
              <div class="tab-pane" id="tab6">
                <h5 class="mb-2 pb-3" style="border-bottom: #afa939 solid 2px;">Education</h5>
                <div class="tab-item table-responsive">
                    <table class="table table-striped table-hover table-bordered">
                        <thead class="bg-color">
                            <tr>
                                <th>Institution</th>
                                <th>Degree</th>
                                <th>Graduated</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($educations as $education)
                                <tr>
                                    <td>{{$education->school_name}}</td>
                                    <td>{{$education->degree}}</td>
                                    <td>{{$education->graduation}}</td>
                                    <td>
                                    <button  class="btn btn-primary py-1" data-education_id="{{$education->id}}" data-school_name="{{$education->school_name}}" data-degree="{{$education->degree}}"  data-graduation="{{$education->graduation}}" data-attorney_id="{{$attorney->attorney_id}}"  data-toggle="modal" data-target="#edit">
                                        Edit
                                    </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Update Education Modal -->
                    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Education</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <form method="POST" action="{{ route('edit.education','test') }}">
                                    @method('PUT')
                                    {{ csrf_field() }}
                                    <div class="modal-body">
                                        <div class="form-group row">
                                            <label for="school_name" class="col-md-4 col-form-label text-md-right text-dark">{{ __('Institution') }}</label>
                
                                            <div class="col-md-6">
                                                <input id="school_name" type="text" class="form-control @error('school_name') is-invalid @enderror" name="school_name"  required autocomplete="school_name" autofocus>
                
                                                @error('school_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="degree" class="col-md-4 col-form-label text-md-right text-dark">{{ __('Degree') }}</label>
                
                                            <div class="col-md-6">
                                                <input id="degree" type="text" class="form-control @error('degree') is-invalid @enderror" name="degree"  required autocomplete="degree" autofocus>
                
                                                @error('degree')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="graduation" class="col-md-4 col-form-label text-md-right text-dark">{{ __('Year of Graduation') }}</label>
                
                                            <div class="col-md-6">
                                                <input id="graduation" type="date" class="form-control @error('graduation') is-invalid @enderror" name="graduation" required autocomplete="graduation" autofocus>
                
                                                @error('graduation')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group-row">
                                            <input id="attorney_id" type="hidden" name="attorney_id">
                                        </div>
                                        <div class="form-group-row">
                                            <input id="education_id" type="hidden" name="education_id">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success">Save changes</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            
                                        </div>
                                    
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- </Modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addEducationModal">
                        Add New
                    </button>
                    <!-- Add Education Modal -->
                    <div class="modal fade" id="addEducationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Education</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{ route('add.education') }}">
                                    {{ csrf_field() }}
            
                                    <div class="form-group row">
                                        <label for="company_name" class="col-md-4 col-form-label text-md-right text-dark">{{ __('Institution') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="school_name" type="text" class="form-control @error('school_name') is-invalid @enderror" name="school_name" value="{{ old('school_name') }}" required autocomplete="school_name" autofocus>
            
                                            @error('school_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="degree" class="col-md-4 col-form-label text-md-right text-dark">{{ __('Degree') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="degree" type="text" class="form-control @error('degree') is-invalid @enderror" name="degree" value="{{ old('degree') }}" required autocomplete="degree" autofocus>
            
                                            @error('degree')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="graduation" class="col-md-4 col-form-label text-md-right text-dark">{{ __('Year of Graduation') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="graduation" type="date" class="form-control @error('graduation') is-invalid @enderror" name="graduation" value="{{ old('graduation') }}" required autocomplete="graduation" autofocus>
            
                                            @error('graduation')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group-row">
                                        <input type="hidden" name="attorney_id" value="{{$attorney->attorney_id}}">
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
                      <!-- </Modal -->
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
                                        <small class="text-secondary"><span class="text-dark">By:</span> {{ $review->user->name}} {{ $review->user->lastname}}</small>
                                    </div>
                                    <div class="float-right col-md-9">
                                        <b>{{$review->headline}}</b>
                                        <p>{{$review->description}}</p>
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
              <div class="tab-pane" id="tab7">
                <h5 class="mb-2 pb-3" style="border-bottom: #afa939 solid 2px;">Endorsments received</h5>
                @if(count($reviews)>0)
                    @foreach ($reviews as $review)
                        <ul class="list-unstyled">
                           <li> 
                                <div class="row">
                                    <div class="float-left col-md-3">
                                        <small class="mb-0"><star-rating :star-size="20" active-color="#fc9735" :rating="{{$review->rating}}"></star-rating></small>
                                        <small class="text-secondary"><span class="text-dark">Posted On:</span> {{ date('d M, h:i a', strtotime($review->created_at)) }}</small>
                                        <br>
                                        <small class="text-secondary"><span class="text-dark">By:</span> {{ $review->user->name}} {{ $review->user->lastname}}</small>
                                    </div>
                                    <div class="float-right col-md-9">
                                        <b>{{$review->headline}}</b>
                                        <p>{{$review->description}}</p>
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
              <div class="tab-pane" id="tab8">
                <h5 class="mb-2 pb-3" style="border-bottom: #afa939 solid 2px;">Endorsments done</h5>
                @if(count($reviews)>0)
                    @foreach ($reviews as $review)
                        <ul class="list-unstyled">
                           <li> 
                                <div class="row">
                                    <div class="float-left col-md-3">
                                        <small class="mb-0"><star-rating :star-size="20" active-color="#fc9735" :rating="{{$review->rating}}"></star-rating></small>
                                        <small class="text-secondary"><span class="text-dark">Posted On:</span> {{ date('d M, h:i a', strtotime($review->created_at)) }}</small>
                                        <br>
                                        <small class="text-secondary"><span class="text-dark">By:</span> {{ $review->user->name}} {{ $review->user->lastname}}</small>
                                    </div>
                                    <div class="float-right col-md-9">
                                        <b>{{$review->headline}}</b>
                                        <p>{{$review->description}}</p>
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
