<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartegoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MyaccountController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\PurchaseDetailController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SaleListDetailController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransactionTransacController;
use App\Http\Controllers\UserController;

Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('login_post', [AuthController::class, 'login_post']);

//route group middleware admin
Route::group(['middleware' => 'admin'], function()
{
      Route::get('dashboard/admin_list', [DashboardController::class, 'dashboard'])/* ->name('admin_dashboard') */;
      Route::get('admin/category', [CartegoryController::class, 'index'])/* ->name('cartegory') */;
      Route::get('admin/catergory/data', [CartegoryController::class, 'cartegory_data']);

      //cartegory add / store
      Route::post('admin/cartegory/store', [CartegoryController::class, 'store']);

      //Edit and Update cartegory route
       Route::get('admin/cartegory/edit/{slug}', [CartegoryController::class, 'edit']);
       Route::post('admin/cartegory/update/{slug}', [CartegoryController::class, 'update']);

       //delete cartegory
        Route::delete('admin/cartegory/delete/{id}', [CartegoryController::class, 'destroy']);

        //view specific category
        Route::get('admin/category/view/{slug}', [CartegoryController::class, 'view']);

        //products routes/view page
        Route::get('admin/product/index', [ProductController::class, 'index']);

        //store product route
        Route::post('admin/product/store', [ProductController::class, 'store'])->name('product.store');
        //display product in table route
        Route::get('admin/product/show', [ProductController::class, 'fetchProduct'])->name('product.fetch');
        //edit product route
        Route::get('admin/product/edit/{slug}', [ProductController::class, 'edit']);
        //update product route
        Route::post('admin/product/update/{slug}', [ProductController::class, 'update']);
        //delete product route
        Route::delete('admin/product/delete/{id}', [ProductController::class, 'destroy']);
        //view specific product route
        Route::get('admin/product/view/{slug}', [ProductController::class, 'show']); 



        //Memeber route for crud operation
         Route::get('admin/member/index', [MemberController::class, 'index']);
         Route::get('admin/member/add', [MemberController::class, 'create'])->name('admin.addMember');
         Route::post('admin/member/store', [MemberController::class, 'store'])->name('admin.memberStore');
         Route::get('admin/member/edit/{id}', [MemberController::class, 'edit']);
         Route::post('admin/memberUpdate/{id}', [MemberController::class, 'update']);
         Route::get('admin/member/delete/{id}', [MemberController::class, 'destroy']);


         //Supplier Route for crud operation
         Route::get('admin/supplier/index', [SupplierController::class, 'index']);
         //supplier data store route
        Route::post('admin/supplier/store', [SupplierController::class, 'store'])->name('admin.supplierStore');
        //edit supplier route
        Route::get('admin/supplier/edit/{id}', [SupplierController::class, 'edit']);
        //update route form for supplier
        Route::post('admin/supplierUpdate/{id}', [SupplierController::class, 'update']);
        //supplier route for delete
        Route::get('admin/supplier/delete/{id}', [SupplierController::class, 'destroy']);


        //Expenses route for crud operation
        Route::get('admin/expense/index', [ExpenseController::class, 'index']);
        Route::get('admin/expense/add', [ExpenseController::class, 'create'])->name('admin.addExpense');
        Route::post('admin/expense/store', [ExpenseController::class, 'store'])->name('admin.expenseStore');
        Route::get('admin/expense/edit/{id}', [ExpenseController::class, 'edit']);
        Route::get('admin/expense/delete/{id}', [ExpenseController::class, 'destroy']);
        Route::post('admin/expenseUpdate/{id}', [ExpenseController::class, 'update']);


        //Purchase route for crud operation and so on
        Route::get('admin/purchase/index', [PurchaseController::class, 'index']);
        Route::post('admin/purchase/store', [PurchaseController::class, 'store'])->name('admin.purchaseStore');
        Route::get('admin/purchase/edit/{id}', [PurchaseController::class, 'edit']);
        Route::post('admin/purchase/update/{id}', [PurchaseController::class, 'update']);
        Route::get('admin/puchase/delete/{id}', [PurchaseController::class, 'destroy']);
        Route::get('admin/purchase/truncate_all', [PurchaseController::class, 'truncate']);


        //purchase detail 
        Route::get('admin/puchase/detail/{id}', [PurchaseDetailController::class, 'index']);
        Route::get('admin/purchase/detail/add/{id}', [PurchaseDetailController::class, 'create']);
        Route::post('admin.purchase/detail/store/{id}', [PurchaseDetailController::class, 'store']);
        Route::get('admin/exppurcha/detail/edit/{id}', [PurchaseDetailController::class, 'edit']);
        Route::post('admin/purchase/detail/edit/{id}', [PurchaseDetailController::class, 'update']);
        Route::get('admin/purchases/detail/delete/{id}', [PurchaseDetailController::class, 'destroy']);



        //Sales route for crud operation and so on
        Route::get('admin/sales/index', [SaleController::class, 'index']);
        Route::post('admin/sale/store', [SaleController::class, 'store'])->name('admin.saleStore');
        Route::get('admin/sale/edit/{slug}', [SaleController::class, 'edit']);
        Route::post('admin/sale/update/{slug}', [SaleController::class, 'update']);
        Route::get('admin/sale/delete/{slug}', [SaleController::class, 'destroy']);
        Route::get('admin/sales/truncate_all', [SaleController::class, 'delete_all']);


        //sales list detail route{sub_sales}
        Route::get('admin/sale/detail/{id}', [SaleListDetailController::class, 'index']);
        Route::get('admin/sales/detail/add/{id}', [SaleListDetailController::class, 'create']);
        Route::post('admin/sales/detail/store/{id}', [SaleListDetailController::class, 'store']);
        Route::get('admin/sales/detail/edit/{id}', [SaleListDetailController::class, 'edit']);
        Route::post('admin/sale/detail/edit/{id}', [SaleListDetailController::class, 'update']);
        Route::get('admin/sales/detail/delete/{id}', [SaleListDetailController::class, 'destroy']);


        //route admin fetch user
        Route::get('admin/user/manage', [UserController::class, 'index']);
        Route::get('admin/user/edit/{id}', [UserController::class, 'edit']);
        Route::post('admin/user/update/{id}', [UserController::class, 'update']);
        Route::get('admin/user/delete/{id}', [UserController::class, 'destroy']);
        Route::get('admin/user/add', [UserController::class, 'create'])->name('admin.addUser');
        Route::post('admin/user/store', [UserController::class, 'store'])->name('admin.userStore');


        //transaction admin
        Route::get('admin/transaction/index', [TransactionTransacController::class, 'index']);
        Route::get('admin/transaction/index_status', [TransactionTransacController::class, 'status_change']);

});

//route group middleware user
Route::group(['middleware' => 'user'], function()
{
      Route::get('dashboard/user_list', [DashboardController::class, 'dashboard']);


      //user transaction
      Route::get('user/transaction/index', [TransactionController::class, 'index']);
      Route::get('user/transaction/store/{id}', [TransactionController::class, 'create']);
      Route::post('user/wallet/store/{id}', [TransactionController::class, 'store_create']);

      //trasaction list view by auth user
      Route::get('user/list/transaction', [TransactionController::class, 'transac_list']);
      Route::post('user/submit/transaction', [TransactionController::class, 'submit_transaction'])->name('userSubmit.transaction');

      //user account detail
      Route::get('user/myaccount/account', [MyaccountController::class, 'index']);
      Route::post('user/myaccount/update', [MyaccountController::class, 'update'])->name('user.userUpdate');

      //change password 
      Route::get('user/account/password', [MyaccountController::class, 'password_index']);
      Route::post('user/password/change', [MyaccountController::class, 'change_password'])->name('user.user.passwordUpdate');

});

//logout route
Route::get('logout', [AuthController::class, 'logout'])->name('logout');