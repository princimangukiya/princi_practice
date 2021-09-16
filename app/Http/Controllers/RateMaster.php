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
        $data['rates'] = rate_master::join('supplier_details', 'rate_masters.s_id', '=', 'supplier_details.s_id')
            ->get(['rate_masters.*', 'supplier_details.s_name']);
        // $data_json =rate_master::where('s_id',$r_id)
        //         ->select('json_price')
        //         ->get();
        // $data['supplier'] = json_decode($data_json);
        // echo $data['supplier'];
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
        $firstTimeData = ["1"=>[$r_id => $price]];
        
        $c_id = session()->get('c_id');
        $s_id = $request->s_id;
        $data = rate_master::where([['c_id', $c_id] , ['s_id', $s_id]])->get();
        $new_rate = new rate_master();
    if($data->isEmpty())
    {
        $new_rate->c_id  = $c_id;
        $new_rate->s_id = $s_id;
        $arrValuesJson = array_values($firstTimeData);
        $new_rate->json_price = json_encode($arrValuesJson);
        $new_rate->save();
        return Redirect::to('/rate_master');
    }      
    else{
        foreach($data as $rateData){
            $json_data= $rateData['json_price'];
            $someArray = json_decode($json_data, true);
            if(empty($someArray[0][$r_id])){
                array_push($someArray, $data1);
                $arrValuesJson = array_values($someArray);
                $json_data2 = json_encode($arrValuesJson);
                rate_master::where([['c_id', $c_id] , ['s_id', $s_id]])->update(['json_price' => $json_data2]);
                return Redirect::to('/rate_master');
            }
            else{
            $someArray[0][$r_id] = $price;
            $json_data2 = json_encode($someArray);
            rate_master::where([['c_id', $c_id] , ['s_id', $s_id]])->update(['json_price' => $json_data2]);
            return Redirect::to('/rate_master');

            }
        }
    }  
       
    }
    public function rates_store(Request $request)
    {

       
        $rate= new rate();
        $rate->wt_category = $request->Rates;
        $rate->save();
        return Redirect::to('/rate_master/create');
    }
    public function edit($id)
    {
        //dd($id);
        $data = array();
        $data['supplier'] = rate_master::findOrFail($id);
        return view('Rate_Master.edit', $data);
    }
    public function update(Request $request, $id)
    {

        // try {
        //     $validator = Validator::make($request->all(), [
        //         's_name' => 'required',
        //         's_address' => 'required',
        //         's_gst' => 'required|unique:supplier_details,s_gst',

        //     ]);
        //     //dd($request);
        //     if ($validator->fails()) {
        //         return redirect()->back()->withErrors($validator)->withInput($request->all());
        //     }

        $newitem = array();
        // $newitem['s_name'] = !empty($request->C_name) ? $request->s_name : '';
        $newitem['r_id'] = !empty($request->r_id) ? $request->r_id : '';
        $newitem['Price'] = !empty($request->Price) ? $request->Price : '';

        rate_master::where('Rate_id', $id)->update($newitem);
        // $notification = array(
        //     'message' => 'User Updated!',
        //     'alert-type' => 'success'
        // );

        //     return Redirect::to('/rate_master')->with($notification);
        // } catch (\Throwable $th) {
        //     $notification = array(
        //         'message' => 'User can`t Update!',
        //         'alert-type' => 'error'
        //     );

        return Redirect::to('/rate_master');
        // }
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