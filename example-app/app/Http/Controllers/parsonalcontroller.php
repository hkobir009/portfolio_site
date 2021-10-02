<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\parsonalinfomodel;

class parsonalcontroller extends Controller
{
   
    function getParsonalData(){
        $parsonalData = json_decode(parsonalinfomodel::all());
        return $parsonalData;
    }

    function deleteParsonalData(Request $req){
        $id = $req->input('id');
        $result=parsonalinfomodel::where('id','=',$id)->delete();
        if ($result==true) {
            return 1;
        }
        else{
            return 0;
        }

    }

    function detailsParsonalData(Request $req){
        $id = $req->input('id');
        $parsonaldata=parsonalinfomodel::where('id','=',$id)->get();
        return $parsonaldata;

    }


    function updateParsonalData(Request $req){
        $id = $req->input('id');
        $name = $req->input('name');
        $dob = $req->input('birth_date');
        $nation = $req->input('nationality');
        $loc = $req->input('location');
        $phone = $req->input('phone');
        $email = $req->input('email');
        $des = $req->input('myself_des'); 
        $result=parsonalinfomodel::where('id','=',$id)->update([
            'name'=>$name,
            'birth_date'=>$dob,
            'nationality'=>$nation,
            'location'=>$loc,
            'phone'=>$phone,
            'email'=>$email,
            'myself_des'=>$des
        ]);

        if ($result==true) {
            return 1;
        }
        else{
            return 0;
        }

    }


    function addParsonalData(Request $req){
        $name = $req->input('name');
        $dob = $req->input('birth_date');
        $nation = $req->input('nationality');
        $loc = $req->input('location');
        $phone = $req->input('phone');
        $email = $req->input('email');
        $des = $req->input('myself_des'); 
        $result=parsonalinfomodel::insert([
            'name'=>$name,
            'birth_date'=>$dob,
            'nationality'=>$nation,
            'location'=>$loc,
            'phone'=>$phone,
            'email'=>$email,
            'myself_des'=>$des
        ]);

        if ($result==true) {
           return 1;
        }
        else{
            return 0;
        }
    }



}
