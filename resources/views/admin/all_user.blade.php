@extends('admin.master')
@section('title', 'All User')
@section('content')
        <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">All User/</span> 
                <!-- <a class="btn btn-sm btn-primary" href="{{url('admin/add_category')}}">Add Category</a> -->
                <a data-bs-toggle="modal" data-bs-target="#add_user_modal" class="btn btn-sm btn-info" 
                    href="#">Add User</a></h4>
              <!-- Basic Layout -->


              <!-- Start Edit Product Model  -->
              <div class="modal fade" id="add_user_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
              <form method="POST" action="{{ url('admin/add_user') }}">
                       @csrf
                  <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    
                            <fieldset class="wrap-title">

                                <h3 class="form-title">Create an account</h3>
                               
                            </fieldset>									
                            <fieldset class="wrap-input">
                                <label for="frm-reg-lname">User Role*</label>
                                <select class="form-control" required name="user_type" id="">
                                    <option value="">User Role</option>
                                    <option value="1">Normal User</option>
                                    <option value="2">Admin</option>
                                </select>
                                <x-input-error :messages="$errors->get('user_type')" class="mt-2" />
                            </fieldset>
                            <fieldset class="wrap-input">
                                <label for="frm-reg-lname">Name*</label>
                                <input type="text" class="form-control" id="frm-reg-lname" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Last name*">
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </fieldset>
                            <fieldset class="wrap-input">
                                <label for="frm-reg-email">Email Address*</label>
                                <input type="email" class="form-control" id="frm-reg-email" name="email" :value="old('email')" required autocomplete="username" placeholder="Email address">
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </fieldset>
                            
                            
                            <fieldset class="wrap-input item-width-in-half left-item ">
                                <label for="frm-reg-pass">Password *</label>
                                <input class="form-control" type="password"
                                    name="password"
                                    required autocomplete="new-password" placeholder="Password">
                            </fieldset>
                            <fieldset class="wrap-input item-width-in-half ">
                                <label for="frm-reg-cfpass">Confirm Password *</label>
                                <input class="form-control" type="password"
                                    name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                            </fieldset>
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                                {{ __('Already registered?') }}
                            </a> <br>
                            <!-- <input type="submit" class="btn btn-sign" value="Register" name="register"> -->
                        
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
                        <th>User Name</th>
                        <th>Email</th>
                        <th>User Role</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i = 1; @endphp
                    @foreach($user as $user)
                    <tr>
                        <td class="id">{{$i++}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            @if($user->user_type == 1)
                            <a class="btn btn-sm btn-primary" href="#">User</a>
                            @else
                            <a class="btn btn-sm btn-primary" href="#">Admin</a>
                            @endif
                        </td>
                        
                        <td>{{$user->created_at->format('M-d-Y')}}</td>
                        
                        <td>
                            <a class="btn btn-sm btn-info" href="{{url('admin/update_user', $user->id)}}">View</a>
                            @if($user->creator == Auth::user()->id)
                            <a class="btn btn-sm btn-warning" href="{{url('admin/update_user', $user->id)}}">Update</a>
                            <a class="btn btn-sm btn-danger" href="{{url('admin/delete_user', $user->id)}}" onclick="confirm('Are you sure to Delete this..??')">Delete</a>
                                <!-- @else
                            <a class="btn btn-sm btn-warning disabled"  href="{{url('admin/update_user', $user->id)}}">Update</a>
                            <a class="btn btn-sm btn-danger disabled"  href="{{url('admin/delete_user', $user->id)}}" onclick="confirm('Are you sure to Delete this..??')">Delete</a> -->
                            @endif
                        </td>
                        

                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>User Role</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
              </table>

              
        </div>

       
            <!-- / Content -->
@endsection