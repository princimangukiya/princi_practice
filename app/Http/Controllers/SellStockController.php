<?php

namespace App\Http\Controllers;

use App\Models\D_Purchase;
use App\Models\Working_Stock;
use App\Models\Ready_Stock;
use App\Models\Sell_Stock;
use App\Models\Manager_Details;
use App\Models\Supplier_Details;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\Rule;
use Illuminate\Support\Carbon;


class SellStockController extends Controller
{
    public function index()
    {
        $data = array();
        $c_id = session()->get('c_id');
        $data['sell_stock'] = Sell_Stock::where('c_id', $c_id)->with('Supplier', 'Diamond')
            ->get();
        // echo $data['sell_stock'];
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


        $validator = Validator::make($request->all(), [
            'bar_code' => 'required',
            's_id' => 'required',
            'date' => 'required'

        ]);            //dd($request);
        if ($validator->fails()) {
            return Response::json(array('success' => false));
        }
        //dd($request);
        $c_id = session()->get('c_id');
        try {
            $Diamond = D_Purchase::where('d_barcode', $request->bar_code)->first();
            if ($Diamond == null) {
                return Response::json(array('success' => 314));
            } else if ($Diamond['c_id'] != $c_id) {
                if ('c_id' == 1) {
                    $data = 1;
                } else {
                    $data = 2;
                }
                return Response::json(array('success' => 318));
            }
            $DiamondData = Ready_Stock::where('d_id', $Diamond['d_id'])->first();
            $sellStockData = Sell_Stock::withTrashed()->where('d_id', $Diamond['d_id'])->first();

            // return Response::json(array('success' => json_encode($DiamondData)));
            if ($DiamondData == null) {
                return Response::json(array('success' => 325));
            } else if ($sellStockData != null) {
                $newitem = array();
                $newitem['d_id'] =  $DiamondData->d_id;
                $newitem['s_id'] =  $request->s_id;
                $newitem['return_date'] = $request->date;
                $newitem['deleted_at'] = null;
                Sell_Stock::withTrashed()->where('sell_id', $sellStockData->sell_id)->update($newitem);
                D_Purchase::where('d_id', $Diamond->d_id)->update(['isReturn' => 1]);
                Ready_Stock::where('r_id', $DiamondData->r_id)->update(['status' => 0]);
                return Response::json(array('success' => 200));
            } else if ($Diamond->s_id != $request->s_id) {
                return Response::json(array('success' => 320));
            } else {
                $newitem = new Sell_Stock();
                $newitem->d_id = $DiamondData->d_id;
                $newitem->s_id = $request->s_id;
                $newitem->c_id = $c_id;
                $newitem->return_date = $request->date;
                $newitem->save();

                D_Purchase::where('d_id', $Diamond->d_id)->update(['isReturn' => 1]);
                Ready_Stock::where('r_id', $DiamondData->r_id)->update(['status' => 0]);
                return Response::json(array('success' => 200));
            }
        } catch (\Throwable $th) {
            return Response::json(array('success' => 408));
        }
    }
    public function edit($id)
    {
        //dd($id);
        $data = array();
        $data['Diamond'] = Sell_Stock::findOrFail($id);
        $bar_code = $data['Diamond']['d_id'];
        $data['Diamond_purchase'] = D_Purchase::where('d_id', $bar_code)->first();
        // echo $data['Diamond'];
        return view('sell_stock.edit', $data);
    }
    public function update(Request $request, $id)
    {

        try {
            $validator = Validator::make($request->all(), [
                'bar_code' => 'required',

            ]);
            //dd($request);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput($request->all());
            }
            $c_id = session()->get('c_id');
            $DiamondData = Sell_Stock::where('sell_id', $id)->first();
            $newitem = array();
            $newitem['d_id'] =  $DiamondData->d_id;
            $newitem['s_id'] = $request->s_id;
            $newitem['c_id'] = $c_id;
            $newitem['return_date'] = $request->bill_date;
            // dd($newitem);
            Sell_Stock::where('sell_id', $id)->update($newitem);
            D_Purchase::where('d_id', $DiamondData->d_id)->update(['d_barcode' => $request->bar_code]);
            return Redirect::to('/sell_stock');
        } catch (\Throwable $th) {
            $notification = array(
                'message' => 'User can`t Update!',
                'alert-type' => 'error'
            );

            return Redirect::to('/sell_stock')->with($notification);
        }
    }
    // sell Stock delete
    public function destroy($id)
    {
        //
        // $stock = Sell_Stock::find($id);
        // $stock->delete();
        $data = Sell_Stock::withTrashed()->where('sell_id', $id)->first();
        $d_id = $data['d_id'];
        // $time = Carbon::now();
        // $sell_stock = Sell_Stock::where('sell_id', $id)->first();
        $data->delete();
        // $stock->delete();
        Ready_Stock::withTrashed()->where('d_id', $d_id)->update(['status' => 1]);
        D_Purchase::where('d_id', $d_id)->update(['isReturn' => NULL]);
        $notification = array(
            'message' => 'User Deleted!',
            'alert-type' => 'success'
        );

        return Redirect::to('/sell_stock')->with($notification);
    }
}