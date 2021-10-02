<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\visitormodel;
use App\Models\skillsmodel;
use App\Models\servicesmodel;
use App\Models\choosemodel;
use App\Models\testimonialmodel;
use App\Models\countmodel;



class homecontroller extends Controller
{
    function homeIndex(){

        $userIp=$_SERVER['REMOTE_ADDR'];
        date_default_timezone_set("asia/Dhaka");
        $timeDate=date("y-m-d h:i:sa");
        visitormodel::insert(['ip_address'=>$userIp,'visit_time'=>$timeDate]);


        $skillData=json_decode(skillsmodel::all());
        $servicesData=json_decode(servicesmodel::all());
        $chooseData=json_decode(choosemodel::all());
        $testimonialData=json_decode(testimonialmodel::all());
        $countData=json_decode(countmodel::all());

    
            return view('home',[
                'skillData'=>$skillData,
                'servicesData'=>$servicesData,
                'chooseData'=>$chooseData,
                'testimonialData'=>$testimonialData,
                'countData'=>$countData,
                
        ]);
     }
    function skillIndex(){
        return view('admin.skills');          
    }
    function servicesIndex(){
        return view('admin.services');           
    }
    function chooseIndex(){
        return view('admin.choose');           
    }
    function testimonialIndex(){
        return view('admin.testimonial');          
    }
    function countIndex(){
        return view('admin.count');           
    }
    



}
