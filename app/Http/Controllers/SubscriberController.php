<?php

namespace App\Http\Controllers;

use App\Mail\WebMail;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class SubscriberController extends Controller
{

    public function index(){
        $subscribers = Subscriber::latest()->paginate(10);
        //dd($subscribers);
        return view('admin.pages.subscriber.index', compact('subscribers'));
    }
    
    public function email(){
        return view('admin.pages.subscriber.email');
    }

    public function sendEmailToAll(Request $request){
        
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'email' => 'required|email|unique:subscribers',
        ]);

        // Generate a token number and replace backslash $
        $token = str_replace('/', '$', Hash::make(time()));
        $newSubsciber = new Subscriber();
        $newSubsciber->email  = $request->email;
        $newSubsciber->token = $token;
        $newSubsciber->status = 'pending';
        $newSubsciber->save();

        // send mail 
        $subject = 'Subscribe Verification';
        $url = url('subscribe/' . $token . '/' . $request->email);
        $message = '<p>Please click on this link to verify</p>';
        $message .= '<a href="' . $url . '" target= "_blank">Link</a>';
        Mail::to($request->email)->send(new WebMail($subject, $message));

        return response()->json([
            'status' => 'success',
        ]);
    }

    public function verify($token, $email)
    {
        $subscriberData = Subscriber::where('email', $email)->where('token', $token)->first();
        if ($subscriberData) {
            $subscriberData->token = '';
            $subscriberData->status = 'active';
            $subscriberData->update();
            return redirect()->route('echo365.home');
        }
        return 'This link are not valid !';
    }


}
