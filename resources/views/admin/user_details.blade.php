@extends('layouts.master')
@section('content')
    <div class="userDetails-wrapper" style="background:#fff;padding:10px 20px 10px 20px;font-size:13.5px;">
        <b>Client Details</b>
        <hr>
        <div class="row">
            <div class="col-md-3">
                <div class="user-image" style="height:150px;width:200px;background:blue;font-size:55px;">
                    <div class="user-image-text text-center text-white m-auto pt-4">
                        <strong>{{substr($user->name,0,1)}}{{strlen($user->name)>1 ?"":""}} {{substr($user->lastname,0,1)}}{{strlen($user->lastname)>1 ?"":""}}</strong>
                    </div>
                </div>
            </div>
            <div class="col-md-3" style="margin-left:-45px;">
                <ul class="list-unstyled">
                    <li class="mb-1"><h4 class="mb-0"><b>{{$user->name}} {{$user->lastname}}</b></h4></li>
                    <li class="mb-1">{{$user->email}}</li>
                    <li class="mb-1">0{{$user->mobile}}</li>
                    <li><small class="text-secondary">{{ date('d M,Y', strtotime($user->created_at)) }}</small></li>
                </ul>
                <div class="buttons mt-2">
                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#e{{$user->id}}">Edit</button> <button class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#d{{$user->id}}">Delete</button> 
                </div>
                     <!-- edit Modal -->
                     <div class="modal fade" id="e{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content text-dark">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{ route('users.update',$user->id) }}">
                                    @method('PUT')
                                    {{ csrf_field() }}
            
                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right text-dark">{{ __('First Name') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" required autocomplete="name" autofocus>
            
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lastname" class="col-md-4 col-form-label text-md-right text-dark">{{ __('Last Name') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{$user->lastname}}" required autocomplete="lastname" autofocus>
            
                                            @error('lastname')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="mobile" class="col-md-4 col-form-label text-md-right text-dark">{{ __('Mobile') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="mobile" type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="0{{$user->mobile}}" required autocomplete="mobile" autofocus>
            
                                            @error('mobile')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
            
                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right text-dark">{{ __('E-Mail Address') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" required autocomplete="email">
            
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        
                                    </div>
                                </form>
                            </div>
                        </div>
                        </div>
                    </div>

                    <!-- delete Modal -->
                    <div class="modal fade" id="d{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete Client</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                 <p class="lead">Are you sure you want to delete your Account?</p> 
                            
                            </div>
                            <div class="modal-footer">
                                <form action="{{route('admin.user.delete',$user->id)}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-success px-3 py-2" type="submit">Yes</button>
                                </form>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                        </div>
                    </div>
            </div>
            <div class="col-md-3">
                
            </div>
            <div class="col-md-3">
                
            </div>
        </div>
    </div>

    <div class="userDetails-wrapper mt-5" style="background:#fff;padding:10px 20px 10px 20px;font-size:13.5px;">
        <b>Reviews</b>
        <hr>
        @if(count($reviews)>0)
            @foreach ($reviews as $review)
                <ul class="list-unstyled">
                    <li> 
                        <div class="row mt-3">
                            <div class="float-left col-md-2">
                                <img src="{{$review->attorney->image}}" alt="" style="width:80px;height:80px;">
                                <br>
                                @if($review->rating == 5)
                                    @for ($i = 0; $i < $review->rating; $i++)
                                        <span class="fa fa-star"></span>
                                    @endfor
                                    @elseif($review->rating == 4)
                                        @for ($i = 0; $i < $review->rating; $i++)
                                            <span class="fa fa-star"></span>
                                        @endfor
                                        <span class="fa fa-star text-light"></span>
                                    @elseif($review->rating ==3)
                                        @for ($i = 0; $i < $review->rating; $i++)
                                            <span class="fa fa-star"></span>
                                        @endfor
                                        <span class="fa fa-star text-light"></span>
                                        <span class="fa fa-star text-light"></span>
                                    @elseif($review->rating == 2)
                                        @for ($i = 0; $i < $review->rating; $i++)
                                            <span class="fa fa-star"></span>
                                        @endfor
                                        @for ($i = 0; $i < 3; $i++)
                                            <span class="fa fa-star text-light"></span>
                                        @endfor
                                    @elseif($review->rating == 1)
                                        @for ($i = 0; $i < $review->rating; $i++)
                                            <span class="fa fa-star"></span>
                                        @endfor
                                        @for ($i = 0; $i < 4; $i++)
                                            <span class="fa fa-star text-light"></span>
                                        @endfor
                                @endif
                                <br>
                                <small class="text-secondary"><span class="text-dark">Review for</span> <a class="text-decoration-none" href="/profile/{{$review->attorney->id}}">{{$review->attorney->firstname}} {{$review->attorney->lastname}}</a></small> 
                                <br>
                                <small class="text-secondary"><span class="text-dark">submited on:</span> {{ date('d M Y,', strtotime($review->created_at)) }}</small>
                            </div>
                            <div class="float-right col-md-8">
                                <b>{{$review->headline}}</b>
                                <p class="mb-1">{{$review->description}}</p>
                                <div class="dropdown mb-3">
                                    <a class="btn btn-primary btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    See actions
                                    </a>
                                
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <button type="button" class="btn dropdown-item dropdown-item-user px-3 py-2 btn-sm" data-toggle="modal" data-target="#edRe{{$review->id}}">
                                            Edit Review
                                        </button>
                                        <div class="dropdown-divider"></div>
                                        <button type="button" class="btn  dropdown-item dropdown-item-user px-4 btn-sm" data-toggle="modal" data-target="#delrev{{$review->id}}">
                                            Delete
                                        </button>
                                    </div>
                                    {{-- delete modal --}}
                                    <div class="modal fade" id="delrev{{$review->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete Review</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                            <p class="lead">Are you sure you want to delete this Review?</p> 
                                            </div>
                                            <div class="modal-footer">
                                                <form action="{{route('admin.reviews.destroy',$review->id)}}" method="post">
                                                    @method('DELETE')
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-sm btn-success px-4">Delete</button>
                                            </form>
                                                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    {{-- ./delete modal --}}

                                    {{-- edit review --}}
                                    <div class="modal fade" id="edRe{{$review->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Review</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{route('admin.reviews.update',$review->id)}}" method="post">
                                                        @method('PUT')
                                                        {{ csrf_field() }}
                                                        <div class="form-group">
                                                            <label for="headline"><span class="asterick"><b>*</b></span><b>Title</b> </label>
                                                            <input type="text" class="form-control" id="headline" name= "headline" value="{{$review->headline}}" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for=""><span class="asterick"><b>*</b></span> <b> Your review</b> </label>
                                                            <textarea name= "description" class="form-control" maxlength="4000" id="description" cols="30" rows="5" required>{{$review->description}}</textarea>
                                                        </div>
                                                    
                                                        <div class="modal-footer">
                                                            <button class="btn btn-sm btn-success" type="submit">Edit</button>
                                                            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- ./edit review --}}
                                </div>
                                
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </li> 
                </ul>
                
            @endforeach
            @else
            <p class="lead text-center text-primary"> <b>This user has no reviews.</b> </p>
        @endif
    </div>
@endsection