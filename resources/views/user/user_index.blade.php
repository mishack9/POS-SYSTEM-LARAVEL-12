 @extends('layouts.app')


 @section('contenet')
     <div class="content-wrapper">

         <div class="content-header">
             <div class="container-fluid">
                 <div class="row mb-2">
                     <div class="col-sm-6">
                         <h1 class="m-0">Users</h1>
                     </div>
                     <div class="col-sm-6">
                         <ol class="breadcrumb float-sm-right">
                             <li class="breadcrumb-item"><a href="#">Users/Management</a></li>
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
                                 <h3 class="card-title">Search User's Filter</h3>
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
                                                 <input type="number" class="form-control" placeholder="ID" name="id" value="{{ Request()->id }}">
                                             </div>

                                             <div class="form-group col-md-3 col-sm-6 col-lg-3">
                                                 <label for="name">User_Name</label>
                                                 <input type="text" class="form-control" placeholder="User name" name="name" value="{{ Request()->name }}">
                                             </div>

                                             <div class="form-group col-md-3 col-sm-6 col-lg-3">
                                                 <label for="email">User_Email</label>
                                                 <input type="email" class="form-control" placeholder="user@gmail.com"
                                                     name="email" value="{{ Request()->email }}">
                                             </div>
 
                                             <div class="form-group col-md-3 col-sm-6 col-lg-3">
                                                 <label for="created_at">Created_At</label>
                                                 <input type="date" class="form-control" placeholder="2023 12:12:10 30"
                                                     name="created_at" value="{{ Request()->created_at }}">
                                             </div>

                                             <div class="form-group col-md-3 col-sm-6 col-lg-3">
                                                 <label for="updated_at">Updated_At</label>
                                                 <input type="date" class="form-control" placeholder="2023 12:12:10 30"
                                                     name="updated_at" value="{{ Request()->updated_at }}">
                                             </div>


                                         </div>

                                           <button type="submit" class="btn btn-sm btn-info float-left">Filter User</button>
                                            {{-- <a href="" class="btn btn-sm btn-secondary float-right">View All</a> --}}
                                     </div>
                                 </form>

                             </div>

                         </div>


                         {{-- filter search end --}}
                         
                         @include('_message')
                         <div class="card">
                             <div class="card-header border-transparent">
                                 
                                 <h3 class="card-title">User's list</h3>
                                 <div class="card-tools">
                                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                         <i class="fas fa-minus"></i>
                                     </button>
                                     <button type="button" class="btn btn-tool" data-card-widget="remove">
                                         <i class="fas fa-times"></i></button>
                                     <a href= "{{ route('admin.addUser') }}"
                                         class="btn btn-sm btn-primary">Add_New_User</a>
                                 </div>
                             </div>

                             <div class="card-body p-0">
                                 <div class="table-responsive">
                                     <table class="table m-0" id="product-table">
                                         <thead>
                                             <tr>
                                                 <th class="text-center">#</th>
                                                 <th class="text-center">User Name</th>
                                                 <th class="text-center">User Email</th>
                                                 <th class="text-center">Wallet</th>
                                                 <th class="text-center">Created Date</th>
                                                 <th class="text-center" colspan="">Actions</th>
                                             </tr>
                                         </thead>
                                         <tbody>
                                             <?php
                                             $count = 1;
                                             ?>
                                             @forelse ($user_data as $data)
                                                 <tr>
                                                     <td class="text-center">{{ $count++ }}</td>
                                                     <td class="text-center">{{ $data['name'] }}</td>
                                                     <td class="text-center">{{ $data['email'] }}</td>
                                                     <td class="text-center">{{ number_format($data['wallet'], 2) }}</td>
                                                     <td class="text-center">
                                                         <div class="sparkbar" data-color="#f56954" data-height="20">
                                                             {{ date('d:m:Y H:i A', strtotime($data['created_at'])) }}
                                                         </div>
                                                     </td>
                                                     <td class="text-center">
                                                         <a href ="{{ url('admin/user/edit/' . $data['id']) }}"
                                                             class="btn btn-warning btn-sm"><i
                                                                 class = "fas fa-pen text-white"></i> </a>
                                                     </td>

                                                     <td class="text-center">
                                                         <a href = "{{ url('admin/user/delete/' . $data['id']) }}"
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
                                 {!! $user_data->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
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

 @endsection




