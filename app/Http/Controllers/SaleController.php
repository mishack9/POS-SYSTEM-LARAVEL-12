<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Sale;
use App\Models\SaleListDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
use Illuminate\Support\Facades\DB as FacadesDB;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $data['getMember'] = Member::get();
        $data['getUser'] = User::where('role', '=', 0)->get();

        $getData = Sale::select('sales.*', 'members.member_name', 'users.name')
        ->join('members', 'members.id', '=', 'sales.member_id')
        ->join('users', 'users.id', '=', 'sales.user_id');

        if($request->member_id)
        {
             $getData = $getData->where('members.member_name', 'like', '%'.$request->member_id.'%');
        }
        if($request->user_id)
        {
             $getData = $getData->where('users.name', 'like', '%'.$request->user_id.'%');
        }
        if($request->sale_title)
        {
             $getData = $getData->where('sales.sale_title', 'like', '%'.$request->sale_title.'%');
        }
        if($request->accepted)
        {
            $getData = $getData->where('sales.accepted', '=', $request->accepted);
        }
      
       $getData = $getData->paginate(10);
       $data['getData'] = $getData;

        return view('sales.sale_index', $data);
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
       // return $request->all();

       $sale = new Sale();
       
       $sale->member_id = trim($request->member_id);
       $sale->sale_title = trim($request->sale_title);
       $sale->slug = Str::slug($request->sale_title);
       $sale->total_items = trim($request->total_items);
       $sale->total_price = trim($request->total_price);
       $sale->discount = trim($request->discount);
       $sale->accepted = trim($request->accepted);
       $sale->user_id = trim($request->user_id);
       $sale->status = trim($request->has('status') ? 1 : 0);

       $sale->save();

       return redirect('admin/sales/index')->with(['success' => 'Sales Successfully Added...']);

    }

    /**
     * Display the specified resource.
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sale $sale, $slug)
    {
        $data['getMember'] = Member::get();
        $data['getUser'] = User::where('role', '=', 0)->get();
        $data['getRecord'] = Sale::where('slug',$slug)->firstOrFail();
        return view('sales.sale_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {

       $sale = Sale::where('slug', $slug)->firstOrFail();
         
       $sale->member_id = trim($request->member_id);
       $sale->sale_title = trim($request->sale_title);
       $sale->slug = Str::slug($request->sale_title);
       $sale->total_items = trim($request->total_items);
       $sale->total_price = trim($request->total_price);
       $sale->discount = trim($request->discount);
       $sale->accepted = trim($request->accepted);
       $sale->user_id = trim($request->user_id);
       $sale->status = trim($request->has('status') ? 1 : 0);

       $sale->save();

       return redirect('admin/sales/index')->with(['success' => 'Sales Successfully Updated...']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, Sale $sale)
    {
        Sale::find($id)->delete();
        SaleListDetail::where('sale_list_details.sales_id', '=', $id)->delete();
         return redirect('admin/sales/index')->with(['success' => 'Sales Record Successfully Deleted...']);
    }

    public function delete_all()
    {
        Sale::truncate();
        SaleListDetail::truncate();
        return redirect('admin/sales/index')->with(['success' => 'Table truncate successfully...']);
    }

}
