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
    public function index()
    {
        return view('welcome');
        // return view('home');
    }
    public function firstUser()
    {
        session(['c_id' => '1']);
        return view('home');
    }
    public function SecondUser()
    {
        session(['c_id' => '2']);
        return view('home');
    }
}