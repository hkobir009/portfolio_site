<?php

namespace App\Http\Controllers;
use App\Models\adminModel;
use Illuminate\Http\Request;

class loginController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function registration(){
        return view('auth.registration');
    }

    public function onlogin(Request $request){

        $email = $request->input('email');
        $pass = $request->input('pass');
        $count_value = adminModel::where('email','=',$email)->where('password','=',$pass)->count();

        if($count_value==1){
            $request->session()->put('user',$email);
            return 1;
        }else{
            return 0;
        }

    }


    public function onlogout(Request $request){

        $request->session()->flush();
        return redirect('/login');
    }

    public function onregistration(Request $request){

        $user_info = new adminModel;
        $user_info->user_name = $request->input('user_name');
        $user_info->name = $request->input('name');
        $user_info->email = $request->input('email');
        $user_info->password = $request->input('password');
        $result = $user_info->save();
        if($result==true){
            return 1;
        }else{
            return 0;
        }
    }

}
