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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {   
        $level = $request->level;
        $subject = $request->subject;

        if(isset($level) && isset($subject)) {
            $show = "question";
        } elseif(isset($level)) {
            $show = "subject";
        } else {
            $show = "level";
        }

        return view('home', compact('show', 'level', 'subject'));
    }
}
