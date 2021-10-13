<?php

namespace App\Http\Controllers;

use App\Models\D_Purchase;
use App\Models\Working_Stock;
use App\Models\Ready_Stock;
use App\Models\Manager_Details;
use App\Models\Supplier_Details;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;


class ReadyStockController extends Controller
{
    public function index()
    {
        $data = array();
        $c_id = session()->get('c_id');
        $data['ready_stock'] = Ready_Stock::where([['c_id', $c_id], ['status', 1]])->with('Manager', 'Diamond')->get();
        // var_dump($data);
        return view('ready_stock.index', $data);
    }

    public function create()
    {
        $data = array();
        $c_id = session()->get('c_id');
        $data['manager'] = Manager_Details::where('c_id', $c_id)->get();
        // $data['manager']= Ready_Stock::join('d_purchase', 'ready_stock.d_barcode', '=', 'd_purchase.d_barcode')
        //         ->get(['ready_stock.*', 'd_purchase.*']);
        return view('ready_stock.return', $data);
    }

    public function store(Request $request)
    {


        try {
            $validator = Validator::make($request->all(), [
                'bar_code' => 'required',
                'm_id' => 'required',
                'd_n_wt' => 'required',
                'date' => 'required'

            ]);            //dd($request);
            if ($validator->fails()) {
                return Response::json(array('success' => false));
            }
            //dd($request);
            $DiamondData = Working_Stock::where('d_barcode', $request->bar_code)->first();

            if ($DiamondData == null) {
                return Response::json(array('success' => 404));
            } else if ($DiamondData->m_id != $request->m_id) {
                return Response::json(array('success' => 200));
            } else {
                $c_id = session()->get('c_id');
                $newitem = new Ready_Stock();
                $newitem->d_id = !empty($DiamondData->d_id) ? $DiamondData->d_id : '';
                $newitem->m_id = !empty($request->m_id) ? $request->m_id : '';
                $newitem->d_n_wt = !empty($request->d_n_wt) ? $request->d_n_wt : '';
                $newitem->c_id = $c_id;
                $newitem->status = 1;
                $newitem->bill_date = !empty($request->date) ? $request->date : '';
                // $newitem->d_barcode = !empty($request->bar_code) ? $request->bar_code : '';
                $newitem->save();

                $dPurchaseData = D_Purchase::where('d_id', $DiamondData->d_id)->update(['isReady' => 1, 'd_n_wt' => $request->d_n_wt, 'price' => $request->price]);
                if ($dPurchaseData != null) {
                    // $stockdelete = Working_Stock::find($DiamondData->w_id);
                    // $stockdelete->delete();
                    Working_Stock::where('w_id', $DiamondData->w_id)->update(['status' => 0]);
                    return Response::json(array('success' => true));
                } else {
                    return Response::json(array('success' => 403));
                }
            }
        } catch (\Throwable $th) {
            return Response::json(array('success' => false));
        }
    }
    public function fetchData(Request $request)
    {

        //dd($request);
        $bar_code = $request->bar_code;
        $data = D_Purchase::where('d_barcode', $bar_code)->first();
        return Response::json(array('success' => $data));
    }
    public function edit($id)
    {
        //dd($id);
        $data = array();
        $data['Diamond'] = Ready_Stock::findOrFail($id);
        $bar_code = $data['Diamond']['d_id'];
        $data['Diamond_purchase'] = D_Purchase::where('d_id', $bar_code)->first();
        // echo $data['Diamond'];
        return view('ready_stock.edit', $data);
    }
    public function update(Request $request, $id)
    {

        try {
            $validator = Validator::make($request->all(), [
                'bar_code' => 'required',
                'm_id' => 'required',
                'd_n_wt' => 'required',

            ]);
            //dd($request);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput($request->all());
            }
            $c_id = session()->get('c_id');
            $DiamondData = Ready_Stock::where('r_id', $id)->first();
            $newitem = array();
            $newitem['d_id'] = !empty($DiamondData->d_id) ? $DiamondData->d_id : '';
            $newitem['m_id'] = !empty($request->m_id) ? $request->m_id : '';
            $newitem['d_n_wt'] = !empty($request->d_n_wt) ? $request->d_n_wt : '';
            $newitem['c_id'] = $c_id;
            // $newitem['d_barcode'] = !empty($request->bar_code) ? $request->bar_code : '';
            // dd($newitem);
            Ready_Stock::where('r_id', $id)->update($newitem);
            $dPurchaseData = D_Purchase::where('d_id', $DiamondData->d_id)->update(['d_barcode' => $request->bar_code, 'd_n_wt' => $request->d_n_wt, 'price' => $request->price]);

            return Redirect::to('/ready_stock');
        } catch (\Throwable $th) {
            $notification = array(
                'message' => 'User can`t Update!',
                'alert-type' => 'error'
            );

            return Redirect::to('/ready_stock')->with($notification);
        }
    }
    // Ready Stock delete
    public function destroy($id)
    {
        //
        $data = Ready_Stock::withTrashed()->where('r_id', $id)->first();
        $d_id = $data['d_id'];
        // echo $data;
        $time = Carbon::now();
        Ready_Stock::where('r_id', $id)->update(['deleted_at' => $time, 'status' => 0]);
        // $stock->delete();
        Working_Stock::withTrashed()->where('d_id', $d_id)->update(['status' => 1]);
        D_Purchase::where('d_id', $d_id)->update(['isReady' => NULL]);
        $notification = array(
            'message' => 'User Deleted!',
            'alert-type' => 'success'
        );

        return Redirect::to('/ready_stock')->with($notification);
    }
}