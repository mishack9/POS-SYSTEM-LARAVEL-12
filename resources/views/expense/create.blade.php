 @extends('layouts.app')


 @section('contenet')
     <div class="content-wrapper">

         <div class="content-header">
             <div class="container-fluid">
                 <div class="row mb-2">
                     <div class="col-sm-6">
                         <h1 class="m-0">Add Expense</h1>
                     </div>
                     <div class="col-sm-6">
                         <ol class="breadcrumb float-sm-right">
                             <li class="breadcrumb-item"><a href="#">Expense</a></li>
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
                                     <a href="{{ url('admin/expense/index') }}" class="btn btn-tool btn-primary">
                                         Go Back
                                     </a>
                                     <button type="button" class="btn btn-tool" data-card-widget="remove">
                                         <i class="fas fa-times"></i></button>
                                 </div>
                             </div>

                             <form class="form-horizontal" method = "POST" action = "{{ route('admin.expenseStore') }}">
                                {{ csrf_field() }}
                                 <div class="card-body">
                                     <div class="form-group row">
                                         <label for="expense_title" class="col-sm-2 col-form-label">Expense Title :</label>
                                         <div class="col-sm-10">
                                             <input type="text" class="form-control" id="expense_title"
                                                 placeholder="Enter expense title....." name = "expense_title" required>
                                         </div>
                                     </div>
                                      <div class="form-group row">
                                         <label for="expense_price" class="col-sm-2 col-form-label">Expense Amount :</label>
                                         <div class="col-sm-10">
                                             <input type="number" class="form-control" id="expense_price"
                                                 placeholder="" name = "expense_price" required>
                                         </div>
                                     </div>
                                     <div class="form-group row">
                                         <label for="expense_description" class="col-sm-2 col-form-label">Expense Description :</label>
                                         <div class="col-sm-10">
                                             <textarea name="expense_description" class="form-control" id="expense_description" placeholder="Enter a description for expense...." ></textarea>
                                         </div>
                                     </div>
                                    
                                 </div>

                                 <div class="card-footer">
                                     <button type="submit" class="btn btn-info">Save Expense</button>
                                     <a href="{{ url('admin/expense/index') }}" class="btn btn-default float-right">Cancel</a>
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
