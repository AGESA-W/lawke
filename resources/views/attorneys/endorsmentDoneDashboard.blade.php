@extends('layouts.app')
@section('content')
    <div class="row user-dashboard">
        <div class="col-12 col-md-3">
            <div class="user-nav">
                @include('partials.lawyernav')
            </div>
        </div>
        <div class="col-12 col-md-9">
            <h5 class="mb-2 pb-3" style="border-bottom: #afa939 solid 2px;">Endorsments done</h5>
            <div class="wrapper mt-3">
                <ul class="list-unstyled">
                    @if(count($endorsers)>0)
                        @foreach ($endorsers as $endorser)
                                <li> 
                                    <div class="row pt-2">
                                        <div class="float-left col-md-2">
                                            <img src="{{$endorser->endorsee->image}}" alt="" style="width:80px;height:80px;">
                                            <br>
                                        </div>
                                        <div class="float-right col-md-10 ml-0">
                                            <span><a href="/profile/{{$endorser->endorsee->id}}">{{$endorser->endorsee->firstname}} {{$endorser->endorsee->lastname}}</a></span>
                                            <small class="text-secondary">on
                                            {{ date('d M y, h:i a', strtotime($endorser->created_at)) }}</small>
                                            <br>
                                            <small><b>Relationship:</b><span class="text-secondary"> {{$endorser->relationship}}</span></small>
                                            <p>{{$endorser->message}}</p>
                                            <div class="dropdown">
                                                <a class="btn btn-primary btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                  See actions
                                                </a>
                                              
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    <button type="button" class="btn dropdown-item dropdown-item-user px-3 py-2 btn-sm" data-endorsment_id="{{$endorser->id}}" data-relationship="{{$endorser->relationship}}"  data-message="{{$endorser->message}}"  data-toggle="modal" data-target="#editEndorsment">
                                                       <span class="fa fa-pencil"></span> Edit 
                                                    </button>
                                                    <div class="dropdown-divider"></div>
                                                    <button type="button" class="btn  dropdown-item dropdown-item-user px-3 py-2 btn-sm" data-toggle="modal" data-target="#deleteModal">
                                                        <span class="fa fa-trash"></span> Delete
                                                    </button>
                                                </div>

                                                {{-- edit modal --}}
                                                <div class="modal fade" id="editEndorsment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit Endorsment</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{route('endorsment.update','test')}}" method="post">
                                                                    @method('PUT')
                                                                    {{ csrf_field() }}
                                                                    <div class="form-group">
                                                                        <label for="relationship"><span class="asterick"><b>*</b></span><b>Relationship</b> </label>
                                                                        <input type="text" class="form-control" id="relationship" name= "relationship" value="" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for=""><span class="asterick"><b>*</b></span> <b> Message</b> </label>
                                                                        <textarea name= "message" class="form-control" maxlength="4000" id="message" cols="30" rows="5" required></textarea>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <input type="hidden" class="form-control" id="endorsment_id" name= "endorsment_id" value="" required>
                                                                    </div>
                                                                    
                                                                    <div class="modal-footer">
                                                                        <button class="btn btn-sm btn-success px-2" type="submit"><span class="fa fa-pencil"></span> Edit</button>
                                                                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><span class="fa fa-undo"></span> Cancel</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- delete modal --}}
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
                                                        <p class="lead">Are you sure you want to delete this Endorsment?</p> 
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="{{route('endorsment.destroy',$endorser->id)}}" method="post">
                                                                @method('DELETE')
                                                                {{ csrf_field() }}
                                                                <button type="submit" class="btn btn-success px-4"> <span class="fa fa-trash"></span> Delete</button>
                                                          </form>
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal"> <span class="fa fa-undo"></span> Cancel</button>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </li>
                        @endforeach
                        @else
                        <h6> <b>No endorsments yet.</b> </h6>
                        <p>Endorsments from fellow lawyers are important consideration for many when selecting the right lawyer.You haven't endorsed any of your colleagues yet!</p>
                    @endif
                </ul>
                <div class="clearfix"></div>
            </div>
      </div>
    </div>
    <script>
        $(document).ready(function (){
            $('#editEndorsment').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var relationship = button.data('relationship') // Extract info from data-* attributes
            var message = button.data('message') // Extract info from data-* attributes
            var endorsment_id = button.data('endorsment_id') // Extract info from data-* attribute

            var modal = $(this)
            modal.find('.modal-body #relationship').val(relationship);
            modal.find('.modal-body #message').val(message);
            modal.find('.modal-body #endorsment_id').val(endorsment_id);
            })
        });
    </script>
@endsection