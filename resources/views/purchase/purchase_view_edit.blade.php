 @extends('layouts.app')


 @section('contenet')
     <div class="content-wrapper">

         <div class="content-header">
             <div class="container-fluid">
                 <div class="row mb-2">
                     <div class="col-sm-6">
                         <h1 class="m-0">Update Purchase Detail</h1>
                     </div>
                     <div class="col-sm-6">
                         <ol class="breadcrumb float-sm-right">
                             <li class="breadcrumb-item"><a href="#">Purchase_Detail</a></li>
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
                                     <a href="{{ url('admin/puchase/detail/' .$getDetail->purchase_id) }}" class="btn btn-tool btn-primary">
                                         Go Back
                                     </a>
                                     <button type="button" class="btn btn-tool" data-card-widget="remove">
                                         <i class="fas fa-times"></i></button>
                                 </div>
                             </div>

                               <form class="form-horizontal" method = "POST" action = "{{ url('admin/purchase/detail/edit/' .$getDetail->id)}}">
                                 {{ csrf_field() }}
                                 <div class="card-body">
                                     <input type="hidden" name = "purchase_id" value="{{ $getDetail->purchase_id }}">
                                     <div class="form-group row">
                                         <label for="product_id" class="col-sm-2 col-form-label">Product Name :</label>
                                         <div class="col-sm-10">
                                             <select name="product_id" id="product_id" class="form-control">
                                                 <option value="">--Select Product--</option>
                                                 @foreach ($product as $data)
                                                     <option {{ ($getDetail->product_id == $data->id ? 'selected' : '') }} value="{{ $data->id }}">{{ $data->product_name }}</option>
                                                 @endforeach
                                             </select>
                                         </div>
                                     </div>

                                     <div class="form-group row">
                                         <label for="purchase_price" class="col-sm-2 col-form-label"> Purchase Price
                                             :</label>
                                         <div class="col-sm-10">
                                             <input type="number" class="form-control" id="purchase_price" placeholder=""
                                                 name = "purchase_price"  value="{{ $getDetail->purchase_price }}">
                                         </div>
                                     </div>

                                     <div class="form-group row">
                                         <label for="amount" class="col-sm-2 col-form-label"> Amount :</label>
                                         <div class="col-sm-10">
                                             <input type="number" class="form-control" id="amount" placeholder=""
                                                 name = "amount" value="{{ $getDetail->amount }}">
                                         </div>
                                     </div>

                                     <div class="form-group row">
                                         <label for="sub_total" class="col-sm-2 col-form-label"> Sub Total
                                             :</label>
                                         <div class="col-sm-10">
                                             <input type="number" class="form-control" id="sub_total" placeholder=""
                                                 name = "sub_total" value="{{ $getDetail->sub_total }}">
                                         </div>
                                     </div>

                                     <div class="form-check">
                                         <input type="checkbox" name = "status" class="form-check-input" id="edit_status" {{ $getDetail->status == 1 ? 'checked' : '' }}>
                                         <label class="form-check-label" for="edit_status">Status</label>
                                     </div>

                                 </div>

                                 <div class="card-footer">
                                     <button type="submit" class="btn btn-info">Update</button>

                                     <a href="{{ url('admin/puchase/detail/' .$getDetail->purchase_id) }}"
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
