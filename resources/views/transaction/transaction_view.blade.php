 @extends('layouts.app')


 @section('contenet')
     <div class="content-wrapper">

         <div class="content-header">
             <div class="container-fluid">
                 <div class="row mb-2">
                     <div class="col-sm-6">
                         <h1 class="m-0">Transaction View</h1>
                     </div>
                     <div class="col-sm-6">
                         <ol class="breadcrumb float-sm-right">
                             <li class="breadcrumb-item"><a href="#">Transactions</a></li>
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
                                 <h3 class="card-title">Filter transaction<i class="fas fa-filter"></i></h3>
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
                                                 <label for="id">Transaction_ID</label>
                                                 <input type="number" class="form-control" placeholder="Search ID"
                                                     name="id" value="{{ Request()->id }}">
                                             </div>

                                             <div class="form-group col-md-4 col-sm-6 col-lg-4">
                                                 <label for="amount">Amount</label>
                                                 <input type="number" class="form-control" placeholder="Search by amount"
                                                     name="amount" value="{{ Request()->amount }}">
                                             </div>

                                             <div class="form-group col-md-4 col-sm-6 col-lg-4">
                                                 <label for="supplier_name">Created_Date</label>
                                                 <input type="date" class="form-control" placeholder="Search by date"
                                                     name="created_at" value="{{ Request()->created_at }}">
                                             </div>

                                         </div>

                                         <button type="submit" class="btn btn-sm btn-info float-left">Filter
                                             Transaction</button>
                                         <a href="{{ url('user/list/transaction') }}"
                                             class="btn btn-sm btn-secondary float-right">Reset</a>
                                     </div>
                                 </form>

                             </div>


                         </div>


                         {{-- filter search end --}}
                         @include('_message')
                         <div class="card">
                             <div class="card-header border-transparent">

                                 <h3 class="card-title">transaction list</h3>
                                 <div class="card-tools">
                                     <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                         <i class="fas fa-minus"></i>
                                     </button>
                                     <button type="button" class="btn btn-tool" data-card-widget="remove">
                                         <i class="fas fa-times"></i></button>
                                     <button class="btn btn-sm btn-primary" data-toggle="modal"
                                         data-target="#modal-secondary">Submit Transaction <i
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
                                                 <th class="text-center">Amount</th>
                                                 <th class = "text-center">Status</th>
                                                 <th class="text-center">Created Date</th>
                                             </tr>
                                         </thead>
                                         <tbody>
                                             <?php
                                             $count = 1;
                                             ?>
                                             @forelse ($getRecord as $data)
                                                 <tr>
                                                     <td class ="text-center">{{ $count++ }}</td>
                                                     <td class ="text-center">{{ number_format($data['amount'], 2) }}</td>
                                                     <td class="text-center">
                                                    <span class="badge {{ $data['payment_status'] == 1 ? 'badge-success' : 'badge-warning' }}">
                                                        {{ $data['payment_status'] == 1 ? 'Completed' : 'Pending' }}
                                                    </span>
                                                </td>
                                                     <td class ="text-center">
                                                         <div class="sparkbar" data-color="#f56954" data-height="20">
                                                             {{ date('d:m:Y H:i A', strtotime($data['created_at'])) }}
                                                         </div>
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


                         </div>
                     </div>





                 </div>

             </div>


         </section>


     </div>


     //submit transaction modal form
     <div class="modal fade" id="modal-secondary">
         <div class="modal-dialog">
             <div class="modal-content bg-secondary">
                 <div class="modal-header">
                     <h4 class="modal-title">Submit Transaction</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">

                     <p>Supplier &hellip;</p>



                     <form action="{{ route('userSubmit.transaction') }}" method="post">
                         {{ csrf_field() }}
                         <div class="input-group mb-3">
                             <input type="number" name="amount" class="form-control" value="">
                             <div class="input-group-append">
                                 <div class="input-group-text">
                                     <span class="fas fa-dollar-sign"></span>
                                 </div>
                             </div>
                         </div>
                         <div class="row">
                            <div class="col-8"></div>

                             <div class="col-4">
                                 <button type="submit" class="btn btn-primary btn-block">Save</button>
                             </div>

                         </div>
                     </form>




                 </div>
                 <div class="modal-footer justify-content-between">
                     <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                 </div>
             </div>

         </div>

     </div>
 @endsection
