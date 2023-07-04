@extends('admin.master')
@section('title', 'Add Category')
@section('content')
 <!-- Content -->

 <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Add Category/</span> 
              <a class="btn btn-sm btn-primary" href="{{url('admin/all_category')}}">All Category</a></h4>

              <!-- Basic Layout -->
              <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Basic Layout</h5>
                      <small class="text-muted float-end">Default label</small>
                    </div>
                    <div class="card-body">
                      <form action="{{url('admin/store_category')}}" method="post">
                        @csrf
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Category Name</label>
                          <input type="text" name="cat_name" class="form-control" id="basic-default-fullname" placeholder="Laptop" />
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                    </div>
                  </div>
                </div>
                <div class="col-xl">
                  <div class="card mb-4">
                    
                    
                  </div>
                </div>
              </div>
            </div>
            <!-- / Content -->
@endsection