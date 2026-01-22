 @extends('layouts.app')


 @section('contenet')
     <div class="content-wrapper">

         <div class="content-header">
             <div class="container-fluid">
                 <div class="row mb-2">
                     <div class="col-sm-6">
                         <h1 class="m-0">Supplier Area</h1>
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
                         {{-- filter search start --}}

                         <div class="card">
                             <div class="card-header border-transparent">
                                 <h3 class="card-title">Filter Supplier<i class="fas fa-filter"></i></h3>
                                 <div class="card-tools">
                                     <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                         <i class="fas fa-minus"></i>
                                     </button>
                                     <button type="button" class="btn btn-tool" data-card-widget="remove">
                                         <i class="fas fa-times"></i>
                                     </button>
                                 </div>
                             </div>

                             <div class="card-body p-0">

                                 <form id="">
                                     <div class="card-body">
                                         <div class="row">

                                             <div class="form-group col-md-4 col-sm-6 col-lg-4">
                                                 <label for="supplier_name">Supplier_ID</label>
                                                 <input type="number" class="form-control" placeholder="Search ID"
                                                     name="id" value="{{ Request()->id }}">
                                             </div>

                                             <div class="form-group col-md-4 col-sm-6 col-lg-4">
                                                 <label for="supplier_name">Supplier_Name</label>
                                                 <input type="text" class="form-control" placeholder="Search by name"
                                                     name="supplier_name" value="{{ Request()->supplier_name }}">
                                             </div>

                                             <div class="form-group col-md-4 col-sm-6 col-lg-4">
                                                 <label for="supplier_email">Supplier_Email</label>
                                                 <input type="email" class="form-control" placeholder="Search by email"
                                                     name="supplier_email" value="{{ Request()->supplier_email }}">
                                             </div>

                                             <div class="form-group col-md-4 col-sm-6 col-lg-4">
                                                 <label for="supplier_telephone">Supplier_Phone</label>
                                                 <input type="number" id="supplier_telephone" class="form-control"
                                                     placeholder="Search by phone number" name="supplier_telephone"
                                                     value="{{ Request()->supplier_telephone }}">
                                             </div>

                                             <div class="form-group col-md-4 col-sm-6 col-lg-4">
                                                 <label for="supplier_name">Created_Date</label>
                                                 <input type="date" class="form-control" placeholder="Search by date"
                                                     name="created_at" value="{{ Request()->created_at }}">
                                             </div>

                                         </div>

                                         <button type="submit" class="btn btn-sm btn-info float-left">Filter
                                             Supplier</button>
                                         <a href="{{ url('admin/supplier/index') }}"
                                             class="btn btn-sm btn-secondary float-right">Reset</a>
                                     </div>
                                 </form>

                             </div>

                             {{--   <div class="card-footer clearfix">
         <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>
         <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All
             Orders</a>
     </div> --}}

                         </div>


                         {{-- filter search end --}}
                         @include('_message')
                         <div class="card">
                             <div class="card-header border-transparent">

                                 <h3 class="card-title">Suppliers list</h3>
                                 <div class="card-tools">
                                     {{--  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                         <i class="fas fa-minus"></i>
                                     </button> --}}
                                     <button type="button" class="btn btn-tool" data-card-widget="remove">
                                         <i class="fas fa-times"></i></button>
                                     <button class="btn btn-sm btn-primary" data-toggle="modal"
                                         data-target="#modal-secondary">Add_New_Supplier <i
                                             class="fas fa-plus"></i></button>
                                 </div>
                             </div>

                             <div class="card-body p-0">
                                 <div class="table-responsive">
                                     {{-- @include('_message') --}}
                                     <table class="table m-0" id="product-table">
                                         <thead>
                                             <tr>
                                                 <th class="text-center">#</th>
                                                 <th class="text-center">Supplier Name</th>
                                                 <th class="text-center">Supplier_Address</th>
                                                 <th class="text-center">Supplier_Email</th>
                                                 <th class="text-center">Supplier Code</th>
                                                 <th class="text-center">Supplier_Telephone</th>
                                                 <th class="text-center">Created Date</th>
                                                 <th class="text-center" colspan="3">Actions</th>
                                             </tr>
                                         </thead>
                                         <tbody>
                                             <?php
                                             $count = 1;
                                             ?>
                                             @forelse ($getRecord as $data)
                                                 <tr>
                                                     <td class ="text-center">{{ $count++ }}</td>
                                                     <td class ="text-center">{{ $data['supplier_name'] }}</td>
                                                     <td class ="text-center">{{ $data['supplier_address'] }}</td>
                                                     <td class ="text-center">{{ $data['supplier_email'] }}</td>
                                                     <td class ="text-center"><span
                                                             class="badge badge-secondary">{{ $data['supplier_code'] }}</span>
                                                     </td>
                                                     <td class ="text-center"><span
                                                             class="badge badge-secondary">{{ $data['supplier_telephone'] }}</span>
                                                     </td>
                                                     <td class ="text-center">
                                                         <div class="sparkbar" data-color="#f56954" data-height="20">
                                                             {{ date('d:m:Y H:i A', strtotime($data['created_at'])) }}
                                                         </div>
                                                     </td>
                                                     <td class ="text-center">
                                                         <a href="{{ url('admin/supplier/edit/' . $data['id']) }}"
                                                             class="btn btn-warning btn-sm"><i
                                                                 class = "fas fa-pen text-white"></i> </a>
                                                     </td>

                                                     <td class="text-center">
                                                         <a href = "{{ url('admin/supplier/delete/' . $data['id']) }}"
                                                             onclick="return confirm('Are You Sure , You Want To Delete This Record ????')"
                                                             class="btn btn-danger btn-sm"> <i
                                                                 class = "fas fa-trash text-white"></i> </a>
                                                     </td>
                                                 </tr>

                                             @empty

                                                 <tr>
                                                     <td colspan = "100%" class="text-center">
                                                         <span class="badge badge-danger">No Record Found Inside Your
                                                             Database !!!!!!</span>
                                                     </td>
                                                 </tr>
                                             @endforelse

                                         </tbody>
                                     </table>
                                 </div>

                             </div>

                             <div class="card-footer clearfix mt-3" style="padding: 10px; float:right">
                                 {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                             </div>

                             {{-- <div class="" style="padding: 10px; float:right;">
                                {!! $getData->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                             </div> --}}

                         </div>
                     </div>





                 </div>

             </div>


         </section>


     </div>


     //Add supplier modal form
     <div class="modal fade" id="modal-secondary">
         <div class="modal-dialog">
             <div class="modal-content bg-secondary">
                 <div class="modal-header">
                     <h4 class="modal-title">Add New Supplier</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">

                     <p>Supplier &hellip;</p>



                     <form class="form-horizontal" method = "POST" action = "{{ route('admin.supplierStore') }}">
                         {{ csrf_field() }}
                         <div class="card-body">
                             <div class="form-group row">
                                 <label for="supplier_name" class="col-sm-2 col-form-label">Name:</label>
                                 <div class="col-sm-10">
                                     <input type="text" class="form-control" id="supplier_name"
                                         placeholder="Enter supplier name....." name = "supplier_name" required>
                                         @error('supplier_name')
                                             <p class = "text-danger text-center"><b> * {{ $message }}</b></p>
                                         @enderror
                                 </div>
                             </div>
                             <div class="form-group row">
                                 <label for="supplier_email" class="col-sm-2 col-form-label">Email:</label>
                                 <div class="col-sm-10">
                                     <input type="email" class="form-control" id="supplier_email"
                                         placeholder="Exampler@gmail.com" name = "supplier_email" required>
                                         @error('supplier_email')
                                             <p class = "text-danger text-center"><b> * {{ $message }}</b></p>
                                         @enderror
                                 </div>
                             </div>
                             <div class="form-group row">
                                 <label for="supplier_telephone" class="col-sm-2 col-form-label">Telephone:</label>
                                 <div class="col-sm-10">
                                     <input type="number" class="form-control" id="supplier_telephone"
                                         placeholder="+1234567890" name = "supplier_telephone" required>
                                 </div>
                             </div>
                             <div class="form-group row">
                                 <label for="supplier_address" class="col-sm-2 col-form-label">Address:</label>
                                 <div class="col-sm-10">
                                     <textarea name="supplier_address" class="form-control" id="" placeholder="Enter supplier address...."
                                         required></textarea>
                                 </div>
                             </div>

                         </div>

                         <div class="card-footer">
                             <button type="submit" class="btn btn-info">Add Supplier</button>
                             {{-- <a href="{{ url('admin/member/index') }}" class="btn btn-default float-right">Cancel</a> --}}
                         </div>

                     </form>




                 </div>
                 <div class="modal-footer justify-content-between">
                     <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                     {{-- <button type="button" class="btn btn-outline-light">Save changes</button> --}}
                 </div>
             </div>

         </div>

     </div>



    
        
     @endsection
