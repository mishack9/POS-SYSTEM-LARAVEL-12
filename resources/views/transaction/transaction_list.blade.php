 @extends('layouts.app')


 @section('contenet')
     <div class="content-wrapper">

         <div class="content-header">
             <div class="container-fluid">
                 <div class="row mb-2">
                     <div class="col-sm-6">
                         <h1 class="m-0">Transaction</h1>
                     </div>
                     <div class="col-sm-6">
                         <ol class="breadcrumb float-sm-right">
                             <li class="breadcrumb-item"><a href="#">Transaction/User</a></li>
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

                     </div>
                 </div>


                 {{-- filter search end --}}

                 @include('_message')
                 <div class="card">
                     <div class="card-header border-transparent">

                         <h3 class="card-title">Transaction</h3>
                         <div class="card-tools">
                             <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                 <i class="fas fa-minus"></i>
                             </button>
                             <button type="button" class="btn btn-tool" data-card-widget="remove">
                                 <i class="fas fa-times"></i></button>
                             <a href= "{{-- {{ route('admin.addMember') }} --}}" class="btn btn-sm btn-primary">Add_New</a>
                         </div>
                     </div>

                     <div class="card-body p-0">
                         <div class="table-responsive">
                             <table class="table m-0" id="product-table">
                                 <thead>
                                     <tr>
                                         <th class="text-center">#</th>
                                         <th class="text-center">Name</th>
                                         <th class="text-center">Email</th>
                                         <th class="text-center">Wallet</th>
                                         <th class="text-center">Registeration_Date</th>
                                         <th class="text-center">Updated_Date</th>
                                         <th class="text-center" colspan="">Actions</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     {{--   @php
                                             $count = 1;
                                             @endphp
                                             @forelse ($user_Record as $data) --}}
                                     <tr>
                                         <td class="text-center">{{ $user_Record->id }}</td>
                                         <td class="text-center">{{ $user_Record->name }}</td>
                                         <td class="text-center">{{ $user_Record->email }}</td>
                                         <td class="text-center">{{ number_format($user_Record->wallet, 2) }}</td>
                                         <td class="text-center">
                                             <div class="sparkbar" data-color="#f56954" data-height="20">
                                                 {{ date('d:m:Y H:i A', strtotime($user_Record->created_at)) }}
                                             </div>
                                         </td>
                                         <td class="text-center">
                                             <div class="sparkbar" data-color="#f56954" data-height="20">
                                                 {{ date('d:m:Y H:i A', strtotime($user_Record->updated_at)) }}
                                             </div>
                                         </td>
                                         <td class="text-center">
                                             <a href ="{{ url('user/transaction/store/' . $user_Record['id']) }}"
                                                 class="btn btn-warning btn-sm"><i class = "fas fa-pen text-white"></i> </a>
                                         </td>
                                     </tr>

                                 </tbody>
                             </table>
                         </div>

                     </div>

                     <div class="card-footer clearfix mt-3" style="padding: 10px; float:right">
                         {{--    {!! $getData->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!} --}}
                     </div>
                 </div>
             </div>





     </div>

     </div>


     </section>


     </div>
 @endsection
