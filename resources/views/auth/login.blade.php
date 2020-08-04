@extends('layouts.master3')

@section('content')
<div class="container">
    <div class="row justify-content-center my-5 bg-white">
        <div class="col-md-6">
            <div class="row justify-content-center  mt-2 mb-4 ">
                <a href="{{route('home')}}" class="">
                    <img src="{{ asset('images/icons/logo2.png') }}"
                        style="max-height: 50px!important;background-color:#f8fafc!important" alt="IMG-LOGO">
                </a>
            </div>
            <div class="card">
                <div class="card-header bg-dark text-white">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn-login hov1">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div>
    <div class="row justify-content-center mb-5 bg-white">
        <div class="col-md-6">
            <div class="">
                <div class="a-divider a-divider-break">
                    <h5>New to eCommerce ?</h5>

                </div>
                <a href="{{route('register')}}" class="flex-c-m size1 bgGray bo-rad-5 hov1  trans-0-4">
                    Create your eCommerce account
                </a>
            </div>

        </div>
    </div>
</div>
@endsection