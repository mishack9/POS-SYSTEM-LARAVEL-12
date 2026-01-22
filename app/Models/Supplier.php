<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Stmt\TryCatch;
/* use Symfony\Component\HttpFoundation\Request; */
use Request;

class Supplier extends Model
{
    protected $table = 'suppliers';

    //fetching suppliers data using modal passing function to controller
    static public function getRecord()
    {
        //return self::get();
        $return = self::select('suppliers.*');

        //filter id method
        if(!empty(Request::get('id')))
        {
                   $return = $return->where('id', '=', Request::get('id'));
        }
        //filter name method
        if(!empty(Request::get('supplier_name')))
        {
            $return = $return->where('supplier_name', 'like', '%'.Request::get('supplier_name').'%');
        }
        //filter email method
        if(!empty(Request::get('supplier_email')))
        {
            $return = $return->where('supplier_email', 'like', '%'.Request::get('supplier_email').'%');
        }
        //filter email method
        if(!empty(Request::get('created_at')))
        {
            $return = $return->where('created_at', 'like', '%'.Request::get('created_at').'%');
        }


        $return = $return->orderBy('id', 'asc')
            ->paginate(10);

        return $return;
    }

    //delete supplier record by id passing function to controller
    static public function getSingleRecord($id)
    {
        return self::find($id);
    }


    //insert supplier data using model passing function to controller
    static public function insertData($request)
    {
        try {
            //code...
            $save = self::latest()->first() ?? new self();
            $supplier_code = (int) $save->supplier_code +01;
            $save = new self();
            $save->supplier_code = rand($supplier_code, 1234);
            $save->supplier_name = trim($request->supplier_name);
            $save->supplier_email = trim($request->supplier_email);
            $save->supplier_telephone = trim($request->supplier_telephone);
            $save->supplier_address = trim($request->supplier_address);
            $save->save();
        } catch (Exception $e) {
            //throw $e;
            \Log::error("Error While Saving Record:" .$e->getMessage());
            throw $e;
        }
    }


    //update record using model and passing function to controller
    static public function updateData($request, $id)
    {

        try{

            $save = self::getSingleRecord($id);
            $save->supplier_name = trim($request->supplier_name);
            $save->supplier_email = trim($request->supplier_email);
            $save->supplier_telephone = trim($request->supplier_telephone);
            $save->supplier_address = trim($request->supplier_address);
            $save->save();

        } catch (Exception $e) {
            //throw $e;
            \Log::error("Error While Updating Record:" .$e->getMessage());
            throw $e;

        }

    }


    static public function supplier_count()
    {
        return self::count();
    }


}
