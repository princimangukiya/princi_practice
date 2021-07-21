<?php

namespace App\Http\Controllers;

use App\Models\D_Purchase;
use App\Models\Supplier_Details;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

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

            
            $c_id = session()->get('c_id');
            $newitem = new Supplier_Details();
            $newitem->s_name = !empty($request->s_name) ? $request->s_name : '';
            $newitem->c_id = $c_id;
            $newitem->s_address = !empty($request->s_address) ? $request->s_address : '';
            $newitem->s_gst = !empty($request->s_gst) ? $request->s_gst : '';
            $newitem->save();

            return Redirect::to('/supplier');
        } catch (\Throwable $th) {
            $notification = array(
                'message' => 'User can`t Add!',
                'alert-type' => 'success'
            );

            return Redirect::to('/supplier');
        }
    }

    // supplier edit
    public function edit($id)
    {
        //dd($id);
        $data = array();
        $data['supplier']=Supplier_Details::findOrFail($id);
        return view('supplier_details.edit', $data);
    }

    // user update
    public function update(Request $request, $id)
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

            $newitem = array();
            $newitem['s_name'] = !empty($request->s_name) ? $request->s_name : '';
            $newitem['s_address'] = !empty($request->s_address) ? $request->s_address : '';
            $newitem['s_gst'] = !empty($request->s_gst) ? $request->s_gst : '';

            Supplier_Details::where('s_id',$id)->update($newitem);

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
        $suplier = Supplier_Details::find($id);
        $suplier->delete();
        $notification = array(
            'message' => 'User Deleted!',
            'alert-type' => 'success'
        );

        return Redirect::to('/supplier')->with($notification);

    }
}
