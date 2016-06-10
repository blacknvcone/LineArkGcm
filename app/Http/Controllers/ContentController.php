<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\DumpContent;
use Davibennun\LaravelPushNotification\Facades\PushNotification;
use Illuminate\Support\Facades\Response;


class ContentController extends Controller{

    public function __construct(){
        $this->middleware('auth',['except' => ['MobileContent']]);
    }

    public function index(){
        $art = DumpContent::paginate(30);;
        return view('content_man_list',['arti'=>$art]);
    }

    public function MobileContent(Request $req){
        $to = $req->to;
        $from = $req->from;

        $art = DumpContent::where('id','>',$from)->where('id','<',$to)->get();
        return $art;
    }


}
