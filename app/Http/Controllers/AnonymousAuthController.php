<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnonymousAuthController extends Controller
{
    public function Signup(Request $request){
        if($request->isMethod('get')){
            return view('frontend.auth.signup');
        }
    }
}
