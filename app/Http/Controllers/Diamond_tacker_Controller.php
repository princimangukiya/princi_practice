<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\D_Purchase;
use App\Models\defective_pcs;
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

        $fetchdata['daimond'] = D_Purchase::join('supplier_details', 'd_purchase.s_id', '=', 'supplier_details.s_id')
            ->where([['d_purchase.c_id', $c_id], ['d_purchase.d_barcode', $barcode_id]])
            ->first(['d_purchase.*', 'supplier_details.s_name']);
        if ($fetchdata['daimond'] == null) {
            // $fetchdata = "";
            return view('Diamond_tracker.index_status', $fetchdata);
        } else {
            $Diamond = $fetchdata['daimond']['d_id'];
            $fetchdata['manager_name'] = Working_Stock::withTrashed()
                ->join('manager_details', 'working_stock.m_id', '=', 'manager_details.m_id')
                ->where([['working_stock.c_id', $c_id], ['working_stock.d_id', $Diamond]])->first();
            $fetchdata['date'] = Carbon::now();
            $fetchdata['ready_stock'] = Ready_Stock::where([['c_id', $c_id], ['d_id', $Diamond]])->first('return_date');
            $fetchdata['sell_date'] = Sell_Stock::where([['c_id', $c_id], ['d_id', $Diamond]])->first('return_date');
            $fetchdata['dif_pcs'] = defective_pcs::where([['c_id', $c_id], ['d_id', $Diamond]])->first('date');
            return view('Diamond_tracker.index_status', $fetchdata);
        }
    }
}