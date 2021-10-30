<?php

namespace App\Http\Controllers;

use App\Models\DPurchase;
use App\Models\ManagerDetails;
use App\Models\SupplierDetails;
use App\Models\ReadyStock;
use App\Models\WorkingStock;
use App\Models\SellStock;
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
        $data['totalManager'] = Count(ManagerDetails::where('c_id', '1')->get());
        $data['totalSupplier'] = Count(SupplierDetails::where('c_id', '1')->get());
        $data['totalReadyStock'] = Count(ReadyStock::where([['c_id', '1'], ['status', '1']])->get());
        $data['totalWorkingStock'] = Count(WorkingStock::where([['c_id', '1'], ['status', '1']])->get());
        $data['totalSellStock'] = Count(SellStock::where([['c_id', '1']])->get());
        return view('home', $data);
    }
    public function SecondUser()
    {
        session(['c_id' => '2', 'c_name' => ' EKLINGJI GEMS', 'dashboard' => 'EKLINGJI', 'c_img_url' => 'assets/images/company_logo/Eklingi_jewel.jpeg']);
        $data = array();
        $data['totalManager'] = Count(ManagerDetails::where('c_id', '2')->get());
        $data['totalSupplier'] = Count(SupplierDetails::where('c_id', '2')->get());
        $data['totalReadyStock'] = Count(ReadyStock::where([['c_id', '2'], ['status', '1']])->get());
        $data['totalWorkingStock'] = Count(WorkingStock::where([['c_id', '2'], ['status', '1']])->get());
        $data['totalSellStock'] = Count(SellStock::where([['c_id', '2']])->get());
        return view('home', $data);
    }
}
