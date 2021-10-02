<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\servicesmodel;

class servicescontroller extends Controller
{
    function getservicesData(){

        $servicesdata = json_decode(servicesmodel::all());
        return $servicesdata;

    }

    function deleteServicesData(Request $req){
        $id = $req->input('id');
        $result=servicesmodel::where('id','=',$id)->delete();
        if ($result==true) {
            return 1;
        }
        else{
            return 0;
        }

    }

    function detailsServicesData(Request $req){
        $id = $req->input('id');
        $servicesdata=servicesmodel::where('id','=',$id)->get();
        return $servicesdata;

    }


    function updateServicesData(Request $req){
        $id = $req->input('id');
        $title = $req->input('title');
        $icon = $req->input('icon');
        $des = $req->input('des'); 
        $result=servicesmodel::where('id','=',$id)->update(['title'=>$title,'icon'=>$icon,'des'=>$des]);
        if ($result==true) {
            return 1;
        }
        else{
            return 0;
        }

    }


    function addServicesData(Request $req){
        $title=$req->input('title');
        $icon=$req->input('icon');
        $des=$req->input('des');
        $result=servicesmodel::insert(['title'=>$title,'icon'=>$icon,'des'=>$des]);

        if ($result==true) {
           return 1;
        }
        else{
            return 0;
        }
    }


}
