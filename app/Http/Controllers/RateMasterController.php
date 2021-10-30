<?php

namespace App\Http\Controllers;

use App\Models\RateMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Rate;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Carbon;

class RateMasterController extends Controller
{
    public function index()
    {

        $data = array();
        $c_id = session()->get('c_id');
        $data['rates'] = RateMaster::where('c_id', $c_id)->get();
        $data['supplier_name'] = RateMaster::join('supplier_details', 'rate_masters.s_id', '=', 'supplier_details.s_id')
            ->where('supplier_details.c_id', $c_id)
            ->get(['supplier_details.*']);

        return view('rate_master.index', $data);
    }
    public function create()
    {
        return view('rate_master.create');
    }
    public function store(Request $request)
    {
        $r_id = $request->r_id;
        $price = $request->price;
        $data1 = [$r_id => $price];
        $firstTimeData = ["1" => [$r_id => $price]];

        $c_id = session()->get('c_id');
        $s_id = $request->s_id;
        $data = RateMaster::where([['c_id', $c_id], ['s_id', $s_id]])->get();
        $new_rate = new RateMaster();
        if ($data->isEmpty()) {
            $new_rate->c_id  = $c_id;
            $new_rate->s_id = $s_id;
            if ($request->has('wei_Cat')) {
                $new_rate->rate_cat_pcs =  $r_id;
            } else {
                $new_rate->rate_cat_pcs = null;
            }
            $arrValuesJson = array_values($firstTimeData);
            $new_rate->json_price = json_encode($arrValuesJson);
            $new_rate->save();
            return Redirect::to('/rate-master');
        } else {
            if ($data[0]['rate_cat_pcs'] == null) {
                if ($request->has('wei_Cat')) {
                    $new_rate =  $r_id;
                    RateMaster::where([['c_id', $c_id], ['s_id', $s_id]])->update(['rate_cat_pcs' => $new_rate]);
                }
            }

            foreach ($data as $rateData) {
                $json_data = $rateData['json_price'];
                $someArray = json_decode($json_data, true);
                $decodedRate = $someArray[0];
                if (empty($someArray[0][$r_id])) {
                    array_push($someArray, $data1);
                    $json_data2 = json_encode($someArray);
                    $newJsonData = str_replace('},{', ',', $json_data2);
                    RateMaster::where([['c_id', $c_id], ['s_id', $s_id]])->update(['json_price' => $newJsonData]);
                    return Redirect::to('/rate-master');
                } else {
                    $someArray[0][$r_id] = $price;
                    $json_data2 = json_encode($someArray);
                    $newJsonData = str_replace('},{', ',', $json_data2);
                    RateMaster::where([['c_id', $c_id], ['s_id', $s_id]])->update(['json_price' => $newJsonData]);
                    return Redirect::to('/rate-master');
                }
            }
        }
    }
    public function rates_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstRange' => 'required',
            'lastRange' => 'required',
        ]);            //dd($request);
        if ($validator->fails()) {
            return Redirect::to('/rate-master/create');
        }
        $c_id = session()->get('c_id');
        $rate = new Rate();
        $rate->c_id = $c_id;
        $first_range = $request->firstRange;
        $last_range = $request->lastRange;
        $rates = $first_range . "-" . $last_range;
        $rate->wt_category = $rates;
        $rate->save();
        return Redirect::to('/rate-master');
    }
    public function edit($id)
    {
        $data = array();
        $data['rate_master'] = RateMaster::findOrFail($id);
        $data['price'] = $data['rate_master']['json_price'];
        // echo $data['price'];
        return view('rate_master.edit', $data);
    }
    public function update(Request $request, $id)
    {
        $r_id = $request->r_id;
        $price = $request->Price;
        $data1 = [$r_id => $price];
        $c_id = session()->get('c_id');
        $s_id = $request->s_id;
        $data = RateMaster::where('Rate_id', $id)->get();
        // var_dump($data1);
        if ($request->rate_cat_pcs != null) {
            if ($request->rate_cat_pcs == 0) {
                RateMaster::where('Rate_id', $id)->update(['rate_cat_pcs' => null]);
            } else {
                $rate_cat_pcs = $request->rate_cat_pcs;
                RateMaster::where('Rate_id', $id)->update(['rate_cat_pcs' => $rate_cat_pcs]);
            }
        }
        if (!empty($r_id)) {
            foreach ($data as $rateData) {
                $json_data = $rateData['json_price'];
                $someArray = json_decode($json_data, true);
                // var_dump($someArray[0][$r_id]);
                if (empty($someArray[0][$r_id])) {
                    if (!empty($r_id)) {
                        array_push($someArray, $data1);
                        $arrValuesJson = array_values($someArray);
                        $json_data2 = json_encode($arrValuesJson);
                        $newJsonData = str_replace('},{', ',', $json_data2);
                        RateMaster::where([['Rate_id', $id]])->update(['json_price' => $newJsonData]);
                    }
                } else {

                    if (!empty($r_id)) {
                        $someArray[0][$r_id] = $price;
                        $json_data2 = json_encode($someArray);
                        RateMaster::where([['Rate_id', $id]])->update(['json_price' => $json_data2]);
                    }
                }
            }
        }

        return Redirect::to('/rate-master');
    }
    public function destroy($id)
    {
        $rates = RateMaster::where('rate_id', $id)->first('json_price');
        echo $rates;
    }
}