<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\skillsmodel;

class skillcontroller extends Controller
{
    function getSkillData(){

        $skilldata = json_decode(skillsmodel::all());
        return $skilldata;

    }

    function deleteSkillData(Request $req){
        $id = $req->input('id');
        $result=skillsmodel::where('id','=',$id)->delete();
        if ($result==true) {
            return 1;
        }
        else{
            return 0;
        }

    }

    function detailsSkillData(Request $req){
        $id = $req->input('id');
        $skilldata=skillsmodel::where('id','=',$id)->get();
        return $skilldata;

    }


    function updateSkillData(Request $req){
        $id = $req->input('id');
        $title = $req->input('title');
        $par = $req->input('parcentance');
        $pro = $req->input('progress'); 
        $result=skillsmodel::where('id','=',$id)->update(['title'=>$title,'parcentance'=>$par,'progress'=>$pro]);
        if ($result==true) {
            return 1;
        }
        else{
            return 0;
        }

    }



    function addSkillData(Request $req){
        $title=$req->input('title');
        $par=$req->input('parcentance');
        $pro=$req->input('progress');
        $result=skillsmodel::insert(['title'=>$title,'parcentance'=>$par,'progress'=>$pro]);

        if ($result==true) {
           return 1;
        }
        else{
            return 0;
        }
    }


}
