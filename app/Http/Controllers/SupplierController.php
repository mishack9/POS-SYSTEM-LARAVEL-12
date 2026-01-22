<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['getRecord'] = Supplier::getRecord();
        return view('supplier.supplier_indes', $data);
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

        $request->validate([
                'supplier_name' => 'string|required|unique:suppliers,supplier_name',
                'supplier_email' => 'email|string|required|unique:suppliers,supplier_email',
        ]);
        
        Supplier::insertData($request);

        return redirect('admin/supplier/index')->with(['success' => 'Supplier Record Created Successfully .....']); 

       // dd($request->all());

    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier, $id)
    {
        $data['getRecord'] = Supplier::getSingleRecord($id);
        return view('supplier.supplier_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        Supplier::updateData($request, $id);
        return redirect('admin/supplier/index')->with(['success' => 'Supplier Record Updated Successfully .....']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier, $id)
    {
        // echo  dd($id);
       $delete = Supplier::getSingleRecord($id);
       $delete->delete();
       Purchase::where('purchases.supplier_id', '=', $id)->delete();
       return redirect()->back()->with(['success' => 'Record Successfully Deleted.....']);
    }

}
