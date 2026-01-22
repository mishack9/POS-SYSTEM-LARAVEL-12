<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\PurchaseDetail;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $getRecord = Supplier::get();
        $getData = Purchase::getData();
        return view('purchase.purchase_index', compact(['getRecord', 'getData']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $save = new Purchase();

        $save->purchase_title = trim($request->purchase_title);
        $save->supplier_id = trim($request->supplier_id);
        $save->slug = Str::slug($request->purchase_title);
        $save->total_items = trim($request->total_items);
        $save->total_price = trim($request->total_price);
        $save->discount = trim($request->discount);
        $save->status = trim($request->status) == true ? 1 : 0;

        $save->save();

        return redirect('admin/purchase/index')->with(['success' => 'Purchase data saved successfully....']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Purchase $purchase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Purchase $purchase, $id)
    {
        $data['getRecord'] = Supplier::get();
        $data['getRecordValue'] = Purchase::where('id', $id)->firstOrFail(); 
        return view('purchase.purchase_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {
       /*  dd($request->all());
        die; */
        $save = Purchase::where('id', $id)->firstOrFail();

        $save->purchase_title = trim($request->purchase_title);
        $save->supplier_id = trim($request->supplier_id);
        $save->total_items = trim($request->total_items);
        $save->total_price = trim($request->total_price);
        $save->discount = trim($request->discount);
        $save->status = trim($request->status) == true ? 1 : 0;

        $save->save();

        return redirect('admin/purchase/index')->with(['success' => 'Updated Successfully....']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Purchase $purchase, $id)
    {
        $delete = Purchase::getSingleRecord($id);
        $delete->delete();

        PurchaseDetail::where('purchase_details.purchase_id', '=', $id)->delete();

        return redirect()->back()->with(['success' => 'Record Successfully Deleted...']);
    }

    public function truncate()
    {

      Purchase::truncate();
      PurchaseDetail::truncate();

      return redirect()->back()->with(['success' => 'All table droped successfully...']);

    }

}
