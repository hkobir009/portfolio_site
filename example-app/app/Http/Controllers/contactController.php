<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Models\socialModel;
use App\Models\contactModel;



class contactController extends Controller
{
    function contactIndex(){

        $socialData=json_decode(socialModel::all());
        $date = Carbon::now('Asia/Dhaka')->toDateTimeString();
        return view('layout.contactpage',['socialData'=>$socialData,'date'=>$date]);

    }

    function socialIndex(){
        return view('admin.social');           
    }

    function contactData(){
        return view('admin.contact');           
    }



    function getContactData(){
        $contactData = contactModel::all();
        return $contactData;
    }

    function deleteContactData(Request $req){
        $id = $req->input('id');
        $result=contactModel::where('id','=',$id)->delete();
        if ($result==true) {
            return 1;
        }
        else{
            return 0;
        }

    }



    function insertContactData(Request $req){

        $contact = new contactModel;
        $contact->contact_name = $req->input('contact_name');
        $contact->contact_email = $req->input('contact_email');
        $contact->contact_phone = $req->input('contact_phone');
        $contact->contact_website = $req->input('contact_website');
        $contact->contact_massege = $req->input('contact_massege');
        $contact->created_date = $req->input('created_date');
        $result = $contact->save();
        
        if ($result==true) {
           return 1;
        }
        else{
            return 0;
        }
    }






}
