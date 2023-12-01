<?php

use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Hash;
use Jenssegers\Agent\Facades\Agent;
use Illuminate\Support\Facades\Http;
use PHPUnit\Metadata\Uses;
use Symfony\Component\DomCrawler\Crawler;


function userInformation(){
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
return $user_data_json;
}

function getInstagramProfile($username = 'instagram'){
            // Instagram profile URL
            $profileUrl = "https://www.instagram.com/{$username}/";
            // Fetch the HTML content
            $response = Http::get($profileUrl);
            $htmlContent = $response->body();

            // Create a DOM Crawler from the HTML content
            $crawler = new Crawler($htmlContent);

            // Find the meta tag with property="og:image"
            $metaTag = $crawler->filter('meta[property="og:image"]')->first();

            // Get the content attribute of the meta tag
            $profilePictureUrl = $metaTag->attr('content');
            return $profilePictureUrl;
}
function signup($request){
    $data=[
        'full_name' => $request->full_name,
        'email' => $request->email,
        'password' => Hash::make($request->password)

    ];
    User::create($data);
}
