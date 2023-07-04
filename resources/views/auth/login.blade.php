@extends('layouts.master')
@section('title', 'Login')
@section('content')

<!--main area-->
<main id="main" class="main-site left-sidebar">

<div class="container">

    <div class="wrap-breadcrumb">
        <ul>
            <li class="item-link"><a href="#" class="link">home</a></li>
            <li class="item-link"><span>login</span></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">
            <div class=" main-content-area">
                <div class="wrap-login-item ">						
                    <div class="login-form form-item form-stl">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <fieldset class="wrap-title">
                                <h3 class="form-title">Log in to your account</h3>										
                            </fieldset>
                            <fieldset class="wrap-input">
                                <label for="frm-login-uname">Email Address:</label>
                                <input type="text" id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username">
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                @if(session('email'))
                                <b class="text-danger">{{session('email')}}</b>
                                @endif
                            </fieldset>
                            <fieldset class="wrap-input">
                                <label for="frm-login-pass">Password:</label>
                                <input type="password" id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password">
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </fieldset>
                            
                            <fieldset class="wrap-input">
                                <label class="remember-field">
                                    <input class="frm-input " id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember" type="checkbox"><span>Remember me</span>
                                </label>
                                @if (Route::has('password.request'))
                                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                @endif
                            </fieldset>
                            <input type="submit" class="btn btn-submit" value="Sign In" name="submit"> <br> 
                            <a href="{{url('auth/github/redirect')}}" class="btn btn-social text-white btn-github"><i class="fa fa-github"></i> Sign In With GitHub</a>
                            <!-- <a href="{{url('auth/google/redirect')}}" class="btn btn-social text-white btn-google"><i class="fa fa-google"></i> Sign In With Google</a> -->
                            <a href="{{url('auth/facebook/redirect')}}" class="btn btn-social text-white btn-facebook"><i class="fa fa-facebook"></i> Sign In With Facebook</a>
                        </form>
                        
                    </div>												
                </div>
            </div><!--end main products area-->		
        </div>
    </div><!--end row-->

</div><!--end container-->

</main>
<!--main area-->

@endsection