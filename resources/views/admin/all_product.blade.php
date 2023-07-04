@extends('admin.master')
@section('title', 'All Product')
@section('content')
        <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">All Product/</span> 
                <a class="btn btn-sm btn-primary" href="{{url('admin/add_product')}}">Add Product</a>
                <a data-bs-toggle="modal" data-bs-target="#add_product_modal" class="btn btn-sm btn-info" href="{{url('admin/add_product')}}">Add Product</a></h4>
                </h4>
                <!-- Basic Layout -->
              <!-- start Add Product Model  -->
              <div class="modal fade" id="add_product_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <form action="{{url('admin/store_product')}}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Title</label>
                          <input type="text" name="title" class="form-control" id="basic-default-fullname" placeholder="Laptop" />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Image</label>
                          <input type="file" name="image" class="form-control" id="basic-default-fullname" placeholder="Laptop" />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Category Name</label>
                          <select class="form-control" name="category_id" id="">
                            <option value="">Select Category</option>
                            @foreach($category as $category)
                            <option value="{{$category->id}}">{{$category->cat_name}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Price</label>
                          <input type="text" name="price" class="form-control" id="basic-default-fullname" placeholder="Laptop" />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Short Description</label>
                          <textarea name="short_desc" class="form-control" cols="30" rows="5"></textarea>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Description</label>
                          <textarea name="description" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Qty</label>
                          <input type="text" name="qty" class="form-control"/>
                        </div>
                        
                        <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Data</button>
                    </div>
                    </div>
                    </form>
                </div>
            </div>
              <!-- end Add Product Model  -->
              <!-- Start Edit Product Model  -->
              <div class="modal fade" id="view_product_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                  <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">View Product</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <form id="view_product_form">
                      <div class="mb-3">
                          <label for="recipient-name" class="col-form-label">Product Title</label>
                          <input type="text" class="form-control" name="title" id="title">
                      </div>
                      <div class="mb-3">
                          <label for="message-text" class="col-form-label">Description</label>
                          <textarea class="form-control" name="description" id="description"></textarea>
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

              <!-- End Edit Product Model  -->

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
                        <th>Name</th>
                        <th>Image</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i = 1; @endphp
                    @foreach($product as $product)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$product->title}}</td>
                        <td>
                            <img width="80px" height="80px" src='{{asset("storage/images/$product->image")}}' alt="">
                        </td>
                        <td>{{$product->category->cat_name}}</td>
                        <td>$ {{$product->price}}</td>
                        <td>
                          @if($product->qty <= 10)
                          <button class="btn btn-sm btn-danger">{{$product->qty}}</button>
                          @elseif($product->qty <= 20)
                          <button class="btn btn-sm btn-warning">{{$product->qty}}</button>
                          @else
                          <button class="btn btn-sm btn-primary">{{$product->qty}}</button>
                          @endif
                        </td>
                        <td>{{$product->created_at->format('M-d-Y')}}</td>
                        <td>
                            @if($product->status == 1)
                            <a class="btn btn-sm btn-success" href="{{url('admin/active_product', $product->id)}}">Active</a>
                            @else
                            <a class="btn btn-sm btn-warning" href="{{url('admin/inactive_product', $product->id)}}">Inactive</a>
                            @endif
                        </td>
                        <td>
                            <a data-bs-toggle="modal" data-bs-target="#view_product_modal" class="btn btn-sm btn-info view_product" 
                               href="{{url('admin/view_product', $product->id)}}">View</a>
                            <a  class="btn btn-sm btn-warning" href="{{url('admin/edit_product', $product->id)}}">Update</a>
                            <a class="btn btn-sm btn-danger" href="{{url('admin/delete_product', $product->id)}}" onclick="confirm('Are you sure to Delete this..??')">Delete</a>
                        </td>

                    </tr>
                    @php  @endphp
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Product Name</th>
                        <th>Image</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Date</th>
                        <th>Status</th>
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