@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},

                <form action="{{route('verification.resend.attorney')}}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="email" value="{{auth()->user()->email}}">
                    <button type="submit" class="btn p-0 border-0 text-primary">click here to request another.</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
