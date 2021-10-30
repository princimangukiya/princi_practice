<?php

namespace App\Http\Controllers;

use App\Models\D_Purchase;
use App\Models\rate_master;
use App\Models\Supplier_Details;
use App\Models\rate;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\Rule;

class DiamondController extends Controller
{
    public function index()
    {

        $data = array();
        $c_id = session()->get('c_id');
        $data['diamond'] = D_Purchase::where('c_id', $c_id)->with('shapeDate')->get();

        return view('Diamond_purchase.index', $data);
    }

    public function create()
    {

        $data = array();
        $c_id = session()->get('c_id');
        $data['supplier'] = D_Purchase::where('c_id', $c_id)->get();
        // $data['supplier'] = Supplier_Details::where('c_id', $c_id)->get();
        $data['supplier'] = D_Purchase::join('supplier_details', 'D_Purchase.s_id', '=', 'supplier_details.s_id')
            ->join('diamond_shape', 'd_purchase.shape_id', '=', 'diamond_shape.shape_id')

            ->get(['D_Purchase.*', 'supplier_details.*', 'diamond_shape.*']);
        $data['toDaydate'] = Carbon::now()->format('D-m-Y');
        return view('Diamond_purchase.create', $data);
    }
    public function store(Request $request)
    {

        $s_id = $request->s_id;
        $d_wt = $request->d_wt;
        $count = 0;
        $validator = Validator::make($request->all(), [
            'bar_code' => 'required',
            'd_wt' => 'required',
            'shape_id' => 'required',
            's_id' => 'required',
            'bill_date' => 'required'

        ]);            //dd($request);
        if ($validator->fails()) {
            return Response::json(array('success' => false));
        }
        try {
            $c_id = session()->get('c_id');
            $barcodeExist = D_Purchase::withTrashed()->where('d_barcode', $request->bar_code)->first();
            // return Response::json(array('success' => json_encode($barcodeExist)));
            // return Response::json(array('success' => json_encode($DiamondData)));
            if ($barcodeExist != null) {
                $newitem = array();
                $newitem['d_barcode'] =  $request->bar_code;
                $newitem['d_wt'] =  $request->d_wt;
                $newitem['s_id'] = $s_id;
                $newitem['c_id'] = $c_id;
                $newitem['bill_date'] = $request->bill_date;
                $newitem['shape_id'] = $request->shape_id;
                $newitem['deleted_at'] = null;
                $json_data = rate_master::where('rate_masters.s_id', $s_id)->first();
                $json_decoded = json_decode($json_data['json_price']);
                foreach ($json_decoded[0] as $key => $val) {
                    $r_id = $key;
                    $wt_category = rate::where([['c_id', $c_id], ['r_id', $r_id]])->first();
                    $wt_category = $wt_category['wt_category'];
                    $value = explode('-', $wt_category);
                    if ($value[0] <= $d_wt && $value[1] >= $d_wt) {
                        if ($json_data['rate_cat_pcs'] != null) {
                            $findWtCat = $json_data['rate_cat_pcs'];
                            if ($findWtCat == $key) {
                                $newitem['d_wt_category'] = $key;
                                $newitem['price'] = $val;
                            } else {
                                $newitem['d_wt_category'] = $key;
                                $d_wt = $request->d_wt;
                                $price = $val * $d_wt;
                                $newitem['price'] = $price;
                            }
                        } else {
                            $newitem['d_wt_category'] = $key;
                            $d_wt = $request->d_wt;
                            $price = $val * $d_wt;
                            $newitem['price'] = $price;
                        }

                        $count = 1;
                    }
                }
                if ($count == 0) {
                    return Response::json(array('success' => 311));
                }
                // dd($newitem);
                D_Purchase::withTrashed()->where('d_barcode', $request->bar_code)->update($newitem);
                return Response::json(array('success' => 200));
            } elseif ($barcodeExist == null) {
                $newitem = new D_Purchase();
                $newitem->d_barcode = $request->bar_code;
                $newitem->d_wt =  $request->d_wt;
                $newitem->s_id =  $request->s_id;
                $newitem->c_id = $c_id;
                $newitem->status = 1;
                $newitem->bill_date = $request->bill_date;
                $newitem->shape_id = $request->shape_id;
                try {
                    $json_data = rate_master::where('rate_masters.s_id', $s_id)->first();
                    $json_decoded = json_decode($json_data['json_price']);
                    foreach ($json_decoded[0] as $key => $val) {
                        $r_id = $key;
                        $wt_category = rate::where([['c_id', $c_id], ['r_id', $r_id]])->first();
                        $wt_category = $wt_category['wt_category'];
                        $value = explode('-', $wt_category);
                        if ($value[0] <= $d_wt && $value[1] >= $d_wt) {
                            if ($json_data['rate_cat_pcs'] != null) {
                                $findWtCat = $json_data['rate_cat_pcs'];
                                if ($findWtCat == $key) {
                                    $newitem->d_wt_category = $key;
                                    $newitem->price = $val;
                                } else {
                                    $newitem->d_wt_category = $key;
                                    $d_wt = $request->d_wt;
                                    $price = $val * $d_wt;
                                    $newitem->price = $price;
                                }
                            } else {
                                $newitem->d_wt_category = $key;
                                $d_wt = $request->d_wt;
                                $price = $val * $d_wt;
                                $newitem->price = $price;
                            }

                            $count = 1;
                            break;
                        }
                    }
                    if ($count == 0) {
                        return Response::json(array('success' => 311));
                    }
                } catch (\Throwable $th) {
                    return Response::json(array('success' => 311));
                }
                $newitem->save();
                // dd($newitem);
                return Response::json(array('success' => 200));
            } else {
                if ($barcodeExist['s_id'] ==  $request->s_id) {
                    return Response::json(array('success' => 320));
                } else {
                    return Response::json(array('success' => 312));
                }
            }
        } catch (\Throwable $th) {
            return Response::json(array('success' => 408));
        }
    }
    public function edit(Request $request)
    {
        $where = array('d_id' => $request->id);
        $data['Diamond']  = D_Purchase::where($where)->first();

        // return Response()->json($Diamond);
        //dd($id);
        // $data = array();
        // $data['supplier'] = D_Purchase::findOrFail($id);
        // return Response::json(array('success' => $data));
        return view('Diamond_Purchase.edit', $data);
    }
    public function update(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'bar_code' => 'required',
                'd_wt' => 'required',
                'shape_id' => 'required',
                's_name' => 'required',
            ]);
            //dd($request);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput($request->all());
            }

            $s_id = $request->s_name;
            $d_wt = $request->d_wt;
            $c_id = session()->get('c_id');
            $newitem = array();
            $newitem['d_barcode'] =  $request->bar_code;
            $newitem['d_wt'] =  $request->d_wt;
            $newitem['s_id'] = $s_id;
            $newitem['c_id'] = $c_id;
            $newitem['bill_date'] = $request->bill_date;
            $newitem['shape_id'] = $request->shape_id;
            $json_data = rate_master::where('rate_masters.s_id', $s_id)->first();
            $json_decoded = json_decode($json_data['json_price']);
            foreach ($json_decoded[0] as $key => $val) {
                $r_id = $key;
                $wt_category = rate::where([['c_id', $c_id], ['r_id', $r_id]])->get();
                $wt_category = $wt_category[0]['wt_category'];
                $value = explode('-', $wt_category);
                // $first_value = substr($wt_category, 0, 5);
                // $last_value = substr($wt_category, -5);
                if ($value[0] <= $d_wt && $value[1] >= $d_wt) {
                    $newitem['d_wt_category'] = $key;
                    $newitem['price'] = $val;
                }
            }
            // dd($newitem);
            D_Purchase::where('d_id', $id)->update($newitem);

            return Redirect::to('/diamond');
        } catch (\Throwable $th) {
            $notification = array(
                'message' => 'User can`t Update!',
                'alert-type' => 'error'
            );

            return Redirect::to('/diamond')->with($notification);
        }
    }
    public function destroy($id)
    {
        //
        $dimond = D_Purchase::find($id);
        $dimond->delete();
        $notification = array(
            'message' => 'User Deleted!',
            'alert-type' => 'success'
        );

        return Redirect::to('/diamond')->with($notification);
    }
}