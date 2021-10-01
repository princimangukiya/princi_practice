<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\D_Purchase;
use App\Models\Working_Stock;
use App\Models\Ready_Stock;
use App\Models\Manager_Details;
use App\Models\Supplier_Details;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;

class Diamond_tacker_Controller extends Controller
{
    public function index()
    {
        $fetchdata = D_Purchase::all();
        return view('Diamond_tracker.index', $fetchdata);
    }
    // public function Diamond_tracker_search(Request $request)
    // {

    //     return view('Diamond_tracker.index', $fetchdata);
    //     // echo $barcode_id;
    // }
}
