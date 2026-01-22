 @extends('layouts.app')


 @section('contenet')
     <div class="content-wrapper">

         <div class="content-header">
             <div class="container-fluid">
                 <div class="row mb-2">
                     <div class="col-sm-6">
                         <h1 class="m-0">Password</h1>
                     </div>
                     <div class="col-sm-6">
                         <ol class="breadcrumb float-sm-right">
                             <li class="breadcrumb-item"><a href="#">Password/Update</a></li>
                             <li class="breadcrumb-item active">Dashboard</li>
                         </ol>
                     </div>
                 </div>
             </div>
         </div>


         <section class="content">
             <div class="container-fluid">


   @include('_message')


                 <div class="row">
                     <div class="col-md-12 col-lg-12 col-sm-12">
                         <div class="card card-outline card-primary">
                             <div class="card-header border-transparent">
                                 {{--      <h3 class="card-title">Add New Member list</h3> --}}
                                 <div class="card-tools">

                                     <a href="{{ url('user/myaccount/account') }}" class="btn btn-tool btn-primary">
                                         Go Back
                                     </a>
                                     <button type="button" class="btn btn-tool" data-card-widget="remove">
                                         <i class="fas fa-times"></i></button>
                                 </div>
                             </div>

                             <form class="form-horizontal" enctype="multipart/form-data" method = "POST"
                                 action = "{{ route('user.user.passwordUpdate') }}">
                                 {{ csrf_field() }}
                                 <div class="card-body">
                                     <div class="container">
                                         <div class="card card-outline card-primary">
                                             <div class="card-header text-center">
                                                 <a href="#}" class="h3"><b> Update Password
                                                     </b> </a>
                                             </div>
                                             <div class="card-body">
                                                
                                                    <span style="color: red"> {{ $errors->first('old_password') }} </span>
                                                 <div class="input-group mb-3">
                                                     <input type="password" class="form-control" name = "old_password"
                                                         placeholder="Enter Old Password">
                                                     <div class="input-group-append">
                                                         <div class="input-group-text">
                                                             <span class="fas fa-key"></span>
                                                         </div>
                                                     </div>
                                                 </div>
                                                 
                                                 <span style="color: red"> {{ $errors->first('password') }} </span>
                                                 <div class="input-group mb-3">
                                                     <input type="password" class="form-control" name="password"
                                                         placeholder="Enter New Password" value="{{ old('password') }}">
                                                     <div class="input-group-append">
                                                         <div class="input-group-text">
                                                             <span class="fas fa-key"></span>
                                                         </div>
                                                     </div>
                                                 </div>
                                                 
                                                 <span style="color: red"> {{ $errors->first('confirm_password') }} </span>
                                                 <div class="input-group mb-3">
                                                     <input type="password" class="form-control" name="confirm_password"
                                                         placeholder="Enter Password Confirmation" value="{{ old('confirm_password') }}">
                                                     <div class="input-group-append">
                                                         <div class="input-group-text">
                                                             <span class="fas fa-key"></span>
                                                         </div>
                                                     </div>
                                                 </div>

                                                 <div class="row">

                                                     <div class="col-4">
                                                         <button type="submit"
                                                             class="btn btn-primary btn-block">Update</button>
                                                     </div>

                                                 </div>

                                             </div>

                                         </div>
                                     </div>
                                 </div>

                                 <div class="card-footer">
                                     <a href="{{ url('user/myaccount/account') }}"
                                         class="btn btn-default float-right">Cancel</a>
                                 </div>

                             </form>



                         </div>
                     </div>





                 </div>

             </div>


         </section>


     </div>
 @endsection
