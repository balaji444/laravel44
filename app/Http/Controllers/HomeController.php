<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    
    public function routingSlackNotification($param) {
        
        return 'https://hooks.slack.com/services/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';
        
    }
}
