<?php

namespace App\Http\Controllers;

use App\Models\User;
//use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MyaccountController extends Controller
{
    public function index(Request $request)
    {
        $user_id = Auth::user()->id;
        $user = User::where('id', '=', $user_id)->first();

        //decide image
         if($user && $user->image && Storage::disk('public')->exists($user->image)){
            $imageUrl = Storage::url($user->image);
         } else {
            $imageUrl = asset('upload/5601.jpg');
         }


        return view('account.account_view', compact('user', 'imageUrl'));
    }

    //update
    public function update(Request $request)
    {
        //return $request->all();
        $user = Request()->validate([
            'name' => 'required|string:200',
             'email' => 'required|unique:users,email,' .Auth::user()->id,
             'image' => 'nullable|image|mimes:png,jpg,webp,jpeg|max:2048',
        ]);

        $user = User::find(Auth::user()->id);

        $user->name = trim($request->name);
        $user->email = trim($request->email);

        //image logic
        /* if(!empty($request->file('image')))
            {
                if(!empty($user->image) && file_exists('upload/'.$user->image))
                    {
                        unlink('upload/'.$user->image);
                    }
                $file = $request->file('image');
                $randStr = Str::random(30);
                $filename = $randStr .'.'.$file->getClientOriginalExtension();
                $file->move('upload/',$filename);
                $user->image = $filename;
            } */

                if($request->hasFile('image'))
                    {
                        //delete old image
                        if($user->image && Storage::disk('public')->exists($user->image)){
                            Storage::disk('public')->delete($user->image);

                    }
                    //store the image
                    $path = $request->file('image')->store('users', 'public');
                    //save relative path
                    $user->image = $path;
                    }

        $user->save();
        $user->refresh();

        return redirect()->back()->with(['success' => 'Account Successfully Updated....']);

    }

    //change password view form
    public function password_index()
    {
        return view('account.password_change');
    }


    //change passwowrd store/save
    public function change_password(Request $request)
    {
        $request->validate([
            'old_password' => ['required'],
            'password' => ['required', 'confirmed', Rules\Password::defaults(), Password::min(8)->mixedCase()->numbers()->symbols()->uncompromised()]
            ]);
       // return $request->all();
       $user_id = Auth::user()->id;
       $user = User::find($user_id);
       if(trim($request->password) == trim($request->confirm_password))
        {
           if(Hash::check($request->old_password, $user->password))
            {
                $user->password = Hash::make($request->password);
                $user->save();
                return redirect()->back()->with(['success' => 'Password Successfully Changed....']);

            } else {
                return redirect()->back()->with(['error' => 'Wrong Password ....']);
            }
        } else {
            return redirect()->back()->with(['error' => 'New Password And Old Password Not Matched....']);
        }
    }
}
