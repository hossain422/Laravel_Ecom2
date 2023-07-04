@extends('admin.master')
@section('title', 'Manage Order')
@section('content')
        <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Orders/</span> 
                <!-- <a class="btn btn-sm btn-primary" href="{{url('admin/add_product')}}">Add Product</a>
                <a data-bs-toggle="modal" data-bs-target="#add_product_modal" class="btn btn-sm btn-info" href="{{url('admin/add_product')}}">Add Product</a></h4> -->
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
                            <a href="{{url('admin/pending_order', $order->id)}}" class="btn btn-sm btn-warning">Pending</a>
                            @else
                            <a href="{{url('admin/completed_order', $order->id)}}" class="btn btn-sm btn-success">Completed</a>
                            @endif
                        </td>
                        <td>{{$order->created_at->format('M-d-Y')}}</td>
                        <td>
                            <a class="btn btn-sm btn-info" href="{{url('admin/order_details', $order->invoice)}}">View</a>
                            <a class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to Delete this.??')" href="{{url('admin/delete_order', $order->id)}}">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Invoice</th>
                        <th>Payment Type</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
              </table>


    <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Open modal for @mdo</button> -->
    
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">New message</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form>
            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Recipient:</label>
                <input type="text" class="form-control" id="recipient-name">
            </div>
            <div class="mb-3">
                <label for="message-text" class="col-form-label">Message:</label>
                <textarea class="form-control" id="message-text"></textarea>
            </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Send message</button>
        </div>
        </div>
    </div>
    </div>

              
        </div>
            <!-- / Content -->

            <script>
              $(document).ready(function(){
                var table = $('#example').DataTable();
                table.on('click', '.view_product', function(){
                  $tr = $(this).closest('tr');
                  if($($tr).hasClass('child')){
                    $tr - $tr.prev('parent');
                  }

                  var data = table.row($tr).data();
                  console.log($data);

                  $('#title').val(data[1]);
                  $('title').val(data[1]);
                  $('title').val(data[1]);
                  $('#des').val(data[1]);

                });
              });
            </script>
@endsection