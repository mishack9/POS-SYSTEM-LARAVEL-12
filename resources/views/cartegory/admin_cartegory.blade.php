 @extends('layouts.app')


 @section('contenet')
     <div class="content-wrapper">

         <div class="content-header">
             <div class="container-fluid">
                 <div class="row mb-2">
                     <div class="col-sm-6">
                         <h1 class="m-0">Cartegory</h1>
                     </div>
                     <div class="col-sm-6">
                         <ol class="breadcrumb float-sm-right">
                             <li class="breadcrumb-item"><a href="">Cartegory</a></li>
                             <li class="breadcrumb-item active">Dashboard</li>
                         </ol>
                     </div>
                 </div>
             </div>
         </div>


         <section class="content">
             <div class="container-fluid">


                 <div class="row">
                     <div class="col-md-6 col-lg-6 col-sm-6">
                         <div class="card">
                             <div class="card-header border-transparent">
                                 <h3 class="card-title">Latest Orders</h3>
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
                                 <div class="table-responsive">
                                     <table class="table m-0" id="cartegory-table">
                                         <thead>
                                             <tr>
                                                 <th class="text-center">#</th>
                                                 <th class="text-center">Cartegory Name</th>
                                                 <th class="text-center">Status</th>
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
                                 {{-- <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a> --}}
                                 {{-- <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All
                                     Categories</a> --}}
                                     <div class="" id="pagination-links"></div>
                             </div>

                         </div>
                     </div>


                     <div class="col-md-6 col-lg-6 col-sm-6">


                         <div class="card-body p-0">
                             <div class="card card-primary">
                                 <div class="card-header border-transparent">
                                     <h3 class="card-title">Add Cartegory</h3>
                                     {{--  <div class="card-tools">
                                         <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                             <i class="fas fa-minus"></i>
                                         </button>
                                         <button type="button" class="btn btn-tool" data-card-widget="remove">
                                             <i class="fas fa-times"></i>
                                         </button>
                                     </div --}}
                                 </div>


                                 <form id = "cartegoryForm">
                                     @csrf
                                     <div class="card-body">
                                         <div class="form-group">
                                             <label for="name">Catergory Name</label>
                                             <input type="text" name = "name" class="form-control" id="name"
                                                 placeholder="Enter a cartegory name" required>
                                                {{--  @error('name')
                                             <p class = "text-danger"> * {{ $message }}</p>
                                         @enderror --}}
                                         </div>

                                         <div class="form-group">
                                             <label for="parent_id">Parent Cartegory</label>
                                             <select name="parent_id" id="parent_id" class="form-control">
                                                 <option value="">None</option>
                                                 @foreach ($cartegoriess as $data)
                                                     <option value="{{ $data->id }}" id="parent_id">{{ $data->name }}
                                                     </option>
                                                 @endforeach
                                             </select>
                                         </div>

                                         <div class="form-group">
                                             <label for="sort_order">Sort_Order</label>
                                             <input type="number" name = "sort_order" class="form-control" id="sort_order"
                                                 placeholder="Enter Sort_order">
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
                         </div>


                     </div>


                 </div>

             </div>


         </section>


     </div>


     {{-- modal edit cartegory --}}

     <div class="modal fade" id="editCategoryModal" tabindex = "-1">
         <div class="modal-dialog">
             <div class="modal-content bg-secondary">
                 <div class="modal-header">
                     <h4 class="modal-title">Edit Cartegory</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     <p>&hellip;</p>
                     <form id = "editCategoryForm">
                         @csrf

                         <input type="hidden" id="edit_slug">
                         <div class="card-body">
                             <div class="form-group">
                                 <label for="name">Catergory Name</label>
                                 <input type="text" name = "name" class="form-control" id="edit_name"
                                     placeholder="Enter a cartegory name" required>
                             </div>

                             <div class="form-group">
                                 <label for="parent_id">Parent Cartegory</label>
                                 <select name="parent_id" id="edit_parent_id" class="form-control">

                                 </select>
                             </div>

                             <div class="form-group">
                                 <label for="sort_order">Sort_Order</label>
                                 <input type="number" name = "sort_order" class="form-control" id="edit_sort_order"
                                     placeholder="Enter Sort_order">
                             </div>

                             <div class="form-group">
                                 <label for="description">Description</label>
                                 <textarea class="form-control" name = "description" id="edit_description" rows="3" placeholder="Enter ..."></textarea>
                             </div>

                             <div class="form-check">
                                 <input type="checkbox" name = "status" class="form-check-input" id="edit_status">
                                 <label class="form-check-label" for="edit_status">Status</label>
                             </div>
                         </div>

                         <div class="card-footer">
                             <button type="submit" class="btn btn-primary">Save changes</button>
                         </div>
                     </form>
                 </div>
                 <div class="modal-footer justify-content-right">
                     <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                     {{-- <button type="submit" class="btn btn-outline-light">Save changes</button> --}}
                 </div>
             </div>

         </div>

     </div>


     //View category by slug
     <div class="modal fade" id="viewCategoryModal">
         <div class="modal-dialog">
             <div class="modal-content bg-secondary">
                 <div class="modal-header">
                     <h4 class="modal-title">Category_Details</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     <p>Category &hellip;</p>
                     <div class="card card-body">
                         <p><b>Category Name: </b> <span id="view_name"></span></p>
                         <p><b>Category Slug: </b> <span id="view_slug"></span></p>
                         <p><b>Category Status: </b> <span id="view_status"></span></p>
                         <p><b>Category Description: </b> <span id="view_description"></span></p>
                     </div>
                 </div>
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
         //fetch and read cartegory
         $(document).ready(function() {
             fetchCartegories();

             function fetchCartegories(page = 1) {
                 $.ajax({
                     url: "{{ url('admin/catergory/data') }}?page=" + page,
                     type: "GET",
                     success: function(response) {
                         let tableBody = '';
                         let start = (response.current_page -1) * response.per_page;
                         $.each(response.data, function(index, cartegory) {

                             /*  let createdAt = dayjs(cartegory.created_at).format(
                                  'MM, YYYY h:mm A'); */

                             tableBody += `
                                  <tr>
                                                 <td>${start + index + 1}</td>
                                                 <td>${cartegory.name}</td>
                                                <td>
                                                    <span class="badge ${cartegory.status == 1 ? 'badge-success' : 'badge-warning'}">
                                                        ${cartegory.status == 1 ? 'Published' : 'Unpublished'}
                                                    </span>
                                                </td>
                                                 <td>
                                                    <button class="btn btn-secondary btn-sm editBtn"  data-slug="${cartegory.slug}"><i class = "fas fa-pen text-white"></i> </button>
                                                    </td>

                                                     <td>
                                                    <button class="btn btn-danger btn-sm deleteBtn"  data-id="${cartegory.id}"> <i class = "fas fa-trash text-white"></i> </button>
                                                    </td>

                                                     <td>
                                                    <button class="btn btn-info btn-sm viewBtn"  data-slug="${cartegory.slug}"> <i class = "fas fa-eye text-white"></i> </button>
                                                    </td>
                                             </tr>
                    `;

                         });

                         $('#cartegory-table tbody').html(tableBody);

                         //render pagination
                         renderPagination(response);

                     },

                     error: function(xhr) {
                         console.error('Failed To Fetch Carteories:', xhr.responseText);
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
                 fetchCartegories(page);
             });


             //view category modal script by slug
             $(document).on('click', '.viewBtn', function() {
                 let slug = $(this).data('slug');

                 $.get(`{{ url('admin/category/view') }}/${slug}`,
                     function(cat) {
                         $('#view_name').text(cat.name);
                         $('#view_slug').text(cat.slug);
                         $('#view_status').text(cat.status == 1 ? 'Published' : 'Un_Published');
                         $('#view_description').text(cat.description ?? '_');

                         $('#viewCategoryModal').modal('show');
                     }
                 );

             });




             //delete button 
             $(document).on('click', '.deleteBtn', function() {
                 let id = $(this).data('id');
                 if (confirm('Are you sure , you wan to delete this record ???')) {

                     $.ajax({
                         url: `{{ url('admin/cartegory/delete') }}/${id}`,
                         type: "DELETE",
                         data: {
                             _token: "{{ csrf_token() }}"
                         },

                         success: function(respone) {
                             fetchCartegories();
                             $('.flashMessage')
                                 .text(respone.success)
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


             /*  }); */


             //edit button
             $(document).on('click', '.editBtn', function() {

                 let slug = $(this).data('slug');

                 $.get(`{{ url('admin/cartegory/edit') }}/${slug}`, function(cat) {

                     $('#edit_slug').val(cat.slug);
                     $('#edit_name').val(cat.name);
                     $('#edit_sort_order').val(cat.sort_order);
                     $('#edit_description').val(cat.description);
                     $('#edit_status').prop('checked', cat.status == 1);

                     loadParentCategories(cat.parent_id);

                     $('#editCategoryModal').modal('show');
                 });
             });


             // =======================G
             // LOAD PARENT CATEGORIES
             // =======================
             function loadParentCategories(selected = null) {
                 $.get("{{ url('admin/catergory/data') }}", function(data) {

                     let options = `<option value="">None</option>`;

                     $.each(data, function(_, cat) {
                         options += `
                    <option value="${cat.id}"
                        ${cat.id == selected ? 'selected' : ''}>
                        ${cat.name}
                    </option>
                `;
                     });

                     $('#edit_parent_id').html(options);
                 });
             }



             // =======================
             // UPDATE CATEGORY
             // =======================
             $('#editCategoryForm').submit(function(e) {
                 e.preventDefault();

                 let slug = $('#edit_slug').val();
                 const formData = $(this).serialize() /* + '&_method=PUT' */ ;

                 /*  $.post(`{{ url('admin/cartegory/update') }}/${slug}`, formData, function () {
                      $('#editCategoryModal').modal('hide');
                      fetchCategories();
                  }); */

                 $.ajax({
                     url: `{{ url('admin/cartegory/update') }}/${slug}`,
                     type: "POST",
                     data: formData,
                     success: function(response) {
                         $('#editCategoryModal').modal('hide');

                         $('.flashMessage')
                             .text(response.success)
                             .fadeIn()
                             .delay(4000)
                             .fadeOut();

                         fetchCartegories();

                         setTimeout(function() {
                             location.reload();
                         }, 2000);
                     },
                     error: function(xhr) {
                         console.log(xhr.responseText);
                         alert('Update failed — Try again ......');
                     }
                 });
             });



         });
     </script>


     <script>
         //Add cartegory
         $(document).ready(function() {
             $('#cartegoryForm').on('submit', function(e) {
                 e.preventDefault();
                 let formData = $(this).serialize();
                 $.ajax({

                     url: "{{ url('admin/cartegory/store') }}",
                     type: "POST",
                     data: formData,
                     success: function(response) {

                         $('#cartegoryForm')[0].reset();

                         $('.flashMessage')
                             .text(response.success)
                             .fadeIn()
                             .delay(4000)
                             .fadeOut();

                         setTimeout(function() {
                             location.reload();
                         }, 2000);
     
                     document.getElementById('btnText').style.display = "none";
                     document.getElementById('loader').style.display = "inline";

                     },

                     error: function(xhr) {
                         const errors = xhr.responseJSON.errors;
                         let errorMessages = ' Fail To Add Category..... ';
                         for (const key in errors) {
                             errorMessages += `<li> ${errors[key]} </li>`;
                         }

                         $('.flashMessage')
                             .addClass('alert-danger')
                             .html(`<ul> ${errorMessages} </ul>`)
                             .fadeIn();

                    /*  error: function(xhr) {
                         let errors = xhr.responseJSON.errors;
                         let errorMessage = 'fail to add data';
                         $.each(errors, function(key, value) {
                             errorMessage += value[0] + '\n';
                         });
                         alert(errorMessage); */
                     }

                 });
             });
         });
     </script>
 @endsection
