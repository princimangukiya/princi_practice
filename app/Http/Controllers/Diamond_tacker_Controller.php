<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Diamond_tacker_Controller extends Controller
{
    public function index()
    {
        return view('Diamond_tracker.index');
    }
}