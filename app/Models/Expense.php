<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Model;
/* use Symfony\Component\HttpFoundation\Request; */

use Request;

class Expense extends Model
{
    protected $table = 'expenses';


    //add data using model by passing function into controller
    static public function insertData($request)
    {
        try {

            $save = new self();

            $save->expense_title = $request->expense_title;
            $save->expense_price = $request->expense_price;
            $save->expense_description = $request->expense_description;

            $save->save();

        } catch(Exception $e) {
            \Log::error("Failed while saving record:" .$e->getMessage());
            throw $e;
        }
    }


    //fetch data to display using model and passing function into controller
    static public function getRecord()
    {
       // return self::get();

       $return = self::select('expenses.*');


              //make search filter function
       if(!empty(Request::get('id')))
       {
        $return = $return->where('id', '=', Request::get('id'));
       }

       if(!empty(Request::get('expense_title')))
       {
        $return = $return->where('expense_title', 'like', '%'.Request::get('expense_title').'%');
       }

       if(!empty(Request::get('created_at')))
       {
        $return = $return->where('created_at', 'like', '%'.Request::get('created_at').'%');
       }

       if(!empty(Request::get('updated_at')))
       {
        $return = $return->where('updated_at', 'like', '%'.Request::get('updated_at').'%');
       }

       
       $return = $return->orderBy('id', 'asc')->paginate(10);



       return $return;

    }

    //delete record by passing function to controller handlling deleteby single data
    static public function getSingleRecord($id)
    {
        return self::find($id);
    }


    //update data using model and assing to controller
    static public function updateRecord($request, $id)
    {
        $save = self::getSingleRecord($id);

         $save->expense_title = $request->expense_title;
         $save->expense_price = $request->expense_price;
         $save->expense_description = $request->expense_description;

         $save->save();

        try {

        } catch(Exception $e) {
            \Log::error("Error while updating record ... please try again...:" .$e->getMessage());
            throw $e;
        }

    }

}
