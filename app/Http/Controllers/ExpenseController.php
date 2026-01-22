<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['getRecord'] = Expense::getRecord();
        return view('expense.index_list', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('expense.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         Expense::insertData($request);
         return redirect('admin/expense/index')->with(['success' => 'Expense data added successfully....']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Expense $expense, $id)
    {
        $data['getRecord'] = Expense::getSingleRecord($id);
        return view('expense.editExpense', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        

        Expense::updateRecord($request, $id);
        return redirect('admin/expense/index')->with(['success' => 'Expense updated successfully...']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expense $expense, $id)
    {
        $delete = Expense::getSingleRecord($id);
        $delete->delete();
        return redirect()->back()->with(['success' => 'Record Successfully Deleted.....']);
    }
}
