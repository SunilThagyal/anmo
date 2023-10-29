<?php

namespace App\Http\Controllers;

use App\Models\UserInfo;
use GuzzleHttp\Client;
use Jenssegers\Agent\Facades\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\View;
use Symfony\Component\DomCrawler\Crawler;

class AnonymousController extends Controller
{
    /* send anonymous message  */
    public function sendMessage(Request $request){
        if($request->isMethod('get')){
            $profilePicture = getInstagramProfile('s_verma_ji');
            return view('frontend.anymous.message',compact('profilePicture'));
        }else{
            // @dd('hello');
            //
            session(['status' => 'success', 'message' => 'done']);

            // Render the alert Blade view
            $alert = View::make('components.alert-component')->render();
            // Return the rendered alert as part of the response
            return response()->json(['alert' => $alert, "message" => "Message has been sent"]);
            //
           $data =[
            'user_info' => userInformation(),
           ];
           if(auth()->check()){
            $data['user_id'] = auth()->id();
           }
           UserInfo::create($data);
           return back()->with(['status' => 'success', 'message' => 'Message has been sent.']);

        }
    }
}
