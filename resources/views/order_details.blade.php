@extends('layouts.master')
@section('title', 'Order Details')
@section('content')
<style>
    .btn1{
        background-color: black;
        color: #fff;
        margin-bottom: 1px;
        width: 100%;
        border: none;
    }
    .active{
        background-color: gray;
    }
    .btn2{
        background-color: red;
    }
    .btn1:hover{
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
                <a class="mb-3 btn btn1 {{request()->is('dashboard') ? 'active' : ''}} " href="{{url('dashboard')}}">Dashboard</a> <br>
                <a class="btn btn1  {{request()->is('order') ? 'active' : ''}}" href="{{url('order')}}">My Order</a> <br>
                <a class=" btn btn1  {{request()->is('wishlist') ? 'active' : ''}}" href="{{url('Wishlist')}}">Wishlist</a> <br>
                <a class="btn btn1  {{request()->is('dashboard') ? 'active' : ''}}" href="{{url('dashboard')}}">Dashboard</a> <br>
                <a class="btn btn1 btn2  " href="{{url('logout')}}">Logout</a>
            </ul>
        </div>
        <div class="col-md-9">
            <h3>Order Items</h3>
            <hr>
            <table id="example" class="display table border" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Qty</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i = 1; @endphp
                    @foreach($order_item as $order)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$order->product->title}}</td>
                        <td>
                            <img width="80px" height="80px" src='{{asset("storage/images/".$order->product->image)}}' alt="">
                        </td>
                        <td>{{$order->qty}}</td>
                        <td>$ {{$order->price}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <br>
            <h3>Shipping Address</h3>
            <hr>
            @foreach($shipping as $shipping)
            <table class="table border">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>:</th>
                        <td>{{$shipping->name}}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <th>:</th>
                        <td>{{$shipping->email}}</td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <th>:</th>
                        <td>{{$shipping->phone}}</td>
                    </tr>
                    <tr>
                        <th>Country</th>
                        <th>:</th>
                        <td>{{$shipping->country}}</td>
                    </tr>
                    <tr>
                        <th>City</th>
                        <th>:</th>
                        <td>{{$shipping->city}}</td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <th>:</th>
                        <td>{{$shipping->address}}</td>
                    </tr>
                    <tr>
                        <th>Post/Zip code</th>
                        <th>:</th>
                        <td>{{$shipping->zip}}</td>
                    </tr>

                </thead>
            </table>
            @endforeach
        </div>
    </div>
</div>
@endsection