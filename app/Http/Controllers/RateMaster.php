<?php

namespace App\Http\Controllers;

use App\Models\rate_master;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\rate;

class RateMaster extends Controller
{
    public function index()
    {

        $data = array();
        $c_id = session()->get('c_id');
        $data['rates'] = rate_master::where('c_id', $c_id)->get();
        $data['supplier_name'] = rate_master::join('supplier_details', 'rate_masters.s_id', '=', 'supplier_details.s_id')
            ->where('supplier_details.c_id', $c_id)
            ->get(['supplier_details.*']);
        return view('Rate_Master.index', $data);
    }
    public function create()
    {
        return view('Rate_Master.create');
    }
    public function store(Request $request)
    {
        $r_id = $request->r_id;
        $price = $request->price;
        $data1 = [$r_id => $price];
        $firstTimeData = ["1" => [$r_id => $price]];

        $c_id = session()->get('c_id');
        $s_id = $request->s_id;
        $data = rate_master::where([['c_id', $c_id], ['s_id', $s_id]])->get();
        $new_rate = new rate_master();
        if ($data->isEmpty()) {
            $new_rate->c_id  = $c_id;
            $new_rate->s_id = $s_id;
            $arrValuesJson = array_values($firstTimeData);
            $new_rate->json_price = json_encode($arrValuesJson);
            $new_rate->save();
            return Redirect::to('/rate_master');
        } else {
            foreach ($data as $rateData) {
                $json_data = $rateData['json_price'];
                $someArray = json_decode($json_data, true);
                $decodedRate = $someArray[0];
                // $mergeArr = array_merge($decodedRate, $data1);
                // $decodedRate
                // array_push($decodedRate, $data1);
                // dd($mergeArr);
                if (empty($someArray[0][$r_id])) {
                    // $decodedRate = [5 => "101", 6 => "103"];
                    // $mergeArr = array_merge($decodedRate, $data1);
                    // dd($mergeArr);
                    array_push($someArray, $data1);
                    // $arrValuesJson = array_values($someArray);
                    $json_data2 = json_encode($someArray);
                    $newJsonData = str_replace('},{', ',', $json_data2);
                    // dd($newJsonData);
                    // var_dump(trim($json_data2[19]));
                    // var_dump(trim($json_data2[21]));
                    // echo $json_data2[0];

                    rate_master::where([['c_id', $c_id], ['s_id', $s_id]])->update(['json_price' => $newJsonData]);
                    return Redirect::to('/rate_master');
                } else {
                    $someArray[0][$r_id] = $price;
                    $json_data2 = json_encode($someArray);
                    $newJsonData = str_replace('},{', ',', $json_data2);
                    rate_master::where([['c_id', $c_id], ['s_id', $s_id]])->update(['json_price' => $newJsonData]);
                    return Redirect::to('/rate_master');
                }
            }
        }
    }
    public function rates_store(Request $request)
    {
        $rate = new rate();
        $first_range = $request->firstRange;
        $last_range = $request->lastRange;
        echo $first_range;
        echo $last_range;
        // $rate->save();
        // return Redirect::to('/rate_master/create');
    }
    public function edit($id)
    {
        //dd($id);
        $data = array();
        $data['rate_master'] = rate_master::findOrFail($id);
        $data['price'] = $data['rate_master']['json_price'];
        echo $data['price'];
        return view('Rate_Master.edit', $data);
    }
    public function update(Request $request, $id)
    {
        $r_id = $request->r_id;
        $price = $request->Price;
        $data1 = [$r_id => $price];
        $c_id = session()->get('c_id');
        $s_id = $request->s_id;
        $data = rate_master::where([['Rate_id', $id]])->get();
        // var_dump($data1);
        foreach ($data as $rateData) {
            $json_data = $rateData['json_price'];
            $someArray = json_decode($json_data, true);
            // var_dump($someArray[0][$r_id]);
            if (empty($someArray[0][$r_id])) {
                array_push($someArray, $data1);
                $arrValuesJson = array_values($someArray);
                $json_data2 = json_encode($arrValuesJson);
                rate_master::where([['Rate_id', $id]])->update(['json_price' => $json_data2]);
                return Redirect::to('/rate_master');
            } else {
                $someArray[0][$r_id] = $price;
                $json_data2 = json_encode($someArray);
                rate_master::where([['Rate_id', $id]])->update(['json_price' => $json_data2]);
                return Redirect::to('/rate_master');
            }
        }
    }
    // public function destroy($id)
    // {
    //     //
    //     $suplier = rate_master::find($id);
    //     $suplier->delete();
    //     $notification = array(
    //         'message' => 'User Deleted!',
    //         'alert-type' => 'success'
    //     );

    //     return Redirect::to('/rate_master')->with($notification);
    // }
}