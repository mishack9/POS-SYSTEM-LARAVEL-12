<?php

namespace App\Http\Controllers;

use App\Models\Transaction_Transac;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {

        $user_id = Auth::user()->id;
        $data['user_Record'] = User::find($user_id);

        /* return $data['user_Record']; */

        return view('transaction.transaction_list', $data);
    }


    //transaction for admin/user role = 0 fetch and display on form
    public function create($id)
    {
       $data['user_Record'] = User::find($id);
       return view('transaction.transaction_wallet_add', $data); 
    }

    //store/save wallet
    public function store_create($id, Request $request)
    {

    /*     return $request->all();
        die; */

        $update_wallet = User::find($id);
        
        $add = $request->wallet + $update_wallet->wallet;
        $update_wallet->wallet = trim($add);
        $update_wallet->save();

        return redirect('user/transaction/index')->with(['success' => 'Wallet Record Updated.....']);
    }

    //view trasaction by auth user role = 0
    public function transac_list(Request $request)
    {
        $user_id = Auth::user()->id;
        $getRecord = Transaction_Transac::select('transaction__transacs.*');
        
        //filter transaction start
            if($request->id)
            {
                $getRecord = $getRecord->where('transaction__transacs.id', '=', $request->id);
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
        
        $getRecord = $getRecord->where('user_id', '=', $user_id)->paginate(10);

        $data['getRecord'] = $getRecord;
        return view('transaction.transaction_view', $data);
    }


    //submit transaction
    public function submit_transaction(Request $request)
    {
        $user_id = Auth::user()->id;

        $getWallet = User::where('id', '=', $user_id)->first();

        if($getWallet->wallet >= $request->amount)
        {
            User::where('id', $user_id)->update([              
                'wallet' => $getWallet->wallet - $request->amount,
            ]);
            
            $save = new Transaction_Transac;
            $save->user_id = $user_id;
            $save->amount = $request->amount;
            $save->save();

             return redirect('user/list/transaction')->with('success', 'Transaction successfull...');

        } else {
            
                 return redirect('user/list/transaction')->with('error', 'Insufficint wallet balance...');

        }
    }

}
