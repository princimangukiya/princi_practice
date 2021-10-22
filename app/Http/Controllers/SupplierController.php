<?php

namespace App\Http\Controllers;

use App\Models\D_Purchase;
use App\Models\Supplier_Details;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;

class SupplierController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data = array();
        $c_id = session()->get('c_id');
        //dd($c_id);
        $data['supplier'] = Supplier_Details::where('c_id', $c_id)->get();
        return view('supplier_details.index', $data);
    }

    public function create()
    {
        return view('supplier_details.create');
    }

    public function store(Request $request)
    {


        $validator = Validator::make($request->all(), [
            's_name' => 'required',
            's_address' => 'required',
            's_gst' => 'required|min:15',

        ]);
        //dd($request);
        if ($validator->fails()) {
            return Response::json(array('success' => false));
        }
        try {
            $suppilerData = Supplier_Details::where('s_gst', $request->s_gst)->first();

            if ($suppilerData == null) {
                $c_id = session()->get('c_id');
                $newitem = new Supplier_Details();
                $newitem->s_name = !empty($request->s_name) ? $request->s_name : '';
                $newitem->c_id = $c_id;
                $newitem->s_address = !empty($request->s_address) ? $request->s_address : '';
                $newitem->s_gst = !empty($request->s_gst) ? $request->s_gst : '';
                $newitem->status = 1;
                $newitem->save();

                return Response::json(array('success' => 200));
                // return Response::json(array('success' => true));
            } else {
                return Response::json(array('success' => 312));
            }
        } catch (\Throwable $th) {
            $notification = array(
                'message' => 'User can`t Add!',
                'alert-type' => 'success'
            );

            return Response::json(array('success' => 320));
            // return Response::json(array('success' => false));
        }
    }

    // supplier edit
    public function edit($id)
    {
        //dd($id);
        $data = array();
        $data['supplier'] = Supplier_Details::findOrFail($id);
        return view('supplier_details.edit', $data);
    }

    // user update
    public function update(Request $request, $id)
    {


        $validator = Validator::make($request->all(), [
            's_name' => 'required',
            's_address' => 'required',
            's_gst' => 'required|min:15',

        ]);
        //dd($request);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        try {
            $newitem = array();
            $newitem['s_name'] = !empty($request->s_name) ? $request->s_name : '';
            $newitem['s_address'] = !empty($request->s_address) ? $request->s_address : '';
            $newitem['s_gst'] = !empty($request->s_gst) ? $request->s_gst : '';

            Supplier_Details::where('s_id', $id)->update($newitem);
            $notification = array(
                'message' => 'User Updated!',
                'alert-type' => 'success'
            );

            return Redirect::to('/supplier')->with($notification);
        } catch (\Throwable $th) {
            $notification = array(
                'message' => 'User can`t Update!',
                'alert-type' => 'error'
            );

            return Redirect::to('/supplier')->with($notification);
        }
    }

    // supplier delete
    public function destroy($id)
    {
        //
        $suplier = Supplier_Details::withTrashed()->find($id);
        $suplier->delete();
        // dd($suplier);
        // $time = Carbon::now();
        // Supplier_Details::where('s_id', $id)->update(['deleted_at' => $time]);
        $notification = array(
            'message' => 'User Deleted!',
            'alert-type' => 'success'
        );

        return Redirect::to('/supplier')->with($notification);
        // echo "This Controller";
    }
    public function edit_data($id)
    {
        $c_id = session()->get('c_id');
        // $isActive = "awese";
        $isActive = $_GET['isActive'];
        // $m_id = $_GET['m_id'];
        $s_id = $id;
        if ($isActive == 1) {
            Supplier_Details::where([['c_id', $c_id], ['s_id', $s_id]])->update(['status' => 0]);
        } else {
            Supplier_Details::where([['c_id', $c_id], ['s_id', $s_id]])->update(['status' => 1]);
        }

        // dd("hello");
        // print_r("hello");
        // return redirect('/suplier');
        return Response::json(array('success' => true));
    }
}