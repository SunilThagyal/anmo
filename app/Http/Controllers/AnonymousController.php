<?php

namespace App\Http\Controllers;

use App\Models\UserInfo;
use GuzzleHttp\Client;
use Jenssegers\Agent\Facades\Agent;
use Illuminate\Http\Request;

class AnonymousController extends Controller
{
    /* send anonymous message  */
    public function sendMessage(Request $request){
        if($request->isMethod('get')){
            return view('frontend.anymous.message');
        }else{
            // test
            //
           $userdata =  userInformation();
           $userinfo = [
            'user_info' => $userdata
           ];
           if(auth()->check()){
                $userinfo['user_id'] = auth()->id();
           }
           UserInfo::create($userinfo);
        }
    }
}
