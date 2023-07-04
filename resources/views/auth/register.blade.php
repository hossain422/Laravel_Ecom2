@extends('layouts.master')
@section('title', 'Register')
@section('content')
<!--main area-->
<main id="main" class="main-site left-sidebar">

<div class="container">

    <div class="wrap-breadcrumb">
        <ul>
            <li class="item-link"><a href="#" class="link">home</a></li>
            <li class="item-link"><span>Register</span></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">							
            <div class=" main-content-area">
                <div class="wrap-login-item ">
                    <div class="register-form form-item ">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <fieldset class="wrap-title">
                                <h3 class="form-title">Create an account</h3>
                                <h4 class="form-subtitle">Personal infomation</h4>
                            </fieldset>									
                            <fieldset class="wrap-input">
                                <label for="frm-reg-lname">Name*</label>
                                <input type="text" id="frm-reg-lname"name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Last name*">
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </fieldset>
                            <fieldset class="wrap-input">
                                <label for="frm-reg-email">Email Address*</label>
                                <input type="email" id="frm-reg-email" name="email" :value="old('email')" required autocomplete="username" placeholder="Email address">
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </fieldset>
                            <fieldset class="wrap-functions ">
                                <label class="remember-field">
                                    <input name="newletter" id="new-letter" value="forever" type="checkbox"><span>Sign Up for Newsletter</span>
                                </label>
                            </fieldset>
                            <fieldset class="wrap-title">
                                <h3 class="form-title">Login Information</h3>
                            </fieldset>
                            <fieldset class="wrap-input item-width-in-half left-item ">
                                <label for="frm-reg-pass">Password *</label>
                                <input type="password"
                                    name="password"
                                    required autocomplete="new-password" placeholder="Password">
                            </fieldset>
                            <fieldset class="wrap-input item-width-in-half ">
                                <label for="frm-reg-cfpass">Confirm Password *</label>
                                <input type="password"
                                    name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                            </fieldset>
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                                {{ __('Already registered?') }}
                            </a> <br>
                            <input type="submit" class="btn btn-sign" value="Register" name="register">
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
