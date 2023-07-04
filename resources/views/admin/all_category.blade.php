@extends('admin.master')
@section('title', 'All Category')
@section('content')
        <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">All Category/</span> 
                <!-- <a class="btn btn-sm btn-primary" href="{{url('admin/add_category')}}">Add Category</a> -->
                <a data-bs-toggle="modal" data-bs-target="#add_category_modal" class="btn btn-sm btn-info" 
                    href="{{url('admin/add_category')}}">Add Category</a></h4>
              <!-- Basic Layout -->


              <!-- Start Edit Product Model  -->
              <div class="modal fade" id="add_category_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <form action="{{url('admin/store_category')}}" method="post">
                        @csrf
                  <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Category Name</label>
                          <input type="text" name="cat_name" class="form-control" id="basic-default-fullname" placeholder="Laptop" />
                        </div>
                        
                        <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                     
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                  </div>
                 </form>
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
                        <th>Category Name</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i = 1; @endphp
                    @foreach($categories as $category)
                    <tr>
                        <td class="id">{{$i++}}</td>
                        <td class="cat_name">{{$category->cat_name}}</td>
                        <td>
                            @if($category->status == 1)
                            <a class="btn btn-sm btn-success" href="{{url('admin/active_category', $category->id)}}">Active</a>
                            @else
                            <a class="btn btn-sm btn-warning" href="{{url('admin/inactive_category', $category->id)}}">Inactive</a>
                            @endif
                        </td>
                        <td>{{$category->created_at->format('M-d-Y')}}</td>
                        <td>
                            <a class="btn btn-sm btn-warning" href="{{url('admin/edit_category', $category->id)}}">Update</a>
                            <a class="btn btn-sm btn-danger" href="{{url('admin/delete_category', $category->id)}}" onclick="confirm('Are you sure to Delete this..??')">Delete</a>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Category Name</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
              </table>

              
        </div>

        <script>
            $(document).on('click', '.view_category', function(){
                var _this = $(this).parents('tr');
                $('#id').val(_this.find('.id').text());
                $('#cat_name').val(_this.find('.cat_name').text());
            });
        </script>
            <!-- / Content -->
@endsection