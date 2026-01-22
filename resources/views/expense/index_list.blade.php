 @extends('layouts.app')


 @section('contenet')
     <div class="content-wrapper">

         <div class="content-header">
             <div class="container-fluid">
                 <div class="row mb-2">
                     <div class="col-sm-6">
                         <h1 class="m-0">Expnses Details</h1>
                     </div>
                     <div class="col-sm-6">
                         <ol class="breadcrumb float-sm-right">
                             <li class="breadcrumb-item"><a href="#">Expnses</a></li>
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
                                 <h3 class="card-title">Search Expense Filter</h3>
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
                                                 <label for="id">#ID</label>
                                                 <input type="number" class="form-control" placeholder="ID" name="id"
                                                     value="{{ Request()->id }}">
                                             </div>

                                             <div class="form-group col-md-3 col-sm-6 col-lg-3">
                                                 <label for="expense_title">Expense_title</label>
                                                 <input type="text" class="form-control" placeholder="Expense title/name"
                                                     name="expense_title" value="{{ Request()->expense_title }}">
                                             </div>

                                             
                                             <div class="form-group col-md-3 col-sm-6 col-lg-3">
                                                 <label for="created_at">Created_date</label>
                                                 <input type="date" class="form-control" placeholder="1234"
                                                     name="created_at" value="{{ Request()->created_at }}">
                                             </div>

                                              <div class="form-group col-md-3 col-sm-6 col-lg-3">
                                                 <label for="updated_at">Updated_date</label>
                                                 <input type="date" class="form-control" placeholder="1234"
                                                     name="updated_at" value="{{ Request()->updated_at }}">
                                             </div>

                                         </div>

                                         <button type="submit" class="btn btn-sm btn-info float-left">Filter
                                             Member</button>
                                         <a href="{{ url('admin/expense/index') }}" class="btn btn-sm btn-secondary float-right">Reset</a>
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
                                 
                                 <h3 class="card-title">Expense data list</h3>
                                 <div class="card-tools">
                                     {{--  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                         <i class="fas fa-minus"></i>
                                     </button> --}}
                                     <button type="button" class="btn btn-tool" data-card-widget="remove">
                                         <i class="fas fa-times"></i></button>
                                     <a href= "{{ route('admin.addExpense') }}"
                                         class="btn btn-sm btn-primary">Add_Expense</a>
                                 </div>
                             </div>

                             <div class="card-body p-0">
                                 <div class="table-responsive">
                                     <table class="table m-0" id="product-table">
                                         <thead>
                                             <tr>
                                                 <th class="text-center">#</th>
                                                 <th class="text-center">Expense_title</th>
                                                 <th class="text-center">Expense_amount</th>
                                                 <th class="text-center">Created_date</th>
                                                 <th class="text-center">Updated_date</th>
                                                 <th class="text-center" colspan="3">Actions</th>
                                             </tr>
                                         </thead>
                                         <tbody>
                                             <?php
                                             $count = 1;
                                             ?>
                                             @php
                                                 $totalAmount = 0
                                             @endphp
                                             @forelse ($getRecord as $data)
                                             @php
                                                 $totalAmount = $totalAmount + $data['expense_price']
                                             @endphp
                                                 <tr>
                                                     <td class ="text-center">{{ $count++ }}</td>
                                                     <td class ="text-center">{{ $data['expense_title'] }}</td>
                                                     <td class ="text-center">{{ number_format($data['expense_price'], 2) }}</td>
                                                     <td class ="text-center">
                                                         <div class="sparkbar" data-color="#f56954" data-height="20">
                                                            <span
                                                             class="badge badge-secondary">
                                                             {{ date('d:m:Y H:i A', strtotime($data['created_at'])) }}
                                                             </span>
                                                         </div>
                                                     </td class ="text-center">
                                                     <td class ="text-center">
                                                         <div class="sparkbar" data-color="#f56954" data-height="20">
                                                            <span
                                                             class="badge badge-secondary">
                                                             {{ date('d:m:Y H:i A', strtotime($data['updated_at'])) }}
                                                             </span>
                                                         </div>
                                                     </td>
                                                     <td class ="text-center">
                                                         <a href ="{{ url('admin/expense/edit/' . $data['id']) }}"
                                                             class="btn btn-warning btn-sm"><i
                                                                 class = "fas fa-pen text-white"></i> </a>
                                                     </td>

                                                     <td class ="text-center">
                                                         <a href = "{{ url('admin/expense/delete/' . $data['id']) }}"
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

                                            
                                                
                                                    @if (!empty($totalAmount))
                                                        <tr class ="text-center"> 
                                                        <th colspan = "2" class ="text-center"><h4>Total Amount :</h4></th> 
                                                        <td class ="text-center"><h4>{{ number_format($totalAmount, 2) }}</h4></td>  
                                                        <th colspan="4" class ="text-center"></th> 
                                                    </tr>
                                                    @endif
                                                
                                             

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
 @endsection
