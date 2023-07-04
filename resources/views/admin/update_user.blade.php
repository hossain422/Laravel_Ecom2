@extends('admin.master')
@section('title', 'Update User')
@section('content')
 <!-- Content -->

 <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Update User/</span> 
              <a class="btn btn-sm btn-primary" href="{{url('admin/users')}}">All User</a></h4>

              <!-- Basic Layout -->
              @if(session('success'))
              <script>
                $('.basic-demo').on('click',function ( e ) {
                e.preventDefault();
                $.toast({
                  text :"{{session('success')}}"
                })
                })
              </script>
              @endif
              <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Basic Layout</h5>
                      <small class="text-muted float-end">Default label</small>
                    </div>
                    <div class="card-body">
                      <form action="{{url('admin/update_user', $user->id)}}" method="post">
                        @csrf
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">User Role</label>
                          <select class="form-control" name="user_type" required >
                            @if($user->user_type == 1)
                            <option value="1">User</option>
                            @else
                            <option value="2">Admin</option>
                            @endif
                            <option value="1">User</option>
                            <option value="2">Admin</option>
                          </select>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Name</label>
                          <input type="text" name="cat_name" class="form-control" id="basic-default-fullname" value="{{$user->name}}" />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Email</label>
                          <input type="text" name="cat_name" class="form-control" id="basic-default-fullname" value="{{$user->email}}" />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Phone</label>
                          <input type="text" name="cat_name" class="form-control" id="basic-default-fullname" value="{{$user->phone}}" />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Country</label>
                          <input type="text" name="cat_name" class="form-control" id="basic-default-fullname" value="{{$user->country}}" />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">City</label>
                          <input type="text" name="cat_name" class="form-control" id="basic-default-fullname" value="{{$user->city}}" />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Address</label>
                          <input type="text" name="cat_name" class="form-control" id="basic-default-fullname" value="{{$user->address}}" />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Zip Code</label>
                          <input type="text" name="cat_name" class="form-control" id="basic-default-fullname" value="{{$user->zip}}" />
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