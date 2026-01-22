 @extends('layouts.app')


 @section('contenet')
     <div class="content-wrapper">

         <div class="content-header">
             <div class="container-fluid">
                 <div class="row mb-2">
                     <div class="col-sm-6">
                         <h1 class="m-0">Update Supplier</h1>
                     </div>
                     <div class="col-sm-6">
                         <ol class="breadcrumb float-sm-right">
                             <li class="breadcrumb-item"><a href="#">Supplier</a></li>
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
                                     <a href="{{ url('admin/supplier/index') }}" class="btn btn-tool btn-primary">
                                         Go Back
                                     </a>
                                     <button type="button" class="btn btn-tool" data-card-widget="remove">
                                         <i class="fas fa-times"></i></button>
                                 </div>
                             </div>

                             <form class="form-horizontal" method = "POST" action = "{{ url('admin/supplierUpdate/'.$getRecord['id']) }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{ $getRecord['id'] }}">
                                 <div class="card-body">
                             <div class="form-group row">
                                 <label for="supplier_name" class="col-sm-2 col-form-label">Name:</label>
                                 <div class="col-sm-10">
                                     <input type="text" class="form-control" id="supplier_name" name = "supplier_name" value="{{ $getRecord['supplier_name'] }}">
                                 </div>
                             </div>
                              <div class="form-group row">
                                 <label for="supplier_email" class="col-sm-2 col-form-label">Email:</label>
                                 <div class="col-sm-10">
                                     <input type="email" class="form-control" id="supplier_email"name = "supplier_email" value="{{ $getRecord['supplier_email'] }}">
                                 </div>
                             </div>
                             <div class="form-group row">
                                 <label for="supplier_telephone" class="col-sm-2 col-form-label">Telephone:</label>
                                 <div class="col-sm-10">
                                     <input type="number" class="form-control" id="supplier_telephone" name = "supplier_telephone" value="{{ $getRecord['supplier_telephone'] }}">
                                 </div>
                             </div>
                             <div class="form-group row">
                                 <label for="supplier_address" class="col-sm-2 col-form-label">Address:</label>
                                 <div class="col-sm-10">
                                     <textarea name="supplier_address" class="form-control">{{ $getRecord['supplier_address'] }}</textarea>
                                 </div>
                             </div>
                             
                         </div>

                         <div class="card-footer">
                             <button type="submit" class="btn btn-info">Update Supplier</button>
                             {{-- <a href="{{ url('admin/member/index') }}" class="btn btn-default float-right">Cancel</a> --}}
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
