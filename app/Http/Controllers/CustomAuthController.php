<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;
use Session;




class CustomAuthController extends Controller
{
    public function home()
    {
        return view('welcome');
    }
    public function login()
    {
        return view('auth.login');
    }
    public function registration()
    {
        return view('auth.registration');
    }
    public function registeruser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:12'
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password =Hash::make($request->password);
       // Hash::make($request->password);
        $res = $user->save();
        if($res)
        {
            return back()->with('success','You have registered successfully');
        }
        else{
            return back()->with('fail','something went wrong');
        }
        
    }

    // public function loginuser_test(Request $request)
    // {
    //     $request->validate([
    //         // 'name' => 'required',
    //         'email' => 'required|email',
    //         'password' => 'required|min:5|max:12'
    //     ]);

    //     $quqry='email="ranjan21061@gmail.com" and password="12345"';

    //     if (Auth::attempt(array($quqry))){
    //         return "success";
    //     }else{
    //         return "Wrong Credentials";
    //     }
    //     die;
    // }
    


    public function loginuser(Request $request)
    {
        $request->validate([
            // 'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:5|max:12'
        ]);
        // echo "<pre>";
        // print_r($request->all());
        // exit;
        $users = User::where('email', '=', $request->email)->first();
        
        if($users){            
           if(Hash::check($request->password,$users->password)){

            // if (Auth::attempt(array('email' => $request->email, 'password' => $request->password))){
                    $request = session()->put('loginId',$users->id);
                    //  Auth::User()->role_id;
                     return redirect ('dashboard');
            }else{
                // return back()->with('fail','password not matches');
                return back()->with('fail','Invalid Credentials');
            }
        }else{
            return back()->with('fail','This email is not registered.');
        }
    }
    public function dashboard()
    {
        $data = array();
        if(session::has('loginId')){
            $data = User::where('id', '=',session::get('loginId'))->first();
        }
        return view('dashboard', compact('data'));
    }
    public function logout()
    {
       if(session::has('loginId')){
            session::pull('loginId');
            return redirect('/');
       }
    }

}
