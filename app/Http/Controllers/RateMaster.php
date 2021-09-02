<?php

namespace App\Http\Controllers;
use App\Models\D_Purchase;
use App\Models\rate_master;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;

class RateMaster extends Controller
{
    public function index()
    {

        $data = array();
        $c_id = session()->get('c_id');
        $data['supplier'] = rate_master::where('c_id', $c_id)->get();
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
        //     //dd($request);
        //     if ($validator->fails()) {
        //         return redirect()->back()->withErrors($validator)->withInput($request->all());
        //     }

        //     // if ($validator->fails()) {
        //     //     return Response::json(array('success' => false));
        //     // }

        //     // $suppilerData = Supplier_Details::where('s_gst', $request->s_gst)->first();

        //     // if ($suppilerData == null) {
                $c_id = session()->get('c_id');
                $newrate = new rate_master();
                $newrate->c_id = $c_id;
                $newrate->Rate = !empty($request->Rate1) ? $request->Rate1 : '';
                $newrate->price = !empty($request->price) ? $request->price : '';
                $newrate->save();
                // echo $newrate;

                return Redirect::to('/rate_master');
        //         // return Response::json(array('success' => true));
        //     // } else {
        //     //     return Response::json(array('success' => 200));
        //     // }
        // } catch (\Throwable $th) {
        //     $notification = array(
        //         'message' => 'Rate can`t Add!',
        //         'alert-type' => 'success'
        //     );

            // return Redirect::to('/rate_master');
        //     // return Response::json(array('success' => false));
        // }
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
            $newitem['Rate'] = !empty($request->Rate) ? $request->Rate : '';
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
    public function destroy($id)
    {
        //
        $suplier = rate_master::find($id);
        $suplier->delete();
        $notification = array(
            'message' => 'User Deleted!',
            'alert-type' => 'success'
        );

        return Redirect::to('/rate_master')->with($notification);
    }
}