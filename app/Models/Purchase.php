<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Model;

use Request;

class Purchase extends Model
{
    protected $table = 'purchases';


    //fetch purchase data and display on table by passing method /function to controller
    static public function getData()
    {

        $return = self::select('purchases.*', 'suppliers.supplier_name')
                  ->join('suppliers', 'purchases.supplier_id', '=', 'suppliers.id')
                  ->orderBy('id', 'asc');

                  if(!empty(Request::get('supplier_id')))
                  {
                    $return = $return->where('suppliers.supplier_name', 'like', '%'.Request::get('supplier_id').'%');
                  }

                  if(!empty(Request::get('purchase_title')))
                  {
                    $return = $return->where('purchases.purchase_title', 'like', '%'.Request::get('purchase_title').'%');
                  }

                  if(!empty(Request::get('total_price')))
                  {
                    $return = $return->where('purchases.total_price', 'like', '%'.Request::get('total_price').'%');
                  }


        $return = $return->paginate(10);

        return $return;

    }

    //fetch single record to delete
    static public function getSingleRecord($id)
    {
        return self::find($id);
    }

    //update single data on form for editing by passing controller function
/*      static public function updateData($request, $id)
    {
        try {

        return self::getSingleRecord($id);

        $save->id = $request->id;
        $save->purchase_title = trim($request->purchase_title);
        $save->supplier_id = trim($request->supplier_id);
        $save->total_items = trim($request->total_items);
        $save->total_price = trim($request->total_price);
        $save->discount = trim($request->discount);
        $save->status = trim($request->status) == true ? 1 : 0;

        $save->save();

        } catch (Exception $e){
            \Log::error("Error While Updating Record:" .$e->getMessage());
            throw $e;
        }

    } */

    
        static public function purchase_count()
        {
          return self::count();
        }
 
}
