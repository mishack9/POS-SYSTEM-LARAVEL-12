 @extends('layouts.app')


 @section('contenet')
     <div class="content-wrapper">

         <div class="content-header">
             <div class="container-fluid">
                 <div class="row mb-2">
                     <div class="col-sm-6">
                         <h1 class="m-0">Update Purchase</h1>
                     </div>
                     <div class="col-sm-6">
                         <ol class="breadcrumb float-sm-right">
                             <li class="breadcrumb-item"><a href="#">Purchase</a></li>
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
                                 <h3 class="card-title">Update Purchase</h3>
                                 <div class="card-tools">
                                     <a href="{{ url('admin/purchase/index') }}" class="btn btn-tool btn-primary">
                                         Go Back
                                     </a>
                                     <button type="button" class="btn btn-tool" data-card-widget="remove">
                                         <i class="fas fa-times"></i></button>
                                 </div>
                             </div>

                             <form class="form-horizontal" method = "POST"
                                 action = "{{ url('admin/purchase/update/'.$getRecordValue->id) }}">
                                 {{ csrf_field() }}
                                 <input type="hidden" value="{{ $getRecordValue->id }}" name = "id">

                                 <div class="card-body">
                                     <div class="form-group row">
                                         <label for="purchase_title" class="col-sm-2 col-form-label">Title:</label>
                                         <div class="col-sm-10">
                                             <input type="text" class="form-control" id="purchase_title"
                                                 value="{{ $getRecordValue->purchase_title }}" name = "purchase_title"
                                                 required>
                                         </div>
                                     </div>
                                     <div class="form-group row">
                                         <label for="supplier_id" class="col-sm-2 col-form-label">Supplier:</label>
                                         <div class="col-sm-10">
                                             <select name="supplier_id" id="supplier_id" class="form-control">
                                                 @foreach ($getRecord as $data)
                                                     <option
                                                         {{ ($getRecordValue->supplier_id == $data->id ? 'selected' : '') }} 
                                                         value="{{ $data->id }}">{{ $data->supplier_name }}
                                                        </option>
                                                 @endforeach
                                             </select>
                                         </div>
                                     </div>
                                     <div class="form-group row">
                                         <label for="total_items" class="col-sm-2 col-form-label">Items:</label>
                                         <div class="col-sm-10">
                                             <input type="number" class="form-control" id="total_items"
                                                 value="{{ $getRecordValue['total_items'] }}" name = "total_items" required>
                                         </div>
                                     </div>
                                     <div class="form-group row">
                                         <label for="total_price" class="col-sm-2 col-form-label">Price:</label>
                                         <div class="col-sm-10">
                                             <input type="number" class="form-control" id="total_price"
                                                 value="{{ $getRecordValue['total_price'] }}" name = "total_price" required>
                                         </div>
                                     </div>
                                     <div class="form-group row">
                                         <label for="discount" class="col-sm-2 col-form-label">Discount:</label>
                                         <div class="col-sm-10">
                                             <input type="number" class="form-control" id="discount"
                                                 value="{{ $getRecordValue['discount'] }}" name = "discount">
                                         </div>
                                     </div>
                                     <div class="form-group row">
                                         <div class="form-check">
                                             <input type="checkbox" name = "status" class="form-check-input" id="status"
                                                 {{ $getRecordValue['status'] ? 'checked' : '' }}>
                                             <label class="form-check-label" for="status">Status</label>
                                         </div>
                                     </div>

                                 </div>


                                 <div class="card-footer">
                                     <button type="submit" class="btn btn-info">Update</button>
                                     <a href="{{ url('admin/purchase/index') }}"
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
