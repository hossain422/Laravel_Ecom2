@extends('admin.master')
@section('title', 'Order Details')
@section('content')
        <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Order Details/</span> 
                <a class="btn btn-sm btn-primary" href="{{url('admin/order')}}">Manage Order</a>
                <!-- <a data-bs-toggle="modal" data-bs-target="#add_product_modal" class="btn btn-sm btn-info" href="{{url('admin/add_product')}}">Add Product</a></h4> -->
                </h4>
                <!-- Basic Layout -->
              
              

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
              
                <div class="row">
                  <div class="col-md-7">
                    <h3>Shipping Address</h3>
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
                  <div class="col-md-5">
                    <h3>Items</h3>
                    <table id="" class="display table border" style="width:100%">
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
                  </div>
                </div>
              
        </div>
            <!-- / Content -->

@endsection