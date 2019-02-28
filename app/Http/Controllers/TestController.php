<?php

namespace App\Http\Controllers;

use Aloha\Twilio\Twilio;
use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    public function aloha(){
//        Twilio::message('+22892335875','Do it try it');
//        $accountId = 'SM2f5b90da6e8b4456a5d67bd53c24b80a';
        $accountId = 'AC8b18c44fcc6be14c009f7ddb5bdcae73';
        $token = 'bc985dd907a3f3cf288a03cf963f92c7';
        $fromNumber = '+17028871339';
        $twilio = new Twilio($accountId, $token, $fromNumber);
        $twilio->message("+22892335875", 'Pink Elephants and Happy Rainbows');

        //call
        /*$twilio->call('+22892335875', function ($message) {
            $message->say('Hello');
            $message->play('https://api.twilio.com/cowbell.mp3', ['loop' => 5]);
        });*/
        return 200;
    }
}
