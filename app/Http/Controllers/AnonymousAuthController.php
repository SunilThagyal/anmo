<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class AnonymousAuthController extends Controller
{
    public function Signup(Request $request){
        if($request->isMethod('get')){
            return view('frontend.auth.signup');
        }elseif($request->isMethod('post')){
            $response = signup($request);
            $alert = View::make('components.alert-component')->render();
            return response()->json(['status' => 'success','message' => $response,'alert'=> $alert]);
        }
    }
}
