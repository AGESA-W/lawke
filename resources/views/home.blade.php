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
                {{-- <li class="nav-item user-nav-item"><a class="nav-link user-nav-link " href="#tab2" data-toggle="tab"><span class="fa fa-envelope"></span> Inbox <span class="badge badge-primary" style="margin-left:120px;">{{$user->countUserInbox()}}</span></a></li> --}}
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
                        <div class="sectionDetails">
                            <div class="sectionWrapper">
                                <div class="sectionTitle">Account type</div>
                                <div class="sectionContent">
                                    <ul class="list-unstyled" style="margin:0">
                                        <li class="float-left">User Account</li>
                                        <li class="float-right">
                                            <button type="button" class="btn btn-primary  btn-sm" data-toggle="modal" data-target="#exampleModal">
                                                <span class="fa fa-trash"></span> Close Account
                                            </button>
                                        </li>
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
              <div class="tab-pane" id="tab3">
                <h5 class="mb-2 pb-3" style="border-bottom: #afa939 solid 2px;">My Reviews</h5>
                @if(count($reviews)>0)
                    @foreach ($reviews as $review)
                        <ul class="list-unstyled">
                           <li> 
                                <div class="row">
                                    <div class="float-left col-md-3">
                                        <img src="{{$review->attorney->image}}" alt="" style="width:80px;height:80px;">
                                        <small class="mb-0"><star-rating :star-size="20" active-color="#fc9735" :rating="{{$review->rating}}"></star-rating></small>
                                        <small class="text-secondary"><span class="text-dark">Review for</span> <a class="text-decoration-none" href="/profile/{{$review->attorney->id}}">{{$review->attorney->firstname}} {{$review->attorney->lastname}}</a></small> 
                                        <small class="text-secondary"><span class="text-dark">submited on:</span> {{ date('d M, h:i a', strtotime($review->created_at)) }}</small>
                                    </div>
                                    <div class="float-right col-md-9">
                                        <b>{{$review->headline}}</b>
                                        <p>{{$review->description}}</p>
                                        <div class="dropdown">
                                            <a class="btn btn-primary btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              See actions
                                            </a>
                                          
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <button type="button" class="btn dropdown-item dropdown-item-user px-3 py-2 btn-sm" data-review_id="{{$review->id}}" data-title="{{$review->headline}}"  data-description="{{$review->description}}"  data-toggle="modal" data-target="#editReview">
                                                    Edit Review
                                                </button>
                                                <div class="dropdown-divider"></div>
                                                <button type="button" class="btn  dropdown-item dropdown-item-user px-4 btn-sm" data-toggle="modal" data-target="#deleteModal">
                                                    Delete
                                                </button>
                                            </div>
                                            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Delete Review</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                    <div class="modal-body">
                                                    <p class="lead">Are you sure you want to delete your Review?</p> 
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action="{{route('reviews.destroy',$review->id)}}" method="post">
                                                            @method('DELETE')
                                                            {{ csrf_field() }}
                                                            <button type="submit" class="btn btn-success px-4">Delete</button>
                                                      </form>
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="editReview" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Review</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{route('reviews.update','test')}}" method="post">
                                                            @method('PUT')
                                                            {{ csrf_field() }}
                                                            <div class="form-group">
                                                                <label for="headline"><span class="asterick"><b>*</b></span><b>Title</b> </label>
                                                                <input type="text" class="form-control" id="headline" name= "headline" value="" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for=""><span class="asterick"><b>*</b></span> <b> Your review</b> </label>
                                                                <textarea name= "description" class="form-control" placeholder="Be specific. Explain what your lawyer did (or failed to do) with your case. Your review should clearly indicate that you contacted, consulted with, or hired the attorney." maxlength="4000" id="description" cols="30" rows="5" required></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="hidden" class="form-control" id="review_id" name= "review_id" value="" required>
                                                            </div>
                                                            
                                                            <div class="modal-footer">
                                                                <button class="btn btn-success px-3" type="submit">Edit</button>
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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

              <div class="tab-pane" id="tab5">
                <h5 class="mb-2 pb-3" style="border-bottom: #afa939 solid 2px;">Your Questions</h5>
                @if (count($questions)>0)
                    @foreach ($questions as $question)
                        <div class="card answer-card px-2 py-1">
                            <div class="text-muted">
                                <small> <b>Q & A</b> </small>
                                <br>
                                <small> <b>Asked in  {{$question->county}} | {{ date('d M Y', strtotime($question->created_at)) }}</b> </small>
                            </div>
                            <hr class="mt-1 mb-0">
                            <p class="mb-1"><b>  {{$question->question}} </b></p>
                            <p>  {{$question->situation}} </p>
                            
                            <div class="btns">
                                {{-- <div class="float-right px-4">
                                    <button class="ml-2 mb-2 py-2 btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#deA{{$question->id}}"><span class="fa fa-trash"></span> Delete Question</button> 
                                </div> --}}
                                <div class="text-center px-4">
                                <button class="mr-2 mb-2 py-2 btn btn-sm btn-outline-success" data-toggle="modal" data-target="#eA{{$question->id}}"><span class="fa fa-pencil"></span> Edit Question</button> 
                                </div>
                            </div>
                            {{-- edit modal --}}
                            <div class="modal fade" id="eA{{$question->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Question</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="required pl-2 mb-2 text-color" style="border-left:3px solid #afa939">Required</div>

                                            <form action="{{route('question.update',$question->id)}}" method="post">
                                                @method('PUT')
                                                {{ csrf_field() }}
                                                <div class="form-group">
                                                    <label for="category">Category</label>
                                                    <select name="category" id="category" class="form-control" style="border-left:4px solid #afa939" required >
                                                        <option value="{{$question->category}}">
                                                            {{$question->category}}
                                                         </option>
                                                        @foreach ($practiceareas as $practicearea)
                                                            <option value="{{$practicearea->area_practice}}" class="mb-0">
                                                                {{$practicearea->area_practice}}
                                                            </option>
                                                        @endforeach
                                                    </select>   
                                                  </div>
                                                <div class="form-group">
                                                    <label for="question"><b>Your Question</b> </label>
                                                    <input type="text" class="form-control" name="question" min= "10"max="128" id="question" value="{{$question->question}}" style="border-left:4px solid #afa939" required >
                                                    {{-- <textarea class="form-control" name="answer" min= "10"max="128" id="answer" cols="30" rows="8" style="border-left:4px solid #afa939" required>{{$answer->answer}}</textarea> --}}
                                                </div>
                                                <div class="form-group">
                                                    <label for="situation"><b>Situation</b> </label>
                                                    <textarea class="form-control" name="situation" min= "40"max="1200" id="situation" cols="30" rows="8" style="border-left:4px solid #afa939" required>{{$question->situation}}</textarea>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="county"> County</label>
                                                    <select name="county" id="county" class="form-control" style="border-left:4px solid #afa939" required>
                                                        <option value="{{$question->county}}">
                                                            {{$question->county}}

                                                         </option>
                                                        @foreach ($locations as $location)
                                                            <option value="{{$location->county}}">
                                                                {{$location->county}}
                                                            </option>
                                                        @endforeach
                                                       
                                                    </select>   
                                                  </div>
                                                  <div class="form-group">
                                                      <label for="anonymous">Post your question anonymously?</label>
                                                      <div class="d-flex form-check">
                                                        <input class="form-check-input" type="radio"  name="anonymous" id="yes" value="yes"  required autocomplete="anonymous" >
                                                        <label class="form-check-label" for="yes">Yes</label>
                                        
                                                        <div class="option2 pl-5">
                                                            <input class="form-check-input " type="radio" name="anonymous" id="no" value="no" required autocomplete="anonymous">
                                                            <label class="form-check-label" for="no">No, use my firstname</label>
                                                        </div>
                                                        </div>
                                                        @error('anonymous')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                  </div>

                                                <div class="modal-footer">
                                                    <button class="btn btn-sm btn-success px-3" type="submit">Edit</button>
                                                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- delete modal --}}
                            {{-- <div class="modal fade" id="deA{{$qustion->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete Question</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                        <p class="lead">Are you sure you want to delete your Question?. This action cannot be reversed!.</p> 
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{route('question.destroy',$question->id)}}" method="post">
                                                @method('DELETE')
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-sm btn-success px-3 py-1">Delete</button>
                                        </form>
                                            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    @endforeach
                @else
                <div class="card answer-card p-2">
                    <p>You have not answered any question yet. <br>
                        Answer client questions to increase your chances of drawing potential clients.</p>
                </div>
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
