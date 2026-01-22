<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\SaleListDetail;
use Illuminate\Http\Request;

class SaleListDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id, Request $request)
    {
        $data['sales_id'] = $id;

        /* $data['getSale'] = SaleListDetail::select('sale_list_details.*', 'products.product_name')
       ->join('products', 'products.id', '=', 'sale_list_details.product_id')       
       ->where('sale_list_details.sales_id', '=', $id)->paginate(10); */

        $getSale = SaleListDetail::select('sale_list_details.*', 'products.product_name');
        $getSale = $getSale->join('products', 'products.id', '=', 'sale_list_details.product_id');

        /* search filter start */
             if($request->selling_price)
             {
                    $getSale = $getSale->where('sale_list_details.selling_price', 'like', '%'.$request->selling_price.'%');
             }
             if($request->product_id)
             {
                    $getSale = $getSale->where('products.product_name', 'like', '%'.$request->product_id.'%');
             }
              if($request->amount)
             {
                    $getSale = $getSale->where('sale_list_details.amount', 'like', '%'.$request->amount.'%');
             }
              if($request->discount)
             {
                    $getSale = $getSale->where('sale_list_details.discount', 'like', '%'.$request->discount.'%');
             }
              if($request->sub_total)
             {
                    $getSale = $getSale->where('sale_list_details.sub_total', 'like', '%'.$request->sub_total.'%');
             }
             if($request->created_at)
             {
                    $getSale = $getSale->where('sale_list_details.created_at', 'like', '%'.$request->created_at.'%');
             }
             if($request->updated_at)
             {
                    $getSale = $getSale->where('sale_list_details.updated_at', 'like', '%'.$request->updated_at.'%');
             }
        /* search filter end */

        $getSale = $getSale->where('sale_list_details.sales_id', '=', $id)->paginate(10);

        $data['getSale'] = $getSale;

        return view('sales.sale_index_detail', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $data['sales_id'] = $id;
        $data['getProduct'] = Product::get();
        return view('sales.sale_index_detail_add', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'product_id' => 'unique:sale_list_details,product_id'
            ]);

        //return $request->all();
        $save = new SaleListDetail();

        $save->sales_id = trim($request->sales_id);
        $save->product_id = trim($request->product_id);
        $save->selling_price = trim($request->selling_price);
        $save->amount = trim($request->amount);
        $save->discount = trim($request->discount);
        $save->sub_total = trim($request->sub_total);

        $save->save();

        return redirect('admin/sale/detail/' .$request->sales_id)->with(['success' => 'Sales Detail Added Successfully...']);
    }

    /**
     * Display the specified resource.
     */
    public function show(SaleListDetail $saleListDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SaleListDetail $saleListDetail, $id)
    {
        
        $data['getProduct'] = Product::get();
        $data['getDetail'] = SaleListDetail::find($id);
        return view('sales.sale_detail_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //return $request->all();
        $save = SaleListDetail::find($id);

        //$save->sales_id = trim($request->sales_id);
        $save->product_id = trim($request->product_id);
        $save->selling_price = trim($request->selling_price);
        $save->amount = trim($request->amount);
        $save->discount = trim($request->discount);
        $save->sub_total = trim($request->sub_total);

        $save->save();

        return redirect('admin/sale/detail/' .$request->sales_id)->with('success', 'Sales Detail Updated Successfully...');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SaleListDetail $saleListDetail, $id)
    {
        SaleListDetail::find($id)->delete();
        return redirect()->back()->with(['success' => 'Record Successfully Deleted...']);
    }
}
