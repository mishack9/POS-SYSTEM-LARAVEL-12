 @extends('layouts.app')


 @section('contenet')
     <div class="content-wrapper">

         <div class="content-header">
             <div class="container-fluid">
                 <div class="row mb-2">
                     <div class="col-sm-6">
                         <h1 class="m-0">Sales Detail Area</h1>
                     </div>
                     <div class="col-sm-6">
                         <ol class="breadcrumb float-sm-right">
                             <li class="breadcrumb-item"><a href="#">Sales</a></li>
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
                                 <h3 class="card-title">Filter Sales Records<i class="fas fa-filter"></i></h3>
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

                                             <div class="form-group col-md-3 col-sm-3 col-lg-3">
                                                 <label for="sale_title">Sales_Title</label>
                                                 <input type="text" class="form-control"
                                                     placeholder="Search by name sales title" name="sale_title"
                                                     value="{{ Request()->sale_title }}">
                                             </div>

                                             <div class="form-group col-md-3 col-sm-3 col-lg-3">
                                                 <label for="member_id">Member_Name</label>
                                                 <input type="text" class="form-control"
                                                     placeholder="Search by name of member" name="member_id"
                                                     value="{{ Request()->member_id }}">
                                             </div>

                                             <div class="form-group col-md-3 col-sm-3 col-lg-3">
                                                 <label for="user_id">Username</label>
                                                 <input type="text" class="form-control" name="user_id"
                                                     placeholder="Search by username" value="{{ Request()->user_id }}">
                                             </div>

                                             <div class="form-group col-md-3 col-sm-3 col-lg-3">
                                                 <label for="accepted">Accepted</label>

                                                 <select name="accepted" id="accepted" class="form-control">
                                                     <option value="">--Select Accepted--</option>
                                                     <option value="yes"
                                                         {{ Request()->accepted == 'yes' ? 'selected' : '' }}>Yes</option>
                                                     <option value="no"
                                                         {{ Request()->accepted == 'no' ? 'selected' : '' }}> No </option>
                                                 </select>

                                             </div>

                                         </div>

                                         <button type="submit" class="btn btn-sm btn-info float-left">Filter
                                             Purchase</button>
                                         <a href="{{ url('admin/sales/index') }}"
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
                                         data-target="#modal-secondary">Take_Sales_Record <i
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
                                                 <th class="text-center">Member_names</th>
                                                 <th class="text-center">Sales_title</th>
                                                 <th class="text-center">Items</th>
                                                 <th class="text-center">Prices</th>
                                                 <th class="text-center">Discount</th>
                                                 <th class="text-center">Percentage</th>
                                                 <th class="text-center">Net_Total</th>
                                                 <th class="text-center">Accepted</th>
                                                 <th class="text-center">Username</th>
                                                 <th class="text-center">Status</th>
                                                 <th class="text-center">Created Date</th>
                                                 <th class="text-center" colspan="3">Actions</th>
                                             </tr>
                                         </thead>

                                         <tbody>

                                             @php
                                                 $count = 1;
                                                 $Total_Itams = 0;
                                                 $All_Total = 0;
                                                 $Total_Discount = 0;
                                                 $NetTotal_Percent = 0;
                                                 $Net_Total = 0;
                                                 $TotalNet = 0;
                                             @endphp

                                             @forelse ($getData as $data)

                                             @php
                                                 $Total_Itams = $Total_Itams + $data['total_items'];
                                                 $All_Total = $All_Total + $data['total_price'];
                                                 $Total_Discount = $Total_Discount + $data['discount'];
                                                 $NetDiscount = $data['total_price'] * $data['discount'] / 100;
                                                 $NetTotal_Percent = $NetTotal_Percent + $NetDiscount;
                                                 $Net_Total = $data['total_price'] - $NetDiscount;
                                                 $TotalNet = $TotalNet + $Net_Total;
                                             @endphp
                                              
                                                 <tr>
                                                     <td class ="text-center">{{ $count++ }}</td>
                                                     <td class ="text-center">{{ $data['member_name'] }}</td>
                                                     <td class ="text-center">{{ $data['sale_title'] }}</td>
                                                     <td class ="text-center">{{ number_format($data['total_items'], 2) }}</td>
                                                     <td class ="text-center">{{ number_format($data['total_price'], 2) }}
                                                     </td>
                                                     <td class ="text-center">{{ $data['discount'] }} %</td>
                                                     <td class ="text-center">{{ number_format($NetDiscount, 2) }} </td>
                                                     <td class="text-center">{{ number_format($Net_Total, 2) }}</td>
                                                     <td class ="text-center"><span
                                                             class="badge {{ $data['accepted'] == 'yes' ? 'badge-success' : 'badge-warning' }}">
                                                             {{ $data['accepted'] }}</span></td>
                                                     <td class ="text-center">{{ $data['name'] }}</td>
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
                                                         <a href="{{ url('admin/sale/edit/' . $data['slug']) }}"
                                                             class="btn btn-warning btn-sm"><i
                                                                 class = "fas fa-pen text-white"></i> </a>
                                                     </td>

                                                     <td class="text-center">
                                                         <a href = "{{ url('admin/sale/delete/' . $data['id']) }}"
                                                             onclick="return confirm('Are You Sure , You Want To Delete This Record ????')"
                                                             class="btn btn-danger btn-sm"> <i
                                                                 class = "fas fa-trash text-white"></i> </a>
                                                     </td>
                                                      <td class="text-center">
                                                         <a
                                                             href = "{{ url('admin/sale/detail/' . $data['id']) }}"class="btn btn-info btn-sm">
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

                                              <tr>
                                                <th class = "text-center" colspan="3">All Total</th>
                                                <td class="text-center">{{ number_format($Total_Itams, 2) }}</td>
                                                <td class="text-center">{{ number_format($All_Total, 2) }}</td>
                                                <td class="text-center">{{ number_format($Total_Discount, 2) }} %</td> 
                                                <td class="text-center">{{ number_format($NetTotal_Percent, 2) }} %</td>  
                                                <td class="text-center">{{ number_format($TotalNet, 2) }} </td>                                        
                                             </tr>

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


     //Add sales modal form
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

                     <p>Sales &hellip;</p>



                     <form class="form-horizontal" method = "POST" action = "{{ route('admin.saleStore') }}">
                         {{ csrf_field() }}

                         <div class="card-body">

                             <div class="form-group row">
                                 <label for="member_id" class="col-sm-2 col-form-label">Member:</label>
                                 <div class="col-sm-10">
                                     <select name="member_id" id="member_id" class="form-control">
                                         <option value="">--Select Member--</option>
                                         @foreach ($getMember as $data)
                                             <option value="{{ $data['id'] }}">{{ $data['member_name'] }}</option>
                                         @endforeach
                                     </select>
                                 </div>
                             </div>

                             <div class="form-group row">
                                 <label for="sale_title" class="col-sm-2 col-form-label">Title:</label>
                                 <div class="col-sm-10">
                                     <input type="text" class="form-control" id="sale_title"
                                         placeholder="Enter sale title....." name = "sale_title" required>
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
                                 <label for="accepted" class="col-sm-2 col-form-label">Accepted:</label>
                                 <div class="col-sm-10">
                                     <select name="accepted" id="accepted" class="form-control">
                                         <option value="yes">--Select--</option>
                                         <option value="yes">--Yes--</option>
                                         <option value="yes">--No--</option>
                                     </select>
                                 </div>
                             </div>

                             <div class="form-group row">
                                 <label for="user_id" class="col-sm-2 col-form-label">User:</label>
                                 <div class="col-sm-10">
                                     <select name="user_id" id="user_id" class="form-control">
                                         <option value="">--Select User--</option>
                                         @foreach ($getUser as $data)
                                             <option value="{{ $data['id'] }}">{{ $data['name'] }}</option>
                                         @endforeach
                                     </select>
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
