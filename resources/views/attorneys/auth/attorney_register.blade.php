{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'LAWKE') }}</title>

        <!-- Scripts -->
        <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
        <script
        src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
        integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
        crossorigin="anonymous"></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/jquery-ui.theme.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet">

    </head>
    <body>
        <div id="app">
            @include('partials.navbar')
            <div class="container">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form class="register-form" method="POST" action="{{ route('attorneys.store') }}">
                                @csrf
                                <p class="register-para">Work Details</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="national_id" class="col-form-label ">{{ ('National ID') }}</label>
                                            <input id="national_id" type="text" data-type="national_id" placeholder="34019449" class="mb-3 autocomplete_txt form-control @error('national_id') is-invalid @enderror" name="national_id" value="{{ old('national_id') }}" required autocomplete="national_id" autofocus>
        
                                            @error('national_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    <div class="form-group">
                                        <label for="mobile" class="col-form-label ">{{ ('Phone Number') }}</label>
                                        <input id="mobile" type="text" placeholder="0792685127" class="mb-3 form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}"readonly="readonly" required autocomplete="mobile" autofocus>

                                        @error('mobile')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="license_no" class="col-form-label ">{{ ('License No:') }}</label>
                                            <input id="license_no" type="text" data-type="license_no" placeholder="P.105/1234/56" class="mb-3 autocomplete_txt form-control @error('license_no') is-invalid @enderror" name="license_no" value="{{ old('license_no') }}"  readonly="readonly" required autocomplete="license_no" autofocus>
        
                                            @error('license_no')
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
                                            <input id="firstname" type="text" data-type="firstname" class="form-control autocomplete_txt @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" readonly="readonly" required autocomplete="firstname" autofocus>
                
                                                @error('firstname')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" readonly="readonly" required autocomplete="email">
                
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
                                            <input id="lastname" type="text" data-type="lastname" class="autocomplete_txt form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" readonly="readonly" required autocomplete="lastname" autofocus>
                
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
                                            @error('gender')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
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
        </div>
        @include('partials.footer')
        <script>
            $(document).on('focus','.autocomplete_txt',function(){
            type = $(this).data('type');
            
            if(type =='national_id' )autoType='national_id'; 
        
            $(this).autocomplete({
                minLength: 0,
                source: function( request, response ) {
                        $.ajax({
                            url: "{{ route('get.attorneys') }}",
                            dataType: "json",
                            data: {
                                term : request.term,
                                type : type,
                            },
                            success: function(data) {
                                var array = $.map(data, function (item) {
                                return {
                                    label: item[autoType],
                                    value: item[autoType],
                                    data : item
                                }
                            });
                                response(array)
                            }
                        });
                },
                select: function( event, ui ) {
                    var data = ui.item.data;           
                    $('#firstname').val(data.firstname);
                    $('#lastname').val(data.lastname);
                    $('#email').val(data.email);
                    $('#mobile').val(data.mobile);
                    $('#national_id').val(data.national_id);
                    $('#license_no').val(data.license_no);
                }
            }); 
            });
        </script>
</body>
</html> --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'LAWKE') }}</title>

    <!-- Scripts -->
    <script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>
    <script
    src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
    integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
    crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-ui.theme.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        @include('partials.navbar')
            <div class="container register">
            <div class="row">
                <div class="col-md-3 register-left">
                    <img src="images/logo_white.png" alt=""/>
                    <h3>Welcome</h3>
                    <p>You are 30 seconds away from creating an account as an Attorney!</p>
                </div>
                <div class="col-md-9 register-right">
                    <h3 class="register-heading">Register as a Lawyer</h3>
                    <form method="POST" action="{{ route('attorneys.store') }}">
                        @csrf
                        <div class="row register-form">
                            <div class="col-md-6">
                                <p class="register-para">Personal Details</p>
                                <div class="form-group">
                                    <label for="national_id" class="col-form-label ">{{ ('National ID') }}</label>
                                    <input id="national_id" type="text" data-type="national_id" placeholder="34019449" class="autocomplete_txt form-control @error('national_id') is-invalid @enderror" name="national_id" value="{{ old('national_id') }}" required autocomplete="national_id" autofocus>

                                    @error('national_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="firstname" class="col-form-label ">{{ __('FirstName') }}</label>
                                    <input id="firstname" type="text" data-type="firstname" class="form-control autocomplete_txt @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" readonly="readonly" required autocomplete="firstname" autofocus>
        
                                        @error('firstname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <label for="lastname" class="col-form-label ">{{ __('LastName:') }}</label>
                                    <input id="lastname" type="text" data-type="lastname" class="autocomplete_txt form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" readonly="readonly" required autocomplete="lastname" autofocus>
        
                                        @error('lastname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <label for="mobile" class="col-form-label ">{{ ('Phone Number') }}</label>
                                    <input id="mobile" type="text" placeholder="0792685127" class="mb-3 form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}"readonly="readonly" required autocomplete="mobile" autofocus>

                                    @error('mobile')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input id="attorney_id" type="hidden" class="mb-3 form-control" name="attorney_id" value="{{ old('attorney_id') }}">
                                </div>

                                <div class="form-group">
                                    <input id="image" type="hidden" class="mb-3 form-control" name="image" value="{{ old('image') }}" required>
                                </div>
                                <div class="form-group">
                                    <input id="county" type="hidden" class="mb-3 form-control" name="county" value="{{ old('county') }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="gender" class="col-form-label ">{{ __('Gender:') }}</label>
                                    <div class="d-flex form-check">
                                        <input class="form-check-input" type="radio"  name="gender" id="male" value="male"  required autocomplete="gender" >
                                        <label class="form-check-label" for="male">Male</label>

                                        <div class="option2 pl-5">
                                            <input class="form-check-input " type="radio" name="gender" id="female" value="female" required autocomplete="gender">
                                            <label  for="female">Female</label>
                                        </div>
                                    </div>
                                    @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mt-4">
                                <div class="form-group">
                                    <label for="license_no" class="col-form-label ">{{ ('License No:') }}</label>
                                    <input id="license_no" type="text" data-type="license_no" placeholder="P.105/1234/56" class="mb-3 autocomplete_txt form-control @error('license_no') is-invalid @enderror" name="license_no" value="{{ old('license_no') }}"  readonly="readonly" required autocomplete="license_no" autofocus>

                                    @error('license_no')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <p class="register-para">Account Details</p>
                                <div class="form-group">
                                    <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" readonly="readonly" required autocomplete="email">
        
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
        
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password-confirm" class="col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div> 
                                <input type="submit" class="btnRegister"  value="Register"/>
                                {{-- <button type="reset" class="btn btn-danger" >cancel</button> --}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @include('partials.footer')
        <script>
            $(document).on('focus','.autocomplete_txt',function(){
            type = $(this).data('type');
            
            if(type =='national_id' )autoType='national_id'; 
        
            $(this).autocomplete({
                minLength: 0,
                source: function( request, response ) {
                        $.ajax({
                            url: "{{ route('get.attorneys') }}",
                            dataType: "json",
                            data: {
                                term : request.term,
                                type : type,
                            },
                            success: function(data) {
                                var array = $.map(data, function (item) {
                                return {
                                    label: item[autoType],
                                    value: item[autoType],
                                    data : item
                                }
                            });
                                response(array)
                            }
                        });
                },
                select: function( event, ui ) {
                    var data = ui.item.data;           
                    $('#firstname').val(data.firstname);
                    $('#lastname').val(data.lastname);
                    $('#email').val(data.email);
                    $('#mobile').val(data.mobile);
                    $('#national_id').val(data.national_id);
                    $('#license_no').val(data.license_no);
                    $('#attorney_id').val(data.attorney_id);
                    $('#image').val(data.image); 
                    $('#county').val(data.county);
                }
            }); 
            });
        </script>
    </div>
</body>
</html>