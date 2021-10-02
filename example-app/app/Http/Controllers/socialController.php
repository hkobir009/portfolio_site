<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\socialModel;

class socialController extends Controller
{
    
    function getSocialData(){
        $socialData = json_decode(socialModel::all());
        return $socialData;
    }

    function deleteSocialData(Request $req){
        $id = $req->input('id');
        $result=socialModel::where('id','=',$id)->delete();
        if ($result==true) {
            return 1;
        }
        else{
            return 0;
        }

    }

    function detailsSocialData(Request $req){
        $id = $req->input('id');
        $socialData=socialModel::where('id','=',$id)->get();
        return $socialData;

    }


    function updateSocialData(Request $req){
        $id=$req->input('id');
        $facebook=$req->input('facebook');
        $twitter=$req->input('twitter');
        $instagram=$req->input('instagram');
        $youtube=$req->input('youtube');
        $git=$req->input('git');
        $upwork=$req->input('upwork');
        $freelancer=$req->input('freelancer');
        $fiverr=$req->input('fiverr');
        $pph=$req->input('pph'); 
        $result=socialModel::where('id','=',$id)->update([
            'facebook'=>$facebook,
            'twitter'=>$twitter,
            'instagram'=>$instagram,
            'youtube'=>$youtube,
            'git'=>$git,
            'upwork'=>$upwork,
            'freelancer'=>$freelancer,
            'fiverr'=>$fiverr,
            'pph'=>$pph
        ]);

        if ($result==true) {
            return 1;
        }
        else{
            return 0;
        }

    }


    function addSocialData(Request $req){
        $facebook = $req->input('facebook');
        $twitter = $req->input('twitter');
        $instagram = $req->input('instagram');
        $youtube = $req->input('youtube');
        $git = $req->input('git');
        $upwork = $req->input('upwork');
        $freelancer = $req->input('freelancer');
        $fiverr = $req->input('fiverr');
        $pph = $req->input('pph'); 
        $result=socialModel::insert([
            'facebook'=>$facebook,
            'twitter'=>$twitter,
            'instagram'=>$instagram,
            'youtube'=>$youtube,
            'git'=>$git,
            'upwork'=>$upwork,
            'freelancer'=>$freelancer,
            'fiverr'=>$fiverr,
            'pph'=>$pph
        ]);

        if ($result==true) {
           return 1;
        }
        else{
            return 0;
        }
    }



}
