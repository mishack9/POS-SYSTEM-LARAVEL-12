<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Purchase;
use App\Models\PurchaseDetail;
use Illuminate\Http\Request;

class PurchaseDetailController extends Controller
{
    /**
     * Display a listing of the resource. from purchase by id to view
     */
    public function index($id, Request $request)
    {
        
       $data['purchase_id'] = $id;
       /* $data['getPurchase'] = PurchaseDetail::select('purchase_details.*', 'products.product_name')
       ->join('products', 'products.id', '=', 'purchase_details.product_id')       
       ->where('purchase_details.purchase_id', '=', $id)->paginate(10); */

     $getPurchase = PurchaseDetail::select('purchase_details.*', 'products.product_name');
     $getPurchase = $getPurchase->join('products', 'products.id', '=', 'purchase_details.product_id');

     //search start

       if($request->amount)
         {
            $getPurchase = $getPurchase->where('purchase_details.amount', 'like', '%'.$request->amount.'%');
         }

         if($request->product_id)
         {
            $getPurchase = $getPurchase->where('products.product_name', 'like', '%'.$request->product_id.'%');
         }

         if($request->created_at)
         {
            $getPurchase = $getPurchase->where('purchase_details.created_at', 'like', '%'.$request->created_at.'%');
         }

         if($request->updated_at)
         {
            $getPurchase = $getPurchase->where('purchase_details.updated_at', 'like', '%'.$request->updated_at.'%');
         }

         if($request->status)
         {
            $getPurchase = $getPurchase->where('purchase_details.status', '=', $request->status);
         }

     //search end

     $getPurchase = $getPurchase->where('purchase_details.purchase_id', '=', $id)->paginate(10);
     $data['getPurchase'] = $getPurchase;

       return view('purchase.purchase_view_detail', $data); 

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $data['getProduct'] = Product::get();
        $data['purchase_id'] = $id;
       return view('purchase.purchase_view_add', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());die;

        $save = new PurchaseDetail;

        $save->purchase_id = trim($request->purchase_id);
        $save->product_id = trim($request->product_id);
        $save->purchase_price = trim($request->purchase_price);
        $save->sub_total = trim($request->sub_total);
        $save->amount = trim($request->amount);
        $save->status = trim($request->has('status') == true ? 1 : 0);

        $save->save();

        return redirect('admin/puchase/detail/'.$request->purchase_id)->with(['success' => 'Record Successfully Create....']);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(PurchaseDetail $purchaseDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PurchaseDetail $purchaseDetail, $id)
    {
        $data['getDetail'] = PurchaseDetail::find($id);
        $data['product'] = product::get();
        return view('purchase.purchase_view_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //dd($id);die;
        $save = PurchaseDetail::find($id);

        //$save->purchase_id = trim($request->purchase_id);
        $save->product_id = trim($request->product_id);
        $save->purchase_price = trim($request->purchase_price);
        $save->sub_total = trim($request->sub_total);
        $save->amount = trim($request->amount);
        $save->status = trim($request->has('status') == true ? 1 : 0);

        $save->save();

        return redirect('admin/puchase/detail/'.$request->purchase_id)->with(['success' => 'Record Successfully Updated....']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PurchaseDetail $purchaseDetail, $id)
    {
        PurchaseDetail::find($id)->delete();
        return redirect()->back()->with(['success' => 'Record Successfully Deleted']);
    }
}
