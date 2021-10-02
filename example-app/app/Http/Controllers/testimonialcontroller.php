<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\testimonialmodel;

class testimonialcontroller extends Controller
{
    function getTestimonialData(){
        $countData = json_decode(testimonialmodel::all());
        return $countData;

    }

    function deleteTestimonialData(Request $req){
        $id = $req->input('id');
        $result=testimonialmodel::where('id','=',$id)->delete();
        if ($result==true) {
            return 1;
        }
        else{
            return 0;
        }

    }

    function detailsTestimonialData(Request $req){
        $id = $req->input('id');
        $testimonialData=testimonialmodel::where('id','=',$id)->get();
        return $testimonialData;

    }


    function updateTestimonialData(Request $req){
        $id = $req->input('id');
        $name=$req->input('name');
        $owner=$req->input('owner');
        $img=$req->input('img');
        $des=$req->input('des');
        $result=testimonialmodel::where('id','=',$id)->update(['name'=>$name,'owner'=>$owner,'img'=>$img,'des'=>$des]);
        if ($result==true) {
            return 1;
        }
        else{
            return 0;
        }

    }


    function addTestimonialData(Request $req){
        $name=$req->input('name');
        $owner=$req->input('owner');
        $img=$req->input('img');
        $des=$req->input('des');
        $result=testimonialmodel::insert(['name'=>$name,'owner'=>$owner,'img'=>$img,'des'=>$des]);

        if ($result==true) {
           return 1;
        }
        else{
            return 0;
        }
    }

}
