<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //this return  the login view page.......
    public function login()
    {
        return view('auth.login');
    }

    //post loginvalidation
    public function login_post(Request $request)
    {
        
        // Make a random user 
       /*  $request = [
        trim("Adminadab Shioty"),
        "adminadab@gmail.com",
         Hash::make("123456789"),
        ];
        return $request;
        die(); */

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], true)) {

            if (Auth::User()->role == "1") {
                return redirect()->intended('dashboard/admin_list');
            } 
            else if 
            (Auth::User()->role == "0") {
                return redirect()->intended('dashboard/user_list');
            }
             else
            {
                return redirect('/')->with('error', 'The Email You Entered Is Not Valid....');
            }
        }
         else
        {
            return redirect()->back()->with('error', 'Invalid Login Credentails.....');
        }
    }

    //logout function
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
