<?php

namespace App\Http\Controllers;

use App\Models\d_purchase;
use App\Models\supplier_details;
use App\Models\manager_details;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
class ManagerController extends Controller
{
    public function index()
    {
        $data = array();
        $data['manager'] = manager_details::get();
        return view('manager_details.index',$data);
    }

    public function create()
    {
        return view('manager_details.create');
    }

    public function store(Request $request)
    {
        
        try {
            $validator = Validator::make($request->all(), [
                'm_name' => 'required',
                'm_address' => 'required',
                'm_email' => 'required|email',
                'm_phone' => 'required|unique:manager_details,m_phone',

            ]);
            //dd($request);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput($request->all());
            }

            $newitem = new manager_details();
            $newitem->m_name = !empty($request->m_name) ? $request->m_name : '';
            $newitem->m_address = !empty($request->m_address) ? $request->m_address : '';
            $newitem->m_email = !empty($request->m_email) ? $request->m_email : '';
            $newitem->m_phone = !empty($request->m_phone) ? $request->m_phone : '';
            $newitem->save();

            return Redirect::to('/manager')->with($notification);
        } catch (\Throwable $th) {
            $notification = array(
                'message' => 'User can`t Add!',
                'alert-type' => 'success'
            );

            return Redirect::to('/manager')->with($notification);
        }
    }

    // supplier edit
    public function edit($id)
    {
        //dd($id);
        $data = array();
        $data['manager']=manager_details::findOrFail($id);
        return view('manager_details.edit', $data);
    }

    // user update
    public function update(Request $request, $id)
    {

        try {
            $validator = Validator::make($request->all(), [
                'm_name' => 'required',
                'm_address' => 'required',
                'm_email' => 'required|email',
                'm_phone' => 'required',

            ]);            //dd($request);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput($request->all());
            }

            $newitem = array();
            $newitem['m_name'] = !empty($request->m_name) ? $request->m_name : '';
            $newitem['m_address'] = !empty($request->m_address) ? $request->m_address : '';
            $newitem['m_email'] = !empty($request->m_email) ? $request->m_email : '';
            $newitem['m_phone'] = !empty($request->m_phone) ? $request->m_phone : '';

            manager_details::where('m_id',$id)->update($newitem);

            return Redirect::to('/manager')->with($notification);
        
        } catch (\Throwable $th) {
            $notification = array(
                'message' => 'User can`t Update!',
                'alert-type' => 'error'
            );

            return Redirect::to('/manager')->with($notification);
        }
    }

    // supplier delete
    public function destroy($id)
    {
        //
        $suplier = manager_details::find($id);
        $suplier->delete();
        $notification = array(
            'message' => 'User Deleted!',
            'alert-type' => 'success'
        );

        return Redirect::to('/manager')->with($notification);

    }
}
