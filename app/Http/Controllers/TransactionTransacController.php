<?php

namespace App\Http\Controllers;

use App\Models\Transaction_Transac;
use Illuminate\Http\Request;

class TransactionTransacController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $getRecord = Transaction_Transac::
        select('transaction__transacs.*', 'users.name')
        ->join('users', 'users.id', '=', 'transaction__transacs.user_id');


        //filter transaction start
            if($request->id)
            {
                $getRecord = $getRecord->where('transaction__transacs.id', '=', $request->id);
            }
             if($request->name)
            {
                $getRecord = $getRecord->where('users.name', 'like', '%'.$request->name.'%');
            }
             if($request->amount)
            {
                $getRecord = $getRecord->where('transaction__transacs.amount', 'like', '%'.$request->amount.'%');
            }
             if($request->created_at)
            {
                $getRecord = $getRecord->where('transaction__transacs.created_at', 'like', '%'.$request->created_at.'%');
            }
        //filter transaction end


                $getRecord = $getRecord->paginate(10);                                          
                                                          

        $data['getRecord'] = $getRecord;
        return view('transaction.adminTransac_index', $data);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction_Transac $transaction_Transac)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction_Transac $transaction_Transac)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction_Transac $transaction_Transac)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction_Transac $transaction_Transac)
    {
        //
    }

     //admin change payment status
    public function status_change(Request $request)
    {
        $change = Transaction_Transac::find($request->order_id);
        $change->payment_status = $request->status_id;
        $change->save();
        $json['success'] = true;
        echo json_encode($json);
    }
}
