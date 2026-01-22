 @extends('layouts.app')


 @section('contenet')
     <div class="content-wrapper">

         <div class="content-header">
             <div class="container-fluid">
                 <div class="row mb-2">
                     <div class="col-sm-6">
                         <h1 class="m-0">Update Sales</h1>
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
                         <div class="card card-outline card-primary">
                             <div class="card-header border-transparent">
                                 <h3 class="card-title">Update Sales</h3>
                                 <div class="card-tools">
                                     <a href="{{ url('admin/sales/index') }}" class="btn btn-tool btn-primary">
                                         Go Back
                                     </a>
                                     <button type="button" class="btn btn-tool" data-card-widget="remove">
                                         <i class="fas fa-times"></i></button>
                                 </div>
                             </div>

                             <form class="form-horizontal" method = "POST"
                                 action = "{{ url('admin/sale/update/' . $getRecord->slug) }}">
                                 {{ csrf_field() }}
                                 <input type="hidden" value="{{ $getRecord->id }}">

                                 <div class="card-body">

                             <div class="form-group row">
                                 <label for="member_id" class="col-sm-2 col-form-label">Member:</label>
                                 <div class="col-sm-10">
                                    <select name="member_id" id="member_id" class="form-control">
                                        <option value="">--Select Member--</option>
                                        @foreach ($getMember as $data)
                                            <option {{ ($getRecord->member_id == $data->id) ? 'selected' : '' }} value="{{ $data->id}}">{{ $data->member_name }}</option>
                                        @endforeach
                                    </select>
                                 </div>
                             </div>

                             <div class="form-group row">
                                 <label for="sale_title" class="col-sm-2 col-form-label">Title:</label>
                                 <div class="col-sm-10">
                                     <input type="text" class="form-control" id="sale_title"
                                         placeholder="Enter sale title....." name = "sale_title" required value="{{ $getRecord['sale_title'] }}">
                                 </div>
                             </div>
                             
                             <div class="form-group row">
                                 <label for="total_items" class="col-sm-2 col-form-label">Items:</label>
                                 <div class="col-sm-10">
                                     <input type="number" class="form-control" id="total_items"
                                         placeholder="0" name = "total_items" required value="{{ $getRecord['total_items'] }}">
                                 </div>
                             </div>
                             <div class="form-group row">
                                 <label for="total_price" class="col-sm-2 col-form-label">Price:</label>
                                 <div class="col-sm-10">
                                     <input type="number" class="form-control" id="total_price"
                                         placeholder="0" name = "total_price" required value="{{ $getRecord['total_price'] }}">
                                 </div>
                             </div>
                             <div class="form-group row">
                                 <label for="discount" class="col-sm-2 col-form-label">Discount:</label>
                                 <div class="col-sm-10">
                                     <input type="number" class="form-control" id="discount"
                                         placeholder="0" name = "discount" required value="{{ $getRecord['discount'] }}">
                                 </div>
                             </div>

                              <div class="form-group row">
                                 <label for="accepted" class="col-sm-2 col-form-label">Accepted:</label>
                                 <div class="col-sm-10">
                                    <select name="accepted" id="accepted" class="form-control">
                                        <option value="yes">--Select--</option>
                                        <option {{ $getRecord->accepted == 'yes' ? 'selected' : '' }} value="yes">--Yes--</option>
                                        
                                        <option {{ $getRecord->accepted == 'no' ? 'selected' : '' }} value="no">--No--</option>
                                    </select>
                                 </div>
                             </div>

                              <div class="form-group row">
                                 <label for="user_id" class="col-sm-2 col-form-label">User:</label>
                                 <div class="col-sm-10">
                                    <select name="user_id" id="user_id" class="form-control">
                                        <option value="">--Select User--</option>
                                        @foreach ($getUser as $data)
                                            <option {{ ($data['id'] == $getRecord['user_id']) ? 'selected' : '' }} value="{{ $data['id'] }}">{{ $data['name'] }}</option>
                                        @endforeach
                                    </select>
                                 </div>
                             </div>

                            <div class="form-group row">
                                 <div class="form-check">
                                 <input type="checkbox" name = "status" class="form-check-input" id="status" {{ $getRecord['status'] == 1 ? 'checked' : '' }}>
                                 <label class="form-check-label" for="status">Status</label>
                             </div>
                             </div>
                             
                         </div>


                                 <div class="card-footer">
                                     <button type="submit" class="btn btn-info">Update</button>
                                     <a href="{{ url('admin/sales/index') }}"
                                         class="btn btn-default float-right">Cancel</a>
                                 </div>

                             </form>

                         </div>
                     </div>





                 </div>

             </div>


         </section>


     </div>
 @endsection
