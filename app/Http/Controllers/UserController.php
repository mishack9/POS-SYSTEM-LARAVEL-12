<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function index()
    {
        $data['user_data'] = User::user_data();
        return view('user.user_index', $data);
    }

    //create user form
    public function create(Request $request)
    {
        return view('user.user_add');
    }


    //store user
    public function store(Request $request)
    {
        // Make a random user 
     /*   $request = [
        trim("User user2"),
        "user2@gmail.com",
         Hash::make("123456789"),
        ];
        return $request;
        die();  */

          $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults(), Password::min(8)->mixedCase()->numbers()->symbols()->uncompromised()],
        ]
    );

    $user = new User();

    $user->name = trim($request->name);
    $user->email = trim($request->email);
    $user->password = trim(Hash::make($request->password));

    $user->save();

    return redirect('admin/user/manage')->with(['success' => 'New User Added Successfully.....']);

    }

    //update user
    public function update(Request $request, $id)
    {

    $request->validate([
           'name' => 'required|string',
           'email' => 'required|email|unique:users,email',
    ]);

       $user_id = $id;
       $user = User::find($user_id);

       $user->name = trim($request->name);
       $user ->email = trim($request->email);

     $user->save();
     return redirect()->back()->with(['success' => 'updated Successfully......']);

    }


    //edit user form
    public function edit($id)
    {
        $user['user_Data'] = User::find($id);
        return view('user.user_edit', $user);
    }

    //soft delete user data
    public function destroy($id)
    {

        $delete = User::find($id);
        $delete->is_delete = 1;
        $delete->save();

        return redirect()->back()->with(['success' => 'User data successfully deleted...']);

    }
}
