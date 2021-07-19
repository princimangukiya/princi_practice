<?php

namespace App\Http\Controllers;

use App\Models\D_Purchase;
use App\Models\Working_Stock;
use App\Models\Ready_Stock;
use App\Models\Sell_Stock;
use App\Models\Manager_Details;
use App\Models\supplier_details;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\Rule;


class SellStockController extends Controller
{
    public function index()
    {
        $data = array();
        $c_id = session()->get('c_id');
        $data['sell_stock'] = Sell_Stock::where('c_id', $c_id)->with('Supplier', 'Diamond')->get();
        return view('sell_stock.index', $data);
    }

    public function create()
    {
        $data = array();
        $c_id = session()->get('c_id');
        $data['supplier'] = Supplier_Details::where('c_id', $c_id)->get();
        return view('sell_stock.return', $data);
    }

    public function store(Request $request)
    {

        try {
            $validator = Validator::make($request->all(), [
                'bar_code' => 'required',
                's_id' => 'required',

            ]);            //dd($request);
            if ($validator->fails()) {
                return Response::json(array('success' => false));
            }
            //dd($request);
            $DiamondData = Ready_Stock::where('d_barcode', $request->bar_code)->first();
            $d_purchse = D_Purchase::where('d_barcode', $request->bar_code)->where('isReady', 1)->first();
            if ($DiamondData == null && $d_purchse == null) {
                return Response::json(array('success' => 404));
            } else if ($d_purchse->s_id != $request->s_id) {
                return Response::json(array('success' => 200));
            } else {
                $c_id = session()->get('c_id');
                $newitem = new Sell_Stock();
                $newitem->d_id = !empty($DiamondData->d_id) ? $DiamondData->d_id : '';
                $newitem->s_id = !empty($request->s_id) ? $request->s_id : '';
                $newitem->c_id = $c_id;
                $newitem->d_barcode = !empty($request->bar_code) ? $request->bar_code : '';
                $newitem->save();

                $dPurchaseData = D_Purchase::where('d_id', $DiamondData->d_id)->update(['isReturn' => 1]);
                if ($dPurchaseData != null) {
                    $stockdelete = Ready_Stock::find($DiamondData->r_id);
                    $stockdelete->delete();
                    return Response::json(array('success' => true));
                } else {
                    return Response::json(array('success' => 403));
                }
            }
        } catch (\Throwable $th) {
            return Response::json(array('success' => false));
        }
    }

    // supplier delete
    public function destroy($id)
    {
        //
        $stock = Sell_Stock::find($id);
        $stock->delete();
        $notification = array(
            'message' => 'User Deleted!',
            'alert-type' => 'success'
        );

        return Redirect::to('/sell_stock')->with($notification);
    }
}
