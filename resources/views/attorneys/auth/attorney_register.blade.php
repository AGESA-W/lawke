@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form class="register-form form-right" method="POST" action="{{ route('attorneys.store') }}">
                        {{ csrf_field() }}
                        <p class="register-para">Work Details</p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="national_id" class="col-form-label ">{{ ('National ID') }}</label>
                                    <input id="national_id" type="text" placeholder="eg.34019449" class="mb-3 form-control @error('national_id') is-invalid @enderror" name="national_id" value="{{ old('national_id') }}" required autocomplete="national_id" autofocus>

                                    @error('national_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            <div class="form-group">
                                    <label for="mobile" class="col-form-label ">{{ ('Phone Number') }}</label>
                                    <input id="mobile" type="text" placeholder="e.g.0792685127" class="mb-3 form-control @error('phone number') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" required autocomplete="mobile" autofocus>

                                    @error('phone number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="license_no" class="col-form-label ">{{ ('License No:') }}</label>
                                    <input id="license_no" type="text" placeholder="e.g.P105/1234/56" class="mb-3 form-control @error('license_no') is-invalid @enderror" name="license_no" value="{{ old('license_no') }}" required autocomplete="license_no" autofocus>

                                    @error('license_no')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control mb-3 @error('status') is-invalid @enderror" value="{{ old('status') }}" required autocomplete="status" autofocus>
                                        <option value="">------Select------</option>
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                        <option value="Suspended">Suspended</option>
                                    </select>

                                    @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <p class="register-para">Personal Details</p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstname" class="col-form-label ">{{ __('FirstName:') }}</label>
                                    <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>
        
                                        @error('firstname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
        
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lastname" class="col-form-label ">{{ __('LastName:') }}</label>
                                    <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>
        
                                        @error('lastname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <label for="gender" class="col-form-label ">{{ __('Gender:') }}</label>
                                    <div class="d-flex form-check">
                                        <input class="form-check-input" type="radio"  name="gender" id="male" value="male" required autocomplete="gender" >
                                        <label class="form-check-label" for="male">Male</label>

                                        <div class="option2 pl-5">
                                            <input class="form-check-input " type="radio" name="gender" id="female" value="female"required autocomplete="gender">
                                            <label  for="female">Female</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                                <label for="about" class="col-form-label ">{{ __('BIO') }}</label>
                                <textarea name="about" id="about" cols="30" rows="10" placeholder="Tell people about yourself" class="form-control @error('about') is-invalid @enderror"  required autocomplete="about" autofocus>{{ old('about') }}</textarea>

                                @error('about')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
        
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password-confirm" class="col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div> 
                            </div>
                        </div>
                    
                        <div class="form-group">
                            <div class="text-center">
                                <button type="submit" class="btn bg-color" style="padding:10px 60px 10px 60px;">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
