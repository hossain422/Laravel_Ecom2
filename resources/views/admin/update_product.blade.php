@extends('admin.master')
@section('title', 'Update Product')
@section('content')
 <!-- Content -->

 <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Update Product/</span> 
              <a class="btn btn-sm btn-primary" href="{{url('admin/all_product')}}">All Product</a></h4>

              <!-- Basic Layout -->
              <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Basic Layout</h5>
                      <small class="text-muted float-end">Default label</small>
                    </div>
                    <div class="card-body">
                      <form action="{{url('admin/update_product', $product->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Title</label>
                          <input type="text" name="title" class="form-control" id="basic-default-fullname" value="{{$product->title}}" />
                        </div>
                        <div class="mb-3">
                          <!-- <label class="form-label">Image</label> -->
                          <img width="80px" height="80px" src='{{asset("storage/images/$product->image")}}' alt="">
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Image</label>
                          <input type="file" name="image" class="form-control" id="basic-default-fullname" placeholder="Laptop" />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Category Name</label>
                          <select class="form-control" name="category_id" id="">
                            <option value="{{$product->category_id}}">{{$product->category->cat_name}}</option>
                            @foreach($category as $category)
                            <option value="{{$category->id}}">{{$category->cat_name}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Price</label>
                          <input type="text" name="price" class="form-control" id="basic-default-fullname" value="{{$product->price}}" />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Short Description</label>
                          <textarea name="short_desc" class="form-control" cols="30" rows="5">{{$product->short_desc}}</textarea>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Description</label>
                          <textarea name="description" class="form-control" cols="30" rows="10">{{$product->description}}</textarea>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Qty</label>
                          <input type="text" name="qty" class="form-control" value="{{$product->qty}}"/>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Update</button>
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