<?php

namespace App\Http\Controllers;

use App\Models\D_Purchase;
use App\Models\Manager_Details;
use App\Models\Supplier_Details;
use App\Models\Ready_Stock;
use App\Models\Working_Stock;
use App\Models\Sell_Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Response;
use Illuminate\Validation\Rule;

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
        session(['c_id' => '1', 'c_name' => 'VMJEWELS', 'dashboard' => 'VMJEWEL', 'c_img_url' => 'assets/images/company_logo/vmjewels.jpeg']);
        $data = array();
        $data['totalManager'] = Count(Manager_Details::where('c_id','1')->get());
        $data['totalSupplier'] = Count(Supplier_Details::where('c_id','1')->get());
        $data['totalReadyStock'] = Count(Ready_Stock::where('c_id','1')->get());
        $data['totalWorkingStock'] = Count(Ready_Stock::where('c_id','1')->get());
        $data['totalSellStock'] = Count(Sell_Stock::where('c_id','1')->get());
        return view('home', $data);
    }
    public function SecondUser()
    {
        session(['c_id' => '2', 'c_name' => 'EKLINGJI JEWELS', 'dashboard' => 'EKLINGJI', 'c_img_url' => 'assets/images/company_logo/eklingji_jewels.png']);
        $data = array();
        $data['totalManager'] = Count(Manager_Details::where('c_id','2')->get());
        $data['totalSupplier'] = Count(Supplier_Details::where('c_id','2')->get());
        $data['totalReadyStock'] = Count(Ready_Stock::where('c_id','2')->get());
        $data['totalWorkingStock'] = Count(Ready_Stock::where('c_id','2')->get());
        $data['totalSellStock'] = Count(Sell_Stock::where('c_id','2')->get());
        return view('home', $data);
    }
}