@extends('layouts.master')

@section('title')
    LAWYERS | TABLE
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Lawyers Table</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                    <table class="table table-hover">
                    <thead class="text-info">
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Certificate No</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @foreach ($attorneys as $attorney)
                        <tbody>
                            <tr>
                                <td>{{$attorney->id}}</td>
                                <td>{{$attorney->firstname}}</td>
                                <td>{{$attorney->lastname}}</td>
                                <td>{{$attorney->license_no}}</td>
                                <td>{{$attorney->email}}</td>
                                <td>{{$attorney->mobile}}</td>
                                <td><a href="/admin/attorneys/details/{{$attorney->id}}" class="text-decoration-none"><button class="btn btn-sm bg-primary"><span class="fa fa-eye"></span></button></a></td>
                            </tr>
                        </tbody>
                            {{-- <!-- edit Modal -->
                            <div class="modal fade" id="u{{$attorney->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content text-dark">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Lawyer</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{ route('update.lawyer.account',$attorney->id) }}">
                                            @method('PUT')
                                            {{ csrf_field() }}
                    
                                            <div class="form-group row">
                                                <label for="firstname" class="col-md-4 col-form-label text-md-right text-dark">{{ __('First Name') }}</label>
                    
                                                <div class="col-md-6">
                                                    <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{$attorney->firstname}}" required autocomplete="firstname" autofocus>
                    
                                                    @error('firstname')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <label for="lastname" class="col-md-4 col-form-label text-md-right text-dark">{{ __('Last Name') }}</label>
                    
                                                <div class="col-md-6">
                                                    <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{$attorney->lastname}}" required autocomplete="lastname" autofocus>
                    
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
                                                    <input id="mobile" type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{$attorney->mobile}}" required autocomplete="mobile" autofocus>
                    
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
                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$attorney->email}}" required autocomplete="email">
                    
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
                            <div class="modal fade" id="d{{$attorney->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                    ...
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                                </div>
                            </div> --}}
                    @endforeach
                </table>
            </div>
            {{ $attorneys->links() }}
        </div>
      </div>
      
    </div>
  
  </div>
@endsection
