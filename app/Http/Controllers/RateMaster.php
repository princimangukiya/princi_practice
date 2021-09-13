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
        $r_id = session()->get('c_id');
        $data['supplier'] = rate_master::where('s_id', $r_id)->get();
        $data['supplier'] = rate_master::join('supplier_details', 'rate_masters.s_id', '=', 'supplier_details.s_id')
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

        // try {
        //     $validator = Validator::make($request->all(), [
        //         'Rate' => 'rate',
        //         'price' => 'required|unique:supplier_details,price',

        //     ]);
        //     dd($request);
        //     if ($validator->fails()) {
        //         return redirect()->back()->withErrors($validator)->withInput($request->all());
        //     }

        //     if ($validator->fails()) {
        //         return Response::json(array('success' => false));
        //     }

        //     $suppilerData = Supplier_Details::where('s_gst', $request->s_gst)->first();

        //     if ($suppilerData == null) {
        $s_id = session()->get('s_id');
        $data['supplier'] = rate_master::where('s_id', $s_id)->get();
        $new_rate = new rate_master();
        $supplier_id = $request->s_id;
        $data_s_id = $new_rate->s_id;
        // $data_s_id = $new_rate->s_id;
        $data = $request->only('r_id', 'price');
        $data_json = rate_master::find($supplier_id)->get('rate_masters.json_price');
        $data = $request->only('r_id', 'price');
        if ($supplier_id == $data_s_id) 
        {
            $r_id = rate_master::where('s_id', $supplier_id)->select('Rate_id')->get();
            $data_json = rate_master::where('s_id', $supplier_id)->select('json_price')->get();
            $json_data = json_decode($data_json);
            array_push($json_data, $data);
            $json_data = json_encode($json_data);
            //        echo '<br>';
            //    echo $json_data;
            rate_master::where('r_id', $r_id)->update($json_data);
            $new_rate->json_price = $json_data;

        } 
        
        else {
            $new_rate->s_id = !empty($request->s_id) ? $request->s_id : '';
            $new_rate->json_price = json_encode($data);
        }
        echo "<br>";
        echo "<br>";
        // echo $newrate;
        // $new_rate->save();
        return Redirect::to('/rate_master');
        //         return Response::json(array('success' => true));
        //     } else {
        //         return Response::json(array('success' => 200));
        //     }
        // } catch (\Throwable $th) {
        //     $notification = array(
        //         'message' => 'Rate can`t Add!',
        //         'alert-type' => 'success'
        //     );
        // return Redirect::to('/rate_master');
        // return Response::json(array('success' => false));
        // }
    }
    public function rates_store(Request $request)
    {

       
        $rate= new rate();
        $rate->Rates = $request->Rates;
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