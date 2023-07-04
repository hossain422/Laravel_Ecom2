@extends('layouts.master')
@section('title', 'Profile')
@section('content')
<style>
    .btn{
        background-color: black;
        color: #fff;
        margin-bottom: 1px;
        width: 100%;
        border: none;
    }
    .active{
        background-color: gray;
    }
    .btn1{
        background-color: red;
    }
    .btn:hover{
        background-color: red;
    }
    .row1{
        margin-top: 30px;
    }
</style>


<div class="container">
    <div class="row row1">
        <div class="col-md-3">
            <ul>
                <a class="mb-3 btn {{request()->is('dashboard') ? 'active' : ''}} " href="{{url('dashboard')}}">Dashboard</a> <br>
                <a class="btn  {{request()->is('profile') ? 'active' : ''}}" href="{{url('profile')}}">Profile</a> <br>
                <a class="btn  {{request()->is('order') ? 'active' : ''}}" href="{{url('order')}}">My Order</a> <br>
                <a class="btn  {{request()->is('wishlist') ? 'active' : ''}}" href="{{url('Wishlist')}}">Wishlist</a> <br>
                <a class="btn  {{request()->is('dashboard') ? 'active' : ''}}" href="{{url('dashboard')}}">Dashboard</a> <br>
                <a class="btn btn1  " href="{{url('logout')}}">Logout</a>
            </ul>
        </div>
        <div class="col-md-9 ">
        @if(session('success'))
             
             <script>
               swal({
                 title: "Good job!",
                 text: "{{session('success')}}",
                 icon: "success",
                 button: "Ok",
               });
             </script>
             @endif
            <!-- <h3>Welcome {{Auth::user()->name}}</h3> -->
            <div class="card-body">
                      <form action="{{url('update_profile')}}" method="post">
                        @csrf
                        
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Name</label>
                          <input type="text" name="name" class="form-control" id="basic-default-fullname" value="{{Auth::user()->name}}" />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Email</label>
                          <input type="text" name="email" class="form-control" id="basic-default-fullname" value="{{$user->email}}" />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Phone</label>
                          <input type="text" name="phone" class="form-control" id="basic-default-fullname" value="{{Auth::user()->phone}}" />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Country</label>
                          <input type="text" name="country" class="form-control" id="basic-default-fullname" value="{{$user->country}}" />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">City</label>
                          <input type="text" name="city" class="form-control" id="basic-default-fullname" value="{{$user->city}}" />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Address</label>
                          <input type="text" name="address" class="form-control" id="basic-default-fullname" value="{{$user->address}}" />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Zip Code</label>
                          <input type="text" name="zip" class="form-control" id="basic-default-fullname" value="{{$user->zip}}" />
                        </div>
                       
                        
                        <br>
                        <button type="submit" class="btn btn-primary">Save Changed</button>
                      </form>
                    </div>

                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Update Password') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ __('Ensure your account is using a long, random password to stay secure.') }}
                        </p>
                    </header>

                    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('put')

                        <div>
                            <x-input-label for="current_password" :value="__('Current Password')" />
                            <x-text-input id="current_password" name="current_password" type="password" class="mt-1 block w-full form-control"  />
                            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="password" :value="__('New Password')" />
                            <x-text-input id="password" name="password" type="password" class="mt-1 block w-full form-control" autocomplete="new-password" />
                            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                            <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full form-control" autocomplete="new-password" />
                            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                        </div>
                            <br>
                        <div class="flex items-center gap-4">
                            <x-primary-button class="btn ">{{ __('Save') }}</x-primary-button>

                            @if (session('status') === 'password-updated')
                                <p
                                    x-data="{ show: true }"
                                    x-show="show"
                                    x-transition
                                    x-init="setTimeout(() => show = false, 2000)"
                                    class="text-sm text-gray-600"
                                >{{ __('Saved.') }}</p>
                            @endif
                        </div>
                    </form>
        </div>
    </div>
</div>
@endsection