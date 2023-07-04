<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>Order Invoice</title>
</head>
<body>
    <h2 style="background: green; color: #fff; text-align:center; padding:5px;" >Order Invoice</h2>
    
    <h1>Ecom2</h1>
    @foreach($shipping as $shipping)
    <table class="float border table-stripe">
        <tr>
            <th>Name</th>
            <td>:</td>
            <td>{{$shipping->name}}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>:</td>
            <td>{{$shipping->email}}</td>
        </tr>
        <tr>
            <th>Phone</th>
            <td>:</td>
            <td>{{$shipping->phone}}</td>
        </tr>
        
    </table>
    @endforeach
    <hr>
    <h4>Order :</h4>
    <table class="table border">
       <thead>
       <tr>
            <th>Invoice</th>
            <th>Payment Type</th>
            <th>Total Price</th>
            <th>Sub Total</th>
            <th>Date</th>
            <th>Status</th>
        </tr>
       </thead>
        @foreach($order as $order)
        <tbody>
        <tr>
            <td>{{$order->invoice}}</td>
            <td>{{$order->payment_type}}</td>
            <td>$ {{$order->total}}</td>
            <td>$ {{$order->sub_total}}</td>
            <td>{{$order->created_at->format('d-M-Y')}}</td>
            <td>
                @if($order->status == 1)
                <button class="btn btn-sm btn-warning">Pending</button>
                @else
                <button class="btn btn-sm btn-success">Completed</button>
                @endif
            </td>
        </tr>
        </tbody>
        @endforeach 
    </table>
    <hr>
    <h4>Order Item :</h4>
    <table class="table border">
       <tr>
            <th>Invoice</th>
            <th>Image</th>
            <th>Name</th>
            <th>Unit Price</th>
            <th>Qty</th>
            <th>Total</th>
        </tr>
        
        @foreach($order_item as $order)
        <tr>
            <td>{{$order->order_id}}</td>
            <td>
                <img width="60px" height="60px" src="{{asset('storage/images/'.$order->product->image)}}" alt="">
            </td>
            <td>{{$order->product->title}}</td>
            <td>$ {{$order->price}}</td>
            <td>{{$order->qty}}</td>
            <td>
                @php $item_total = $order->price * $order->qty @endphp
               $ {{$item_total}}
            </td>
        </tr>
        @endforeach 
    </table>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>