<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\D_Purchase;
use App\Models\Working_Stock;
use App\Models\Ready_Stock;
use App\Models\Manager_Details;
use App\Models\Sell_Stock;
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
        return view('Diamond_tracker.index');
    }
    public function Diamond_tracker_search(Request $request)
    {
        $fetchdata = [];
        $c_id = session()->get('c_id');
        $barcode_id = $request->search_value;
        $fetchdata['daimond'] = D_Purchase::where([['c_id', $c_id], ['d_barcode', $barcode_id]])->first();
        $fetchdata['supplier_name'] = D_Purchase::join('supplier_details', 'd_purchase.s_id', '=', 'supplier_details.s_id')
            ->where('d_purchase.d_barcode', $barcode_id)
            ->get('supplier_details.s_name');
        $fetchdata['manager_name'] = Working_Stock::withTrashed()
            ->join('manager_details', 'working_stock.m_id', '=', 'manager_details.m_id')
            ->where('working_stock.d_barcode', $barcode_id)
            ->get('working_stock.*', 'manager_details.m_name');
        $fetchdata['date'] = Carbon::now();
        $fetchdata['sell_date'] = Sell_Stock::where('d_barcode', $barcode_id)->get('created_at');
        // echo $barcode_id;
        // echo "<br>";
        // echo $fetchdata['sell_date'];
        // dd($fetchdata);
        return view('Diamond_tracker.index_status', $fetchdata);
    }
}