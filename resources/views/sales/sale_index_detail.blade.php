 @extends('layouts.app')


 @section('contenet')
     <div class="content-wrapper">

         <div class="content-header">
             <div class="container-fluid">
                 <div class="row mb-2">
                     <div class="col-sm-6">
                         <h1 class="m-0">Sales Details</h1>
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
                                 <h3 class="card-title">Search Sales Details Filter</h3>
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

                                 <form action="" class="" method="get">
                                     <div class="card-body">

                                         <div class="row">

                                             <div class="form-group col-md-3 col-sm-6 col-lg-3">
                                                 <label for="id">Price</label>
                                                 <input type="number" class="form-control" placeholder="Search by price"
                                                     name="selling_price" value="{{ Request()->selling_price }}">
                                             </div>

                                             <div class="form-group col-md-3 col-sm-6 col-lg-3">
                                                 <label for="product_id">Product</label>
                                                 <input type="text" class="form-control" placeholder="Product title/name"
                                                     name="product_id" value="{{ Request()->product_id }}">
                                             </div>

                                              <div class="form-group col-md-3 col-sm-6 col-lg-3">
                                                 <label for="amount">Amount</label>
                                                 <input type="number" class="form-control" placeholder="Product amount"
                                                     name="amount" value="{{ Request()->amount }}">
                                             </div>

                                              <div class="form-group col-md-3 col-sm-6 col-lg-3">
                                                 <label for="discount">Discount</label>
                                                 <input type="number" class="form-control" placeholder="Search by discount"
                                                     name="discount" value="{{ Request()->discount }}">
                                             </div>

                                              <div class="form-group col-md-3 col-sm-6 col-lg-3">
                                                 <label for="sub_total">Sub_Total</label>
                                                 <input type="text" class="form-control" placeholder="Search by subtotal"
                                                     name="sub_total" value="{{ Request()->sub_total }}">
                                             </div>

                                             <div class="form-group col-md-3 col-sm-6 col-lg-3">
                                                 <label for="created_at">Created_date</label>
                                                 <input type="date" class="form-control" name="created_at"
                                                     value="{{ Request()->created_at }}">
                                             </div>

                                             <div class="form-group col-md-3 col-sm-6 col-lg-3">
                                                 <label for="updated_at">Updated_date</label>
                                                 <input type="date" class="form-control" name="updated_at"
                                                     value="{{ Request()->updated_at }}">
                                             </div>

                                         </div>


                                         <button type="submit" class="btn btn-sm btn-info float-left">Filter</button>
                                         <a href="{{ url('admin/sale/detail/' .$sales_id) }}"
                                             class="btn btn-sm btn-secondary float-right">Reset</a>
                                     </div>
                                 </form>

                             </div>

                         </div>


                         @include('_message')
                         <div class="card">
                             <div class="card-header border-transparent">

                                 <h3 class="card-title">Purchase details data list</h3>
                                 <div class="card-tools">
                                     <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                         <i class="fas fa-minus"></i>
                                     </button>


                                     <button type="button" class="btn btn-tool" data-card-widget="remove">
                                         <i class="fas fa-times"></i></button>

                                     <a href= "{{ url('admin/sales/detail/add/' . $sales_id) }}"
                                         class="btn btn-sm btn-primary">Add Sales Details</a>

                                 </div>
                             </div>

                             <div class="card-body p-0">
                                 <div class="table-responsive">
                                     <table class="table m-0" id="product-table">
                                         <thead>
                                             <tr>
                                                 <th class="text-center">#</th>
                                                 <th class="text-center">Sale ID</th>
                                                 <th class="text-center">Product_name</th>
                                                 <th class="text-center">Selling_price</th>
                                                 <th class="text-center">Amount</th>
                                                 <th class="text-center">Discount</th>
                                                 <th class="text-center">Sub_total</th>
                                                 <th class="text-center">Created_at</th>
                                                 <th class="text-center">Updated_at</th>
                                                 <th class="text-center" colspan="3">Actions</th>
                                             </tr>
                                         </thead>
                                         <tbody>

                                             @php
                                                 $count = 1;
                                                 $totalAmount = 0;
                                                 $totalDiscount = 0;
                                                 $totalSelling_Price = 0;
                                                 $totalSob_Total = 0;
                                             @endphp
                                             @forelse ($getSale as $data)
                                                 @php
                                                 $totalAmount = $totalAmount + $data['amount'];
                                                 $totalSob_Total = $totalSob_Total + $data['sub_total'];
                                                 $totalDiscount = $totalDiscount + $data['discount'];
                                                 $totalSelling_Price = $totalSelling_Price + $data['selling_price'];
                                             @endphp
                                                 <tr>
                                                     <td class ="text-center">{{ $count++ }}</td>
                                                     <td class ="text-center">{{ $data['sales_id'] }}</td>
                                                     <td class ="text-center">{{ $data['product_name'] }}</td>
                                                     <td class ="text-center">
                                                         {{ number_format($data['selling_price'], 2) }}</td>
                                                     <td class ="text-center">{{ number_format($data['amount'], 2) }}</td>
                                                     <td class ="text-center">{{ number_format($data['discount'], 2) }} %</td>
                                                     <td class ="text-center">{{ number_format($data['sub_total'], 2) }}
                                                     </td>
                                                     {{-- <td>
                                                         <span
                                                             class="badge {{ $data['status'] == 1 ? 'badge-success' : 'badge-warning' }}">
                                                             {{ $data['status'] == 1 ? 'Complete' : 'Incomplete' }}
                                                         </span>
                                                     </td> --}}
                                                     <td class ="text-center">
                                                         <div class="sparkbar" data-color="#f56954" data-height="20">
                                                             <span class="badge badge-secondary">
                                                                 {{ date('d:m:Y H:i A', strtotime($data['created_at'])) }}
                                                             </span>
                                                         </div>
                                                     </td class ="text-center">
                                                     <td class ="text-center">
                                                         <div class="sparkbar" data-color="#f56954" data-height="20">
                                                             <span class="badge badge-secondary">
                                                                 {{ date('d:m:Y H:i A', strtotime($data['updated_at'])) }}
                                                             </span>
                                                         </div>
                                                     </td>
                                                     <td class ="text-center">
                                                         <a href ="{{ url('admin/sales/detail/edit/' .$data['id']) }}"
                                                             class="btn btn-warning btn-sm"><i
                                                                 class = "fas fa-pen text-white"></i> </a>
                                                     </td>

                                                     <td class ="text-center">
                                                         <a href = "{{ url('admin/sales/detail/delete/' .$data['id']) }}"
                                                             onclick="return confirm('Are You Sure , You Want To Delete This Record ????')"
                                                             class="btn btn-danger btn-sm"> <i
                                                                 class = "fas fa-trash text-white"></i> </a>
                                                     </td>
                                                 </tr>

                                             @empty

                                                 <tr>
                                                     <td class ="text-center" colspan = "100%">
                                                         <span class="badge badge-danger">No Record Found Inside Your
                                                             Database !!!!!!</span>
                                                     </td>
                                                 </tr>
                                             @endforelse



                                              @if (!empty($totalAmount || $totalDiscount || $totalSelling_Price || $totalSob_Total))
                                                        <tr class ="text-center"> 
                                                        <th colspan = "3" class ="text-center"><h4>Total Amount :</h4></th> 
                                                        <td class ="text-center"><h4>{{ number_format($totalSelling_Price, 2) }}</h4></td>  
                                                        <td class ="text-center"><h4>{{ number_format($totalAmount, 2) }}</h4></td>
                                                        <td class ="text-center"><h4>{{ number_format($totalDiscount, 2) }}</h4></td>
                                                        <td class ="text-center"><h4>{{ number_format($totalSob_Total, 2) }}</h4></td> 
                                                    </tr>
                                                    @endif



                                         </tbody>
                                     </table>
                                 </div>

                             </div>

                             <div class="card-footer clearfix mt-3" style="padding: 10px; float:right">
                                 {!! $getSale->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                                 <a href="{{ url('admin/sales/index') }}"
                                     class="btn btn-default float-right">Cancel</a>
                             </div>

                         </div>
                     </div>





                 </div>

             </div>


         </section>


     </div>
 @endsection
