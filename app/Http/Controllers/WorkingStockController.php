<?php

namespace App\Http\Controllers;

use App\Models\DPurchase;
use App\Models\WorkingStock;
use App\Models\ManagerDetails;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Response;
use Illuminate\Validation\Rule;

class WorkingStockController extends Controller
{

    public function index()
    {
        $data = array();
        $c_id = session()->get('c_id');
        $data['working_stock'] = WorkingStock::where([['working_stock.c_id', $c_id], ['working_stock.status', 1]])->with('Manager', 'Diamond')->get();
        // echo $data['working_stock'];
        return view('working_stock.index', $data);
    }

    public function create()
    {
        $c_id =  session()->get('c_id');
        $data = array();
        $data['manager'] = ManagerDetails::where([['c_id', $c_id], ['status', 1]])->get();
        $data['check'] = 'hello';
        return view('working_stock.given', $data);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'bar_code' => 'required',
            'm_id' => 'required',
            'date' => 'required'

        ]);            //dd($request);
        if ($validator->fails()) {
            return Response::json(array('success' => false));
        }
        //dd($request);
        try {
            $c_id = session()->get('c_id');

            // $DiamondData = DPurchase::where('d_barcode', $request->bar_code)->where('c_id', $c_id)->first();
            $Diamond = DPurchase::where('d_barcode', $request->bar_code)->first();
            // return Response::json(array('success' => json_encode($Diamond)));

            if ($Diamond == null) {
                return Response::json(array('success' => 314));
            } else if ($Diamond->c_id != $c_id) {
                if ($c_id == 1) {
                    $data = 1;
                } else {
                    $data = 2;
                }
                return Response::json(array('success' => 318));
            } else if ($Diamond['doReady'] != null) {
                return Response::json(array('success' => 325));
            } else if ($Diamond['status'] == 0) {
                return Response::json(array('success' => 322));
            }

            $workingStockData = WorkingStock::withTrashed()->where('d_id', $Diamond->d_id)->first();
            if ($workingStockData != null) {
                $newitem = array();
                $newitem['m_id'] = $request->m_id;
                $newitem['bill_date'] = $request->bill_date;
                $newitem['c_id'] = $c_id;
                $newitem['status'] = 1;
                $newitem['deleted_at'] = null;
                WorkingStock::withTrashed()->where('d_id', $Diamond->d_id)->update($newitem);
                DPurchase::where('d_id', $Diamond->d_id)->update(['doReady' => $request->m_id]);
                return Response::json(array('success' => 200));
            } else if ($Diamond->doReady != null) {
                return Response::json(array('success' => 320));
            } else {
                $newitem = new WorkingStock();
                $newitem->d_id = !empty($Diamond->d_id) ? $Diamond->d_id : '';
                $newitem->m_id = !empty($request->m_id) ? $request->m_id : '';
                $newitem->c_id = $c_id;
                $newitem->status = 1;
                $newitem->bill_date = !empty($request->date) ? $request->date : '';
                // $newitem->d_barcode = !empty($request->bar_code) ? $request->bar_code : '';
                $newitem->save();

                DPurchase::where('d_id', $Diamond->d_id)->update(['doReady' => $request->m_id]);
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
        $data['Diamond'] = WorkingStock::findOrFail($id);
        $d_id = $data['Diamond']['d_id'];
        $data['Diamond_purchase'] = DPurchase::where('d_id', $d_id)->first();
        // dd($data['Diamond']);
        // echo  $data['Diamond_purchase'];
        return view('working_stock.edit', $data);
    }
    public function update(Request $request, $id)
    {

        try {
            $validator = Validator::make($request->all(), [
                'bar_code' => 'required',
                'm_id' => 'required',
                'bill_date' => 'required'
            ]);
            //dd($request);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput($request->all());
            }
            $c_id = session()->get('c_id');
            $DiamondData = WorkingStock::where('w_id', $id)->first();
            $newitem = array();
            $newitem['d_id'] =  $DiamondData->d_id;
            $newitem['m_id'] = $request->m_id;
            $newitem['bill_date'] =  $request->bill_date;
            $newitem['c_id'] = $c_id;

            WorkingStock::where('w_id', $id)->update($newitem);
            DPurchase::where('d_id', $DiamondData->d_id)->update(['d_barcode' => $request->bar_code, 'doReady' => $request->m_id]);

            return Redirect::to('/working-stock');
        } catch (\Throwable $th) {
            $notification = array(
                'message' => 'User can`t Update!',
                'alert-type' => 'error'
            );

            return Redirect::to('/working-stock')->with($notification);
        }
    }
    // supplier delete
    public function destroy($id)
    {
        //
        $data = WorkingStock::where('w_id', $id)->first();
        $d_id = $data['d_id'];
        $time = Carbon::now();
        WorkingStock::where('w_id', $id)->update(['deleted_at' => $time, 'status' => 0]);
        // $stock->delete();
        DPurchase::where('d_id', $d_id)->update(['doReady' => NULL]);
        $notification = array(
            'message' => 'User Deleted!',
            'alert-type' => 'success'
        );

        return Redirect::to('/working-stock')->with($notification);
    }
}
