<?php

namespace App\Http\Controllers\Admin;

use Aloha\Twilio\Twilio;
use App\Eleve;
use App\Mail\Welcome;
use App\Mail\WelcomeAgain;
use App\Personnel;
use App\Responsable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    //

    public function showEmailPage(){
        return view('espaces.admin.messages.email');
    }

    public function showSMSPage(){
        return view('espaces.admin.messages.sms');
    }



    public function loadEmailsFromAdmin(){
    $parents = Responsable::get();
    $profs = Personnel::get();
    $eleves = Eleve::get();

    return compact('parents','profs','eleves');
}

    public function sendMailFromAdmin(Request $request){

        $subject = $request->subject;
        $receiver = $request->email;
        /*Mail::send("emails.name",[
            'objet'=>$request->object,
            'message'=>$request->message
        ],function($message){
            $message->to('samfarid.dev@gmail.com');
        });*/

        Mail::to($receiver)->send(new WelcomeAgain($subject));

        return response()->json(['message' => 'Request completed']);
    }


    public function loadSMSFromAdmin(){
        $parents = Responsable::get();
        $profs = Personnel::get();
        $eleves = Eleve::get();

        return compact('parents','profs','eleves');
    }

    public function sendSMSFromAdmin(Request $request){

        $message = $request->subject;
        $to = $request->phone;
        $accountId = 'AC8b18c44fcc6be14c009f7ddb5bdcae73';
        $token = 'bc985dd907a3f3cf288a03cf963f92c7';
        $fromNumber = '+17028871339';

        $twilio = new Twilio($accountId, $token, $fromNumber);
        $twilio->message($to, $message);

        return response()->json(['message' => 'Request completed']);
    }
}
