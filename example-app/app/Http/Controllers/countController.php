<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\countmodel;

class countController extends Controller
{
    function getCountData(){

        $countData = json_decode(countmodel::all());
        return $countData;

    }

    function deleteCountData(Request $req){
        $id = $req->input('id');
        $result=countmodel::where('id','=',$id)->delete();
        if ($result==true) {
            return 1;
        }
        else{
            return 0;
        }

    }

    function detailsCountData(Request $req){
        $id = $req->input('id');
        $countData=countmodel::where('id','=',$id)->get();
        return $countData;

    }


    function updateCountData(Request $req){
        $id = $req->input('id');
        $title = $req->input('title');
        $count = $req->input('count_no');
        $result=countmodel::where('id','=',$id)->update(['title'=>$title,'count_no'=>$count]);
        if ($result==true) {
            return 1;
        }
        else{
            return 0;
        }

    }


    function addCountData(Request $req){
        $title=$req->input('title');
        $count=$req->input('count_no');
        $result=countmodel::insert(['title'=>$title,'count_no'=>$count]);

        if ($result==true) {
           return 1;
        }
        else{
            return 0;
        }
    }


}
