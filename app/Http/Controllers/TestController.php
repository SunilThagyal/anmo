<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{

    public function dumyRecord(){
        for($i = 0 ; $i <= 10000 ; $i++){
            $data = [
                'name' => uniqid('name'),
                'email' => "dumyemail".uniqid()."@gmail.com",
                'remember_token' => 2,
                "password" => bcrypt('Shine@123'),
            ];
            User::create($data);
        }

        return "run successfully";
    }

    public function getUsers()
    {
        $users = DB::select('CALL GetUSers()');

        return response()->json($users);

    }
}
