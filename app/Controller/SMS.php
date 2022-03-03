<?php 
 namespace App\Controller; 
 use App\Controller\BaseController;
use Twilio\Rest\Client;

require BASE_PATH . '/vendor/autoload.php';

 class SMS extends BaseController 
 { 

    public static function send($to, $from, $body)
    {
        $sid = env("TWILIO_ACCOUNT_SID");
        $token = env("TWILIO_AUTH_TOKEN");
        $client = new Client($sid, $token);

        $client->messages->create($to, [
            'from' => $from,
            'body' => $body
        ]);
    }
 }