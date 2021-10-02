<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\visitormodel;

class visitorcontroller extends Controller
{
    function visitorIndex(){

       
        $visitorData= json_decode(visitormodel::all());
    
        return view('admin.visitor',['visitorData'=>$visitorData]);
    }


    
}
