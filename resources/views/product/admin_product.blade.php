 @extends('layouts.app')


 @section('contenet')
     <div class="content-wrapper">

         <div class="content-header">
             <div class="container-fluid">
                 <div class="row mb-2">
                     <div class="col-sm-6">
                         <h1 class="m-0">Products</h1>
                     </div>
                     <div class="col-sm-6">
                         <ol class="breadcrumb float-sm-right">
                             <li class="breadcrumb-item"><a href="#">Products</a></li>
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
                                 <h3 class="card-title">Product's Data</h3>
                                 <div class="card-tools">
                                     <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                         <i class="fas fa-minus"></i>
                                     </button>
                                     <button type="button" class="btn btn-tool" data-card-widget="remove">
                                         <i class="fas fa-times"></i></button>
                                     <a href= "#" class="btn btn-sm btn-primary" data-toggle="modal"
                                         data-target="#addProductModal">Add_Product</a>
                                 </div>
                             </div>

                             <div class="card-body p-0">
                                 <div class="table-responsive">
                                     <table class="table m-0" id="product-table">
                                         <thead>
                                             <tr>
                                                 <th class="text-center">#</th>
                                                 <th class="text-center">Products Name</th>
                                                 <th class="text-center">Categories</th>
                                                 <th class="text-center">Product Code</th>
                                                 <th class="text-center">Status</th>
                                                 <th class="text-center">Product Brand</th>
                                                 <th class="text-center" colspan="3">Actions</th>
                                             </tr>
                                         </thead>
                                         <tbody>
                                             {{--  <tr>
                                                 <td><a href="pages/examples/invoice.html">OR7429</a></td>
                                                 <td>iPhone 6 Plus</td>
                                                 <td><span class="badge badge-danger">Delivered</span></td>
                                                 <td>
                                                     <div class="sparkbar" data-color="#f56954" data-height="20">
                                                         90,-80,90,70,-61,83,63
                                                     </div>
                                                 </td>
                                             </tr> --}}
                                         </tbody>
                                     </table>
                                 </div>

                             </div>

                             <div class="card-footer clearfix">
{{-- 
                                 <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>
                                 <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All
                                     Orders</a> --}}

                                     <div class="" id="pagination-links"></div>

                             </div> 

                         </div>
                     </div>





                 </div>

             </div>


         </section>


     </div>







     //Add product modal
     <div class="modal fade" id="addProductModal" tabindex="-1">
         <div class="modal-dialog">
             <div class="modal-content bg-secondary">
                 <div class="modal-header">
                     <h4 class="modal-title">Add Product</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     <p>Product &hellip;</p>
                     <form id = "productForm" enctype="multipart/form-data">
                         @csrf
                         <div class="card-body">
                             <div class="form-group">
                                 <label for="product_name">Product Name</label>
                                 <input type="text" name = "product_name" class="form-control" id="product_name"
                                     placeholder="Enter a product name" required>
                             </div>

                             <div class="form-group">
                                 <label for="category_id">Cartegory_id</label>
                                 <select name="category_id" id="category_id" class="form-control" required>
                                     <option value="">None</option>
                                     @foreach ($category as $key => $item)
                                         <option value="{{ $key }}">{{ $item }}
                                         </option>
                                     @endforeach
                                 </select>
                             </div>

                             <div class="form-group">
                                 <label for="image">Image_File</label>
                                 <input type="file" name = "image" class="form-control" id="image" required>
                             </div>

                             <div class="form-group">
                                 <label for="product_code">Product Code</label>
                                 <input type="text" name = "product_code" class="form-control" id="product_code"
                                     placeholder="Enter a product code" required>
                             </div>

                             <div class="form-group">
                                 <label for="brand">Product Brand</label>
                                 <input type="text" name = "brand" class="form-control" id="brand"
                                     placeholder="Enter a product brand">
                             </div>

                             <div class="form-group">
                                 <label for="purchase_price">Product Purchase Price</label>
                                 <input type="number" name = "purchase_price" class="form-control" id="purchase_price"
                                     placeholder="Enter a product purchse price">
                             </div>

                             <div class="form-group">
                                 <label for="selling_price">Product Selling Price</label>
                                 <input type="number" name = "selling_price" class="form-control" id="selling_price"
                                     placeholder="Enter a product selling price" required>
                             </div>

                             <div class="form-group">
                                 <label for="discount">Product Discount</label>
                                 <input type="number" name = "discount" class="form-control" id="discount"
                                     placeholder="Enter a product discount">
                             </div>

                             <div class="form-group">
                                 <label for="stock" class="form-input-label">Product Stock</label>
                                 <input type="number" name = "stock" class="form-control" id="stock"
                                     placeholder="Enter a product stock">
                             </div>

                             <div class="form-group">
                                 <label for="description">Description</label>
                                 <textarea class="form-control" name = "description" id="description" rows="3" placeholder="Enter ..."></textarea>
                             </div>

                             <div class="form-check">
                                 <input type="checkbox" name = "status" class="form-check-input" id="status">
                                 <label class="form-check-label" for="status">Status</label>
                             </div>
                         </div>

                         <div class="card-footer">
                             <button type="submit" class="btn btn-primary">
                                            <span id = "btnText">Save</span>
                                            <span id="loader" style="display: none;">Loading......</span>
                             </button>
                         </div>
                     </form>
                 </div>
                 <div class="modal-footer justify-content-between">
                     <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                     {{-- <button type="button" class="btn btn-outline-light">Save changes</button> --}}
                 </div>
             </div>

         </div>

     </div>




     //edit modal data display on form
     <div class="modal fade" id="editProductModal" tabindex="-1">
         <div class="modal-dialog">
             <div class="modal-content bg-secondary">
                 <div class="modal-header">
                     <h4 class="modal-title">Edit Product</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">

                     <form id = "editProductForm" enctype="multipart/form-data">
                         @csrf
                         <div class="card-body">
                            <input type="hidden" name = "slug" id="edit_slug">
                             <div class="form-group">
                                 <label for="product_name">Product Name</label>
                                 <input type="text" name = "product_name" class="form-control" id="edit_product_name">
                             </div>

                             <div class="form-group">
                                 <label for="category_id">Cartegory_id</label>
                                 <select name="category_id" id="edit_category_id" class="form-control" required>
                                     <option value="">None</option>
                                     @foreach ($category as $key => $item)
                                         <option value="{{ $key }}">{{ $item }}
                                         </option>
                                     @endforeach
                                 </select>
                             </div>

                             <div class="form-group">
                                <label for="">Current Image</label>
                                <br>
                                <img src="" id="edit_image_preview" class="img-thumbnail mb-2" alt="Product Image" style="width: 200px; height:auto; border-radius:6px; display:none">
                             </div>

                             <div class="form-group">
                                 <label for="image">Change_Image_File</label>
                                 <input type="file" name = "image" class="form-control" id="edit_image">
                             </div>

                             <div class="form-group">
                                 <label for="product_code">Product Code</label>
                                 <input type="text" name = "product_code" class="form-control" id="edit_product_code"
                                     placeholder="Enter a product code" required>
                             </div>

                             <div class="form-group">
                                 <label for="brand">Product Brand</label>
                                 <input type="text" name = "brand" class="form-control" id="edit_brand"
                                     placeholder="Enter a product brand">
                             </div>

                             <div class="form-group">
                                 <label for="purchase_price">Product Purchase Price</label>
                                 <input type="number" name = "purchase_price" class="form-control" id="edit_purchase_price"
                                     placeholder="Enter a product purchse price">
                             </div>

                             <div class="form-group">
                                 <label for="selling_price">Product Selling Price</label>
                                 <input type="number" name = "selling_price" class="form-control" id="edit_selling_price"
                                     placeholder="Enter a product selling price" required>
                             </div>

                             <div class="form-group">
                                 <label for="discount">Product Discount</label>
                                 <input type="number" name = "discount" class="form-control" id="edit_discount"
                                     placeholder="Enter a product discount">
                             </div>

                             <div class="form-group">
                                 <label for="stock">Product Stock</label>
                                 <input type="number" name = "stock" class="form-control" id="edit_stock"
                                     placeholder="Enter a product stock">
                             </div>

                             <div class="form-group">
                                 <label for="description">Description</label>
                                 <textarea class="form-control" name = "description" id="edit_description" rows="3" placeholder="Enter ..."></textarea>
                             </div>

                             <div class="form-check">
                                 <input type="checkbox" name = "status" class="form-check-input" id="edit_status">
                                 <label class="form-check-label" for="status">Status</label>
                             </div>
                         </div>

                         <div class="card-footer">
                             <button type="submit" class="btn btn-primary">Update</button>
                         </div>
                     </form>

                 </div>
                 <div class="modal-footer justify-content-between">
                     <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                    {{--  <button type="button" class="btn btn-outline-light">Save changes</button> --}}
                 </div>
             </div>

         </div>

     </div>


     //View product by slug
     <div class="modal fade" id="viewProductModal">
         <div class="modal-dialog">
             <div class="modal-content bg-secondary">
                 <div class="modal-header">
                     <h4 class="modal-title">Product_Full_Details</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span {{-- aria-hidden="true" --}}>&times;</span>
                     </button>
                 </div>

          

                  <div class="modal-body">

                     <form id = "editProductForm" enctype="multipart/form-data">
                         @csrf
                         <div class="card-body">
                            <input type="hidden" name = "slug" id="view_product_slug">
                             <div class="form-group">
                                 <label for="product_name">Product Name</label>
                                 <input type="text" readonly name = "product_name" class="form-control" id="view_product_name">
                             </div>

                             <div class="form-group">
                                 <label for="category_id">Cartegory_id</label>
                                 <select name="category_id" id="view_category_id" class="form-control" required>
                                     <option value="">None</option>
                                     @foreach ($category as $key => $item)
                                         <option value="{{ $key }}">{{ $item }}
                                         </option>
                                     @endforeach
                                 </select>
                             </div>

                             <div class="form-group">
                                <label for="">Current Image</label>
                                <br>
                                <img src="" id="view_image_preview" class="img-thumbnail mb-2" alt="Product Image" style="width: 200px; height:auto; border-radius:6px; display:none">
                             </div>

                             {{-- <div class="form-group">
                                 <label for="image">Change_Image_File</label>
                                 <input type="file" name = "image" class="form-control" id="edit_image">
                             </div> --}}

                             <div class="form-group">
                                 <label for="product_code">Product Code</label>
                                 <input type="text" name = "product_code" class="form-control" id="view_product_code"
                                     placeholder="Enter a product code" readonly required>
                             </div>

                             <div class="form-group">
                                 <label for="brand">Product Brand</label>
                                 <input type="text" name = "brand" class="form-control" id="view_brand"
                                     placeholder="Enter a product brand" readonly>
                             </div>

                             <div class="form-group">
                                 <label for="purchase_price">Product Purchase Price</label>
                                 <input type="number" readonly name = "purchase_price" class="form-control" id="view_purchase_price"
                                     placeholder="Enter a product purchse price">
                             </div>

                             <div class="form-group">
                                 <label for="selling_price">Product Selling Price</label>
                                 <input type="number" readonly name = "selling_price" class="form-control" id="view_selling_price"
                                     placeholder="Enter a product selling price" required>
                             </div>

                             <div class="form-group">
                                 <label for="discount">Product Discount</label>
                                 <input type="number" readonly name = "discount" class="form-control" id="view_discount"
                                     placeholder="Enter a product discount">
                             </div>

                             <div class="form-group">
                                 <label for="stock">Product Stock</label>
                                 <input type="number" name = "stock" class="form-control" readonly id="view_stock"
                                     placeholder="Enter a product stock">
                             </div>

                             <div class="form-group">
                                 <label for="description">Description</label>
                                 <textarea class="form-control" readonly name = "description" id="view_description" rows="3" placeholder="Enter ..."></textarea>
                             </div>

                             <div class="form-check">
                                 <input type="checkbox" name = "status" class="form-check-input" id="view_status">
                                 <label class="form-check-label" for="status">Status</label>
                             </div>
                         </div>

                         {{-- <div class="card-footer">
                             <button type="submit" class="btn btn-primary">Submit</button>
                         </div> --}}

                     </form>

                 </div>



                 {{-- <div class="modal-body">
                     <p>Product &hellip;</p>
                     <div class="card card-body">
                        <p><b>Product Slug: </b> <span id="view_product_slug"></span></p>
                         <p><b>Product Name: </b> <span id="view_product_name"></span></p>
                         <p><b>Category Id: </b> <span id="view_category_id"></span></p>
                         <p><b>Product Image: </b> 
                            <div class="form-group">
                                <label for="">Current Image</label>
                                <br>
                                <img src="" id="view_product_image" class="img-thumbnail mb-2" alt="Product Image" style="width: 200px; height:auto; border-radius:6px; display:none">
                             </div>
                        </p>
                         <p><b>Product Code: </b> <span id="view_product_code"></span></p>
                         <p><b>Product Brand: </b> <span id="view_brand"></span></p>
                         <p><b>Product Purchase Price: </b> <span id="view_purchase_price"></span></p>
                         <p><b>Product Selling Price: </b> <span id="view_selling_price"></span></p>
                         <p><b>Product Discount: </b> <span id="view_discount"></span></p>
                         <p><b>Product Stock: </b> <span id="view_stock"></span></p>
                         <p><b>Product Description: </b> <span id="view_description"></span></p>
                         <p><b>Product Status: </b> <span id="view_status"></span></p>
                     </div>
                 </div> --}}
                 <div class="modal-footer justify-content-between">
                     <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                     {{-- <button type="button" class="btn btn-outline-light">Save changes</button> --}}
                 </div>
             </div>

         </div>

     </div>


     {{-- Success message --}}
     <div class="flashMessage alert alert-success" style="display:none;"></div>

     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/dayjs/dayjs.min.js"></script>

     <script type="text/javascript">
         //add product to database

         $(document).ready(function() {

             $('#productForm').on('submit', function(e) {
                 e.preventDefault();
                 $('.flashMessage').hide();

                 /*  const formData = $(this).serialize(); */
                 let formData = new FormData(this);

                 $.ajax({
                     url: "{{ route('product.store') }}",
                     method: "POST",
                     data: formData,
                     processData: false,
                     contentType: false,
                     success: function(response) {

                        $('#productForm')[0].reset();

                         $('.flashMessage').html(response.message).fadeIn().delay(4000)
                             .fadeOut();
                              setTimeout(function() {
                             location.reload();
                         }, 2000);
                        
                        document.getElementById('btnText').style.display = "none";
                        document.getElementById('loader').style.display = "inline";

                         $('#addProductModal').modal('hide');

                         fetchProduct();

                     },

                     error: function(xhr) {
                         const errors = xhr.responseJSON.errors;
                         let errorMessages = ' Fail To Add Product..... ';
                         for (const key in errors) {
                             errorMessages += `<li> ${errors[key]} </li>`;
                         }

                         $('.flashMessage')
                             .addClass('alert-danger')
                             .html(`<ul> ${errorMessages} </ul>`)
                             .fadeIn();

                     },

                 });

             });

         });


            //fetch products on page load
         $(document).ready(function() {
             fetchProduct();
         

         //fetch product display in table
         /* function fetchProduct() {
             $.ajax({
                 url: "{{ route('product.fetch') }}",
                 method: "GET",
                 success: function(response) {
                     const tbody = $('#product-table tbody');
                     tbody.empty();

                     response.forEach((product, index) => {
                         const row = `
                        <tr>
                            <td>${index = 1}</td>
                            <td>${product.product_name}</td>
                            <td>${product.cartegories ? product.cartegories.name : 'N/A'}</td>
                            <td>${product.product_code}</td>
                            <td>
                            <span class="badge ${product.status == 1 ? 'badge-success' : 'badge-warning'}">
                                ${product.status == 1 ? 'Published' : 'Unpublished'}
                            </span>
                            </td>
                            <td>
                            <span class="badge badge-primary">
                                ${product.brand}
                            </span>
                            </td>
                            <td>
                            <button class="btn btn-secondary btn-sm editProductBtn"  data-slug="${product.slug}"><i class = "fas fa-pen text-white"></i> </button>
                            </td>

                                <td>
                            <button class="btn btn-danger btn-sm deleteProductBtn"  data-id="${product.id}"> <i class = "fas fa-trash text-white"></i> </button>
                            </td>

                                <td>
                            <button class="btn btn-info btn-sm viewProductBtn"  data-slug="${product.slug}"> <i class = "fas fa-eye text-white"></i> </button>
                            </td>
                        </tr>
                           `;

                         tbody.append(row);

                         
                     });

                 },

                 error: function() {
                     alert('Failed to fetch products...');
                 },

             });
         } */




             function fetchProduct(page = 1) {
                 $.ajax({
                     url: "{{ route('product.fetch') }}?page=" + page,
                     type: "GET",
                     success: function(response) {
                         let tableBody = '';
                         let start = (response.current_page -1) * response.per_page;
                         $.each(response.data, function(index, product) {

                             /*  let createdAt = dayjs(cartegory.created_at).format(
                                  'MM, YYYY h:mm A'); */

                             tableBody += `
                                  <tr>
                                                 <td>${start + index + 1}</td>
                                               <td>${product.product_name}</td>
                            <td>${product.cartegories ? product.cartegories.name : 'N/A'}</td>
                            <td>${product.product_code}</td>
                            <td>
                            <span class="badge ${product.status == 1 ? 'badge-success' : 'badge-warning'}">
                                ${product.status == 1 ? 'Published' : 'Unpublished'}
                            </span>
                            </td>
                            <td>
                            <span class="badge badge-primary">
                                ${product.brand}
                            </span>
                            </td>
                            <td>
                            <button class="btn btn-secondary btn-sm editProductBtn"  data-slug="${product.slug}"><i class = "fas fa-pen text-white"></i> </button>
                            </td>

                                <td>
                            <button class="btn btn-danger btn-sm deleteProductBtn"  data-id="${product.id}"> <i class = "fas fa-trash text-white"></i> </button>
                            </td>

                                <td>
                            <button class="btn btn-info btn-sm viewProductBtn"  data-slug="${product.slug}"> <i class = "fas fa-eye text-white"></i> </button>
                            </td>
                                             </tr>
                    `;

                         });

                         $('#product-table tbody').html(tableBody);

                         //render pagination
                         renderPagination(response);

                     },

                     error: function(xhr) {
                         console.error('Failed To Fetch Product Data:', xhr.responseText);
                     }

                 });
             }



             //pagination function script
             function renderPagination(response)
             {
                let pagination = '';

                if(response.last_page > 1)
             {

                pagination += `<ul class = "pagination">`;
                    for(let i = 1; i <= response.last_page; i++)
                {
                      pagination += 
                                    `<li class = "page-item ${i === response.current_page ? 'active' : ''}">
                                         <a href = "" class = "page-link" data-page ="${i}"> ${i} </a>
                                     </li>`;
                }

                      pagination +=`</ul>`;
                
             } 

             $('#pagination-links').html(pagination);

             }

             //handle pagination click
             $(document).on('click', '.page-link', function(e){
                 e.preventDefault();
                 let page = $(this).data('page');
                 fetchProduct(page);
             });
















           //edit modal product form display with specific product ready to update
         $(document).on('click', '.editProductBtn', function(){

             const slug = $(this).data('slug'); 
            /*  let slug = new Slug(this); */

             $.get(`{{ url('admin/product/edit') }}/${slug}`, function(prod){
                   
                      $('#edit_slug').val(prod.slug);
                      $('#edit_product_name').val(prod.product_name);
                      $('#edit_category_id').val(prod.category_id);
                      $('#edit_image').attr(prod.image);
                      $('#edit_image_preview').attr('src', `/storage/${prod.image}`).show();
                      $('#edit_product_code').val(prod.product_code);
                      $('#edit_brand').val(prod.brand);
                      $('#edit_purchase_price').val(prod.purchase_price);
                      $('#edit_selling_price').val(prod.selling_price);
                      $('#edit_discount').val(prod.discount);
                      $('#edit_stock').val(prod.stock);
                      $('#edit_description').val(prod.description);
                      $('#edit_status').prop('checked',prod.status == 1);


                      $('#editProductModal').modal('show');

             });
         });



         //view product(resource) script by slug
          $(document).on('click', '.viewProductBtn', function(){
                  const slug = $(this).data('slug');

                  $.get(`{{ url('admin/product/view') }}/${slug}`, function(product){

                      $('#view_product_slug').val(product.slug);
                      $('#view_product_name').val(product.product_name);
                      $('#view_category_id').val(product.category_id);
                      $('#view_image_preview').attr('src', `/storage/${product.image}`).show();
                      $('#view_product_code').val(product.product_code);
                      $('#view_brand').val(product.brand);
                      $('#view_purchase_price').val(product.purchase_price);
                      $('#view_selling_price').val(product.selling_price);
                      $('#view_discount').val(product.discount);
                      $('#view_stock').val(product.stock);
                      $('#view_description').val(product.description);
                      $('#view_status').prop('checked',product.status == 1);

                      $('#viewProductModal').modal('show');


                  });
         });
 


             //delete button script
              $(document).on('click', '.deleteProductBtn', function() {

                let id = $(this).data('id');

                     if(confirm('Are you sure you want to delete this record ?'))
                     {
                         $.ajax({
                               url: `{{ url('admin/product/delete') }}/${id}`,
                               type: "DELETE",
                               data: {
                                _token: "{{ csrf_token() }}"
                               },

                               success: function(response){
                                 fetchProduct();
                                    $('.flashMessage')
                                        .text(response.success)
                                        .fadeIn()
                                        .delay()
                                        .fadeOut();

                                    setTimeout(function() {
                                        location.reload();
                                    }, 2000);
                               }

                      });
                     }

             });
 




             //update data
             $('#editProductForm').submit(function(e) {
                e.preventDefault();

                let slug = $('#edit_slug').val();
                let formData = new FormData(this);

                $.ajax({
                      /*  */
                    url: `{{ url('admin/product/update') }}/${slug}`,
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response)
                    {
                         $('#editProductModal').modal('hide');
                          $('.flashMessage')
                             .text(response.success)
                             .fadeIn()
                             .delay(3000)
                             .fadeOut();


                         fetchProduct();

                         setTimeout(function() {
                             location.reload();
                         }, 2000);
                    },

                         error: function(xhr) {
                         console.log(xhr.responseText);
                         alert('Update failed — Try again ....');
                         }

                });


             });
           



        
         });






       
     </script>
 @endsection
