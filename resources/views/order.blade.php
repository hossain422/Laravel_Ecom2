@extends('layouts.master')
@section('title', 'Dashboard')
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
                <a class="btn  {{request()->is('profile') ? 'active' : ''}}" href="{{url('profile')}}">Profile</a> <br>
                <a class="btn btn1  {{request()->is('order') ? 'active' : ''}}" href="{{url('order')}}">My Order</a> <br>
                <a class=" btn btn1  {{request()->is('wishlist') ? 'active' : ''}}" href="{{url('Wishlist')}}">Wishlist</a> <br>
                <a class="btn btn1  {{request()->is('dashboard') ? 'active' : ''}}" href="{{url('dashboard')}}">Dashboard</a> <br>
                <a class="btn btn1 btn2  " href="{{url('logout')}}">Logout</a>
            </ul>
        </div>
        <div class="col-md-9">
            <h3>Your Order</h3>
            <hr>
            <table id="example" class="display table border" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Invoice</th>
                        <th>Payment Type</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i = 1; @endphp
                    @foreach($order as $order)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$order->invoice}}</td>
                        <td>{{$order->payment_type}}</td>
                        <td>$ {{$order->total}}</td>
                        
                        <td>
                            @if($order->status == 1)
                            <button class="btn btn-sm btn-warning">Pending</button>
                            @else
                            <button class="btn btn-sm btn-success">Completed</button>
                            @endif
                        </td>
                        <td>{{$order->created_at->format('M-d-Y')}}</td>
                        <td>
                            <a class="btn btn-sm btn-info" href="{{url('order_details', $order->invoice)}}">View</a>
                            <a class="btn btn-sm btn-primary" href="{{url('download_invoice', $order->invoice)}}">Download</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                        <th>#</th>
                        <th>Invoice</th>
                        <th>Payment Type</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Action</th>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection