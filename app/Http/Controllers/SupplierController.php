<?php

namespace App\Http\Controllers;

use App\Models\d_purchase;
use App\Models\supplier_details;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class SupplierController extends Controller
{
    public function index()
    {
        $data = array();
        $data['supplier'] = supplier_details::get();
        return view('supplier_details.index',$data);
    }

    public function create()
    {
        return view('supplier_details.create');
    }

    public function store(Request $request)
    {
        
        try {
            $validator = Validator::make($request->all(), [
                's_name' => 'required',
                's_address' => 'required',
                's_gst' => 'required|unique:supplier_details,s_gst',

            ]);
            //dd($request);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput($request->all());
            }

            $newitem = new supplier_details();
            $newitem->s_name = !empty($request->s_name) ? $request->s_name : '';
            $newitem->s_address = !empty($request->s_address) ? $request->s_address : '';
            $newitem->s_gst = !empty($request->s_gst) ? $request->s_gst : '';
            $newitem->save();

            return Redirect::to('/supplier')->with($notification);
        } catch (\Throwable $th) {
            $notification = array(
                'message' => 'User can`t Add!',
                'alert-type' => 'success'
            );

            return Redirect::to('/supplier')->with($notification);
        }
    }

    // supplier edit
    public function edit($id)
    {
        //dd($id);
        $data = array();
        $data['supplier']=supplier_details::findOrFail($id);
        return view('supplier_details.edit', $data);
    }

    // user update
    public function update(Request $request, $id)
    {

        try {
            $validator = Validator::make($request->all(), [
                's_name' => 'required',
                's_address' => 'required',
                's_gst' => 'required',

            ]);
            //dd($request);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput($request->all());
            }

            $newitem = array();
            $newitem['s_name'] = !empty($request->s_name) ? $request->s_name : '';
            $newitem['s_address'] = !empty($request->s_address) ? $request->s_address : '';
            $newitem['s_gst'] = !empty($request->s_gst) ? $request->s_gst : '';

            supplier_details::where('s_id',$id)->update($newitem);

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
        $suplier = supplier_details::find($id);
        $suplier->delete();
        $notification = array(
            'message' => 'User Deleted!',
            'alert-type' => 'success'
        );

        return Redirect::to('/supplier')->with($notification);

    }
}
