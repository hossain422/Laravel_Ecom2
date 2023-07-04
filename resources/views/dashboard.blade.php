@extends('layouts.master')
@section('title', 'Dashboard')
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
        <div class="col-md-9">
            <h3>Welcome {{Auth::user()->name}}</h3>
        </div>
    </div>
</div>
@endsection