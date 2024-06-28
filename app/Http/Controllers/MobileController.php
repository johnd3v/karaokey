<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

class MobileController extends Controller
{

    public function index($id,$hash){
        $agent = new Agent();

        return view('mobile',[
            'hash' => $hash
        ]);
    }
}
