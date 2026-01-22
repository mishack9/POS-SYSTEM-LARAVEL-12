 @extends('layouts.app')


 @section('contenet')
     <div class="content-wrapper">

         <div class="content-header">
             <div class="container-fluid">
                 <div class="row mb-2">
                     <div class="col-sm-6">
                         <h1 class="m-0">Add User</h1>
                     </div>
                     <div class="col-sm-6">
                         <ol class="breadcrumb float-sm-right">
                             <li class="breadcrumb-item"><a href="#">User</a></li>
                             <li class="breadcrumb-item active">Dashboard</li>
                         </ol>
                     </div>
                 </div>
             </div>
         </div>


         <section class="content">
             <div class="container-fluid">





                 <div class="row">
                     <div class="col-md-12 col-lg-12 col-sm-12">
                         <div class="card">
                             <div class="card-header border-transparent">
                                 {{--      <h3 class="card-title">Add New Member list</h3> --}}
                                 <div class="card-tools">
                                     <a href="{{ url('admin/user/manage') }}" class="btn btn-tool btn-primary">
                                         Go Back
                                     </a>
                                     <button type="button" class="btn btn-tool" data-card-widget="remove">
                                         <i class="fas fa-times"></i></button>
                                 </div>
                             </div>

                             <form class="form-horizontal" method = "POST" action = "{{ route('admin.userStore') }}">
                                 {{ csrf_field() }}

                                 <div class="card-body">
                                     <div class="container">
                                         <div class="card card-outline card-primary">
                                             <div class="card-header text-center">
                                                 <a href="" class="h1"><b>Register </b> User </a>
                                             </div>
                                             <div class="card-body">
                                                 <p class="login-box-msg">Register a new user</p>
                                                 <form action="" method="post">
                                                     <div class="input-group mb-3">
                                                         <input type="text" name="name" class="form-control"
                                                             placeholder="Full name" value="{{ old('name') }}">
                                                         <div class="input-group-append">
                                                             <div class="input-group-text">
                                                                 <span class="fas fa-user"></span>
                                                             </div>
                                                         </div>
                                                     </div>
                                                     @error('name')
                                                                 <p class = "text-danger text-center"> * {{ $message }}</p>
                                                             @enderror
                                                     <div class="input-group mb-3">
                                                         <input type="email" name="email" class="form-control"
                                                             placeholder="Email" value="{{ old('email') }}">
                                                         <div class="input-group-append">
                                                             <div class="input-group-text">
                                                                 <span class="fas fa-envelope"></span>
                                                             </div>
                                                         </div>
                                                     </div>
                                                      @error('email')
                                                                 <p class = "text-danger text-center"> * {{ $message }}</p>
                                                             @enderror
                                                     <div class="input-group mb-3">
                                                         <input type="password" name="password" class="form-control"
                                                             placeholder="Password">
                                                         <div class="input-group-append">
                                                             <div class="input-group-text">
                                                                 <span class="fas fa-lock"></span>
                                                             </div>
                                                         </div>
                                                     </div>
                                                      @error('password')
                                                                 <p class = "text-danger text-center"> * {{ $message }}</p>
                                                             @enderror
                                                     <div class="input-group mb-3">
                                                         <input type="password" name="password_confirmation" class="form-control"
                                                             placeholder="Retype password">
                                                         <div class="input-group-append">
                                                             <div class="input-group-text">
                                                                 <span class="fas fa-lock"></span>
                                                             </div>
                                                         </div>
                                                     </div>
                                                     <div class="row">

                                                         <div class="col-4">
                                                             <button type="submit"
                                                                 class="btn btn-primary btn-block">Save</button>
                                                         </div>

                                                     </div>
                                                 </form>

                                             </div>

                                         </div>
                                     </div>
                                 </div>

                                 <div class="card-footer">
                                     <a href="{{ url('admin/user/manage') }}" class="btn btn-default float-right">Cancel</a>
                                 </div>

                             </form>

                         </div>
                     </div>





                 </div>

             </div>


         </section>


     </div>
 @endsection
