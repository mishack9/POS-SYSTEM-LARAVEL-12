<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //$data['getData'] = Member::orderBy('id', 'desc')->paginate(10);
        $getData = Member::orderBy('id', 'desc');

        if($request->id)
            {
              $getData = $getData->where('id', '=', $request->id);  
            }

        if($request->member_code)
        {
          $getData = $getData->where('member_code', '=', $request->member_code);
        }

        if($request->member_name)
        {
            $getData = $getData->where('member_name', 'like', '%'.$request->member_name.'%');
        }

        if($request->member_address)
        {
            $getData = $getData->where('member_address', 'like', '%'.$request->member_address.'%');
        }

        if($request->member_telephone)
        {
            $getData = $getData->where('member_telephone', 'like', '%'.$request->member_telephone.'%');
        }

        if($request->created_at)
        {
            $getData = $getData->where('created_at', 'like', '%'.$request->created_at.'%');
        }

        if($request->updated_at)
        {
            $getData = $getData->where('updated_at', 'like', '%'.$request->updated_at.'%');
        }

            $getData = $getData->paginate(10);
            $data['getData'] = $getData;

        return view('member.member_list', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('member.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
                 'member_name' => 'required|unique:members,member_name',
        ]);
      
        $save = Member::latest()->first() ?? new Member();
        $member_code = (int) $save->memeber_code +01;

        $save = new Member();

        $save->member_code = rand($member_code, 3378);
        $save->member_name = trim($request->member_name);
        $save->member_address = trim($request->member_address);
        $save->member_telephone = trim($request->member_telephone);

        $save->save();

        return redirect('admin/member/index')->with('success', 'New Member Added Successfully ...');

    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id, Member $member)
    {
        $data['getData'] = Member::find($id);
        return view('member.editmember', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $save = Member::find($id);

        $save->member_name = trim($request->member_name);
        $save->member_address = trim($request->member_address);
        $save->member_telephone = trim($request->member_telephone);

        $save->save();

        return redirect('admin/member/index')->with('success', 'Member Successfully Updated...');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, Member $member)
    {
        $delete = Member::find($id);
        $delete->delete();
        return redirect('admin/member/index')->with('success', 'Member Data Successfully Deleted...');
    }
}
