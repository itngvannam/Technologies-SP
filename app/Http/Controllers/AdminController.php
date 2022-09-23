<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    public function loginAdmin(){
        // dd(bcrypt('123123'));
        if (auth()-> check()) {
            return redirect() ->to(path:'home');
            # code...
        }
        return view(view:'login');
    }
    public function PostLoginAdmin(Request $request)
    
    {
        // dd($request ->has('remember_me'));
        $remember = $request->has ('remember_me')?true :false;
        if(auth()-> attempt([
            'email' => $request->email,
            'password'=>$request->password
        ], $remember)){
            return redirect( )-> to (path:'home');
        }
    }
}
