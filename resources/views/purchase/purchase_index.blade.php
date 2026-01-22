 @extends('layouts.app')


 @section('contenet')
     <div class="content-wrapper">

         <div class="content-header">
             <div class="container-fluid">
                 <div class="row mb-2">
                     <div class="col-sm-6">
                         <h1 class="m-0">Purchase Area</h1>
                     </div>
                     <div class="col-sm-6">
                         <ol class="breadcrumb float-sm-right">
                             <li class="breadcrumb-item"><a href="#">Purchases</a></li>
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
                                 <h3 class="card-title">Filter Purchase<i class="fas fa-filter"></i></h3>
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

                                             <div class="form-group col-md-4 col-sm-4 col-lg-4">
                                                 <label for="purchase_title">Purchase_Title</label>
                                                 <input type="text" class="form-control"
                                                     placeholder="Search by name purchase title" name="purchase_title"
                                                     value="{{ Request()->purchase_title }}">
                                             </div>

                                             <div class="form-group col-md-4 col-sm-4 col-lg-4">
                                                 <label for="supplier_id">Supplier_Name</label>
                                                 <input type="text" class="form-control"
                                                     placeholder="Search by name of supplier" name="supplier_id"
                                                     value="{{ Request()->supplier_id }}">
                                             </div>

                                             <div class="form-group col-md-4 col-sm-4 col-lg-4">
                                                 <label for="total_price">Price</label>
                                                 <input type="number" class="form-control" name="total_price"
                                                     value="{{ Request()->total_price }}">
                                             </div>

                                         </div>

                                         <button type="submit" class="btn btn-sm btn-info float-left">Filter
                                             Purchase</button>
                                         <a href="{{ url('admin/purchase/index') }}"
                                             class="btn btn-sm btn-secondary float-right">Reset</a>
                                     </div>
                                 </form>

                             </div>

                         </div>


                         {{-- filter search end --}}
                         @include('_message')
                         <div class="card">
                             <div class="card-header border-transparent">

                                 <h3 class="card-title">Purchase data</h3>
                                 <div class="card-tools">
                                     <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                         <i class="fas fa-minus"></i>
                                     </button>
                                     <button type="button" class="btn btn-tool" data-card-widget="remove">
                                         <i class="fas fa-times"></i></button>
                                     <a href="{{ url('admin/purchase/truncate_all') }}" class = "btn btn-sm btn-danger"
                                         onclick = "return confirm('Are you sure you wan to truncate this table ? ')">Truncate</a>

                                     &nbsp; &nbsp;

                                     <button class="btn btn-sm btn-primary" data-toggle="modal"
                                         data-target="#modal-secondary">Take_Purchase_Record <i
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
                                                 <th class="text-center">Purchase_title</th>
                                                 <th class="text-center">Supplier_name</th>
                                                 <th class="text-center">Items</th>
                                                 <th class="text-center">Price</th>
                                                 <th class="text-center">Discount</th>
                                                 <th class="text-center">Net_discount</th>
                                                 <th class="text-center">Total_price</th>
                                                 <th class="text-center">Status</th>
                                                 <th class="text-center">Created Date</th>
                                                 <th class="text-center" colspan="3">Actions</th>
                                             </tr>
                                         </thead>

                                         <tbody>
                                             @php
                                                 $count = 1;
                                                 $NetDiscount = 0;
                                                 $TotalPrice = 0;
                                                 $totalItems = 0;
                                                 $totalPriceSum = 0;
                                                 $totalDiscount = 0;
                                                 $Net_discountTotal = 0;
                                                 $total_price = 0;
                                             @endphp

                                             @forelse ($getData as $data)
                                                 @php

                                                     //netdiscount = price * discout / 100
                                                     $NetDiscount = ($data['total_price'] * $data['discount']) / 100;
                                                     //total price = price / netdiscount
                                                     $TotalPrice = $data['total_price'] - $NetDiscount;
                                                     //total items
                                                     $totalItems = $totalItems + $data['total_items'];
                                                     //total price
                                                     $totalPriceSum = $totalPriceSum + $data['total_price'];
                                                     //total discount
                                                     $totalDiscount = $totalDiscount + $data['discount'];
                                                     //total net discount
                                                     $Net_discountTotal = $Net_discountTotal + $NetDiscount;
                                                     //total all price
                                                     $total_price = $total_price + $TotalPrice;

                                                 @endphp

                                                 <tr>
                                                     <td class ="text-center">{{ $count++ }}</td>
                                                     <td class ="text-center">{{ $data['purchase_title'] }}</td>
                                                     <td class ="text-center">{{ $data['supplier_name'] }}</td>
                                                     <td class ="text-center">{{ $data['total_items'] }}</td>
                                                     <td class ="text-center">{{ number_format($data['total_price'], 2) }}
                                                     </td>
                                                     <td class ="text-center">{{ $data['discount'] }} %</td>
                                                     <td class ="text-center">{{ number_format($NetDiscount, 2) }}</td>
                                                     <td class ="text-center">{{ number_format($TotalPrice, 2) }}</td>
                                                     <td>
                                                         <span
                                                             class="badge {{ $data['status'] == 1 ? 'badge-success' : 'badge-warning' }}">
                                                             {{ $data['status'] == 1 ? 'Complete' : 'Incomplete' }}
                                                         </span>
                                                     </td>
                                                     <td class ="text-center">
                                                         <div class="sparkbar" data-color="#f56954" data-height="20">
                                                             {{ date('D:m:Y H:I A', strtotime($data['created_at'])) }}
                                                         </div>
                                                     </td>
                                                     <td class ="text-center">
                                                         <a href="{{ url('admin/purchase/edit/' . $data['id']) }}"
                                                             class="btn btn-warning btn-sm"><i
                                                                 class = "fas fa-pen text-white"></i> </a>
                                                     </td>

                                                     <td class="text-center">
                                                         <a href = "{{ url('admin/puchase/delete/' . $data['id']) }}"
                                                             onclick="return confirm('Are You Sure , You Want To Delete This Record ????')"
                                                             class="btn btn-danger btn-sm"> <i
                                                                 class = "fas fa-trash text-white"></i> </a>
                                                     </td>

                                                     <td class="text-center">
                                                         <a
                                                             href = "{{ url('admin/puchase/detail/' . $data['id']) }}"class="btn btn-info btn-sm">
                                                             <i class = "fas fa-eye text-white"></i> </a>
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

                                            @if (!empty($totalItems || $totalPriceSum || $totalDiscount || $Net_discountTotal || $total_price))
                                                 <tr>
                                                 <th class = "text-center" colspan="3">All Total</th>
                                                 <td class="text-center">{{ number_format($totalItems, 2) }}</td>
                                                 <td class="text-center">{{ number_format($totalPriceSum, 2) }}</td>
                                                 <td class="text-center"> {{ number_format($totalDiscount, 2) }} %</td>
                                                 <td class="text-center">{{ number_format($Net_discountTotal, 2) }}</td>
                                                 <td class="text-center">{{ number_format($total_price, 2) }}</td>
                                                 <th class="text-center" colspan="5"></th>
                                             </tr>
                                            @endif

                                         </tbody>

                                     </table>
                                 </div>

                             </div>

                             <div class="card-footer clearfix mt-3" style="padding: 10px; float:right">
                                 {!! $getData->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                             </div>

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
                     <h4 class="modal-title">Add_Record</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">

                     <p>Purchase &hellip;</p>



                     <form class="form-horizontal" method = "POST" action = "{{ route('admin.purchaseStore') }}">
                         {{ csrf_field() }}

                         <div class="card-body">
                             <div class="form-group row">
                                 <label for="purchase_title" class="col-sm-2 col-form-label">Title:</label>
                                 <div class="col-sm-10">
                                     <input type="text" class="form-control" id="purchase_title"
                                         placeholder="Enter purchase title....." name = "purchase_title" required>
                                 </div>
                             </div>
                             <div class="form-group row">
                                 <label for="supplier_id" class="col-sm-2 col-form-label">Supplier:</label>
                                 <div class="col-sm-10">
                                     <select name="supplier_id" id="supplier_id" class="form-control">
                                         <option value="">--Select Supllier--</option>
                                         @foreach ($getRecord as $data)
                                             <option value="{{ $data['id'] }}">{{ $data['supplier_name'] }}</option>
                                         @endforeach
                                     </select>
                                 </div>
                             </div>
                             <div class="form-group row">
                                 <label for="total_items" class="col-sm-2 col-form-label">Items:</label>
                                 <div class="col-sm-10">
                                     <input type="number" class="form-control" id="total_items" placeholder="0"
                                         name = "total_items" required>
                                 </div>
                             </div>
                             <div class="form-group row">
                                 <label for="total_price" class="col-sm-2 col-form-label">Price:</label>
                                 <div class="col-sm-10">
                                     <input type="number" class="form-control" id="total_price" placeholder="0"
                                         name = "total_price" required>
                                 </div>
                             </div>
                             <div class="form-group row">
                                 <label for="discount" class="col-sm-2 col-form-label">Discount:</label>
                                 <div class="col-sm-10">
                                     <input type="number" class="form-control" id="discount" placeholder="0"
                                         name = "discount" required>
                                 </div>
                             </div>
                             <div class="form-group row">
                                 <div class="form-check">
                                     <input type="checkbox" name = "status" class="form-check-input" id="status">
                                     <label class="form-check-label" for="status">Status</label>
                                 </div>
                             </div>

                         </div>

                         <div class="card-footer">
                             <button type="submit" class="btn btn-info">Save Purchase</button>
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
