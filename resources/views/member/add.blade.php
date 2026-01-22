 @extends('layouts.app')


 @section('contenet')
     <div class="content-wrapper">

         <div class="content-header">
             <div class="container-fluid">
                 <div class="row mb-2">
                     <div class="col-sm-6">
                         <h1 class="m-0">Add Member</h1>
                     </div>
                     <div class="col-sm-6">
                         <ol class="breadcrumb float-sm-right">
                             <li class="breadcrumb-item"><a href="#">Member</a></li>
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
                                     <a href="{{ url('admin/member/index') }}" class="btn btn-tool btn-primary">
                                         Go Back
                                     </a>
                                     <button type="button" class="btn btn-tool" data-card-widget="remove">
                                         <i class="fas fa-times"></i></button>
                                 </div>
                             </div>

                             <form class="form-horizontal" method = "POST" action = "{{ route('admin.memberStore') }}">
                                {{ csrf_field() }}
                                 <div class="card-body">
                                     <div class="form-group row">
                                         <label for="inputEmail3" class="col-sm-2 col-form-label">Member Name :</label>
                                         <div class="col-sm-10">
                                             <input type="text" class="form-control" id="inputEmail3"
                                                 placeholder="Enter Member Name....." name = "member_name" required>
                                         @error('member_name')
                                             <p class = "text-danger text-center"> * {{ $message }}</p>
                                         @enderror
                                         </div>
                                     </div>
                                     <div class="form-group row">
                                         <label for="inputPassword3" class="col-sm-2 col-form-label">Member Address :</label>
                                         <div class="col-sm-10">
                                             <textarea name="member_address" class="form-control" id="" placeholder="Enter member address...." required></textarea>
                                         </div>
                                     </div>
                                     <div class="form-group row">
                                         <label for="inputEmail3" class="col-sm-2 col-form-label">Member Telephone :</label>
                                         <div class="col-sm-10">
                                             <input type="number" class="form-control" id="inputNumber1"
                                                 placeholder="+1234567890" name = "member_telephone" required>
                                         </div>
                                     </div>
                                 </div>

                                 <div class="card-footer">
                                     <button type="submit" class="btn btn-info">Add Member</button>
                                     <a href="{{ url('admin/member/index') }}" class="btn btn-default float-right">Cancel</a>
                                 </div>

                             </form>

                             {{-- <div class="card-footer clearfix">
                                 <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>
                                 <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All
                                     Orders</a>
                             </div> --}}

                         </div>
                     </div>





                 </div>

             </div>


         </section>


     </div>
 @endsection
