 @extends('layouts.app')


 @section('contenet')
     <div class="content-wrapper">

         <div class="content-header">
             <div class="container-fluid">
                 <div class="row mb-2">
                     <div class="col-sm-6">
                         <h1 class="m-0">Add Wallet</h1>
                     </div>
                     <div class="col-sm-6">
                         <ol class="breadcrumb float-sm-right">
                             <li class="breadcrumb-item"><a href="#">Wallet</a></li>
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
                         <div class="card">
                             <div class="card-header border-transparent">
                                 {{--      <h3 class="card-title">Add New Member list</h3> --}}
                                 <div class="card-tools">
                                     <a href="{{ url('user/transaction/index') }}" class="btn btn-tool btn-primary">
                                         Go Back
                                     </a>
                                     <button type="button" class="btn btn-tool" data-card-widget="remove">
                                         <i class="fas fa-times"></i></button>
                                 </div>
                             </div>

                             
                                 

                                 <div class="card-body">
                                     <div class="container">
                                         <div class="card card-outline card-primary">
                                             <div class="card-header text-center">
                                                 <a href="" class="h1"><b>Wallet </b> Add/Update </a>
                                             </div>
                                             <div class="card-body">
                                                 {{--  <p class="login-box-msg">Wallet Transaction</p> --}}
                                                 <form action="{{ url('user/wallet/store/' . $user_Record->id) }}"
                                                     method="post">
                                                     {{ csrf_field() }}
                                                     <div class="input-group mb-3">
                                                         <input type="number" name="wallet" class="form-control"
                                                             value="{{ $user_Record->wallet }}">
                                                         <div class="input-group-append">
                                                             <div class="input-group-text">
                                                                 <span class="fas fa-dollar-sign"></span>
                                                             </div>
                                                         </div>
                                                     </div>
                                                     <div class="row">

                                                         <div class="col-4">
                                                             <button type="submit"
                                                                 class="btn btn-primary btn-block">Save</button>
                                                         </div>

                                                     </div>
                                                 </form>

                                             </div>

                                         </div>
                                     </div>
                                 </div>

                                 <div class="card-footer">
                                     <a href="{{ url('user/transaction/index') }}"
                                         class="btn btn-default float-right">Cancel</a>
                                 </div>

                            

                         </div>
                     </div>





                 </div>

             </div>


         </section>


     </div>
 @endsection
