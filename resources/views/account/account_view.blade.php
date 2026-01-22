 @extends('layouts.app')


 @section('contenet')
     <div class="content-wrapper">

         <div class="content-header">
             <div class="container-fluid">
                 <div class="row mb-2">
                     <div class="col-sm-6">
                         <h1 class="m-0">My_Account</h1>
                     </div>
                     <div class="col-sm-6">
                         <ol class="breadcrumb float-sm-right">
                             <li class="breadcrumb-item"><a href="#">My_Account</a></li>
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
                         <div class="card card-outline card-primary">
                             <div class="card-header border-transparent">
                                 {{--      <h3 class="card-title">Add New Member list</h3> --}}
                                 <div class="card-tools">
                                     <a href="{{ url('user/account/password') }}" class="btn btn-tool btn-primary"> Change
                                         Password <i class="fas fa-"></i> </a>

                                     <a href="{{ url('dashboard/user_list') }}" class="btn btn-tool btn-primary">
                                         Go Back
                                     </a>
                                     <button type="button" class="btn btn-tool" data-card-widget="remove">
                                         <i class="fas fa-times"></i></button>
                                 </div>
                             </div>



                             <form class="form-horizontal" enctype="multipart/form-data" method = "POST"
                                 action = "{{ route('user.userUpdate') }}">
                                 {{ csrf_field() }}


                                 @include('_message')

                                 <div class="card-body">
                                     <div class="container">
                                         <div class="card card-outline card-primary">
                                             <div class="card-header text-center">
                                                 <a href="{{ url('user/myaccount/account') }}" class="h3"><b> Update
                                                     </b> </a>
                                             </div>
                                             <div class="card-body">
                                                 <div class="input-group mb-3">
                                                     <input type="text" class="form-control" name = "name"
                                                         value="{{ $user->name }}">
                                                     <div class="input-group-append">
                                                         <div class="input-group-text">
                                                             <span class="fas fa-user"></span>
                                                         </div>
                                                     </div>
                                                 </div>
                                                 <span style="color: red"> {{ $errors->first('email') }} </span>
                                                 <div class="input-group mb-3">
                                                     <input type="email" class="form-control" name="email"
                                                         value="{{ $user->email }}">
                                                     <div class="input-group-append">
                                                         <div class="input-group-text">
                                                             <span class="fas fa-envelope"></span>
                                                         </div>
                                                     </div>
                                                 </div>
                                                 <span style="color: red"> {{ $errors->first('image') }} </span>
                                                 <div class="input-group mb-3">
                                                     <input type="file" class="form-control" name = "image">
                                                     <div class="input-group-append">
                                                         <div class="input-group-text">
                                                             <span class="fas fa-image"></span>
                                                         </div>
                                                     </div>
                                                 </div>
                                                 @if (!empty(Auth::user()->image))
                                                     @if (file_exists('storage/' . Auth::user()->image))
                                                         <img src="{{ url('storage/' . Auth::user()->image) /* asset('dist/img/user1-128x128.jpg') */ }}"
                                                             alt="User Avatar" sty class="mr-3 img-circle" width="150" style="border-radius: 8px">
                                                     @endif
                                                 @endif
                                                 {{--  <img src="{{ $imageUrl }}" alt=" " width="150" style="border-radius: 8px"> --}}
                                                 {{-- {{ dd(asset($imageUrl)) }} --}}
                                                 {{-- {{ dd($user->image_url) }} --}}

                                                 {{-- <div class="input-group mb-3">
                                                         <img src="{{ $user->image && Storage::disk('public')->exists($user->image)
                                                     ? Storage::url($user->image) : asset('upload/5601.jpg') }}" alt="">
                                                        </div> --}}


                                                 <div class="row">

                                                     <div class="col-8"></div>

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
                                     <a href="{{ url('dashboard/user_list') }}"
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
