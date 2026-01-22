<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Purchase;
use App\Models\Sale;
use App\Models\Supplier;
use App\Models\Transaction_Transac;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
/* use Illuminate\Support\Facades\Auth; */

class DashboardController extends Controller
{
    //controller to manage user by role for redirection
    public function dashboard(Request $request)
    {
        if(Auth::user()->role == 1)
        {

            //controller to display product using bar chart
           /*  $products = Product::select("product_name", "selling_price")->get();

            $chartData = [
                
                  'categories' => $products->pluck('product_name')->toArray(),
                  
                  'data' => $products->pluck('selling_price')->toArray(),

            ]; */

            $product_count = Product::count();
            $sale_count = Sale::sale_count();
            $purchase_count = Purchase::purchase_count();
            $supplier_count = Supplier::supplier_count();
            $wallet_total = User::sum('wallet');

            return view('dashboard.admin_list', [/* 'chartData' => $chartData */
                                                  'product_count' => $product_count, 'sale_count' => $sale_count,
                                                  'purchase_count' => $purchase_count, 'supplier_count' => $supplier_count,
                                                  'wallet_total' => $wallet_total]);
        } 
        elseif(Auth::user()->role == 0)
        {

            $user_id = Auth::user()->id;
            $data['pending_payment'] = Transaction_Transac::where('user_id', '=', $user_id)
            ->where('payment_status', '=', 0)->sum('amount');
             $data['completed_payment'] = Transaction_Transac::where('user_id', '=', $user_id)
            ->where('payment_status', '=', 1)->sum('amount');
            $data['user_data'] = User::find($user_id);
            
            return view('dashboard.user_list', $data);

        }
    }
}
