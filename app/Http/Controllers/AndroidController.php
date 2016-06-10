<?php

namespace App\Http\Controllers;

use Davibennun\LaravelPushNotification\LaravelPushNotificationServiceProvider;
use Illuminate\Http\Request;

use App\Http\Requests;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\AndroidUser;
use Davibennun\LaravelPushNotification\Facades\PushNotification;
use Illuminate\Support\Facades\Response;

class AndroidController extends Controller{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except' => ['register']]);
    }

    public function index()
    {
        $output = AndroidUser::all();
        return view('android_user',['users'=>$output]);
    }

    public function register(Request $request){
        $input = $request->all();
        AndroidUser::create($input);
    }

    public function sendMessage(Request $req){
        $target = AndroidUser::findOrNew($req->id);

        $token = $target['regId'];
        $message['tag'] = "ping";
        $message['message'] = "Ping From Server";

        $info = json_encode(array('tag'=>"test"));
        //Adding Custom Adapter For SSL Verifycator
        //This Custom Only For Web Host Without SSL Cert
        $push = PushNotification::app('Android');
        $push->adapter->setAdapterParameters(['sslverifypeer' => false]);
        $push->to($token)->send($info);
        return redirect('android');
    }

    public function sendMessageCustom(Request $req){
        $target = AndroidUser::findOrNew($req->id);
        $message = $req->message;
        $token = $target['regId'];

        $push = PushNotification::app('Android');
        $push->adapter->setAdapterParameters(['sslverifypeer' => false]);
        $push->to($token)->send($message);

        return redirect('android');
    }

    public function sendInfo(Request $req){
        $target = AndroidUser::findOrNew($req->id);
        $token = $target['regId'];

        $info = json_encode(array('tag'=>'info',
                                     'title'=>$req->message,
                                     'tgl'=>date('Y-m-d',Carbon::now()->timestamp),
                                     'sta'=>"New",
                                     'link'=>"google.com"));

        $push = PushNotification::app('Android');
        $push->adapter->setAdapterParameters(['sslverifypeer'=>false]);
        $push->to($token)->send($info);


        return redirect('android');


    }

}
