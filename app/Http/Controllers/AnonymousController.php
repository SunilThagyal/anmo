<?php

namespace App\Http\Controllers;

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
            $device = Agent::device();
            $browser = Agent::browser();
            $version = Agent::version($browser);
            $platform = Agent::platform();
            $userIP = request()->ip();
            $userIP = "38.137.44.208";
            /* device type */
        $deviceType = match(true) {
            Agent::isDesktop() => "desktop",
            Agent::isTablet() => "tablet",
            Agent::isPhone() => "phone",
            default => "unknown"
        };
        /* get location using ip */
        $client = new Client();
        $response = $client->get("https://ipinfo.io/{$userIP}?token=".config('constants.ip_info_token'));
        $locationData = json_decode($response->getBody());
        $country = $locationData->country;
        $city = $locationData->city;
        $loc = $locationData->loc;
        $postal_code = $locationData->postal;
        $service_used = $locationData->org;
        $time_zone = $locationData->timezone;
        $deviceID = uniqid($platform);
        $user_data =[
            'ip' => $userIP,
            'country' => $country,
            'city' => $city,
            'loc' => $loc,
            'postal_code' => $postal_code,
            'service_used' => $service_used,
            'time_zone' => $time_zone,
            'device_id' => $deviceID,
            'device_type' => $deviceType,
            'device' => $device,
            'browser' => $browser,
            'platform' => $platform
        ];
        $user_data_json = serialize($user_data);
        }
    }
}
