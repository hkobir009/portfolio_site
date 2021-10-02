<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\choosemodel;

class choosecontroller extends Controller
{
    function getChooseData(){

        $chooseData = json_decode(choosemodel::all());
        return $chooseData;

    }

    function deleteChooseData(Request $req){
        $id = $req->input('id');
        $result=choosemodel::where('id','=',$id)->delete();
        if ($result==true) {
            return 1;
        }
        else{
            return 0;
        }

    }

    function detailsChooseData(Request $req){
        $id = $req->input('id');
        $servicesdata=choosemodel::where('id','=',$id)->get();
        return $servicesdata;

    }


    function updateChooseData(Request $req){
        $id = $req->input('id');
        $icon = $req->input('icon');
        $des = $req->input('des'); 
        $result=choosemodel::where('id','=',$id)->update(['icon'=>$icon,'des'=>$des]);
        if ($result==true) {
            return 1;
        }
        else{
            return 0;
        }

    }


    function addChooseData(Request $req){
        $icon=$req->input('icon');
        $des=$req->input('des');
        $result=choosemodel::insert(['icon'=>$icon,'des'=>$des]);

        if ($result==true) {
           return 1;
        }
        else{
            return 0;
        }
    }


}
