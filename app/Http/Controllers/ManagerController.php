<?php

namespace App\Http\Controllers;

use App\Models\D_Purchase;
use App\Models\Supplier_Details;
use App\Models\Manager_Details;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;

class ManagerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data = array();
        $c_id = session()->get('c_id');
        $data['manager'] = Manager_Details::where('c_id', $c_id)->get();
        return view('manager_details.index', $data);
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
                'm_email' => 'required|email|unique:Manager_Details,m_email',
                'm_phone' => 'required',

            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput($request->all());
            }
            //dd($request);
            // if ($validator->fails()) {
            //     return Response::json(array('success' => false));
            // }
            // $managerData = Manager_Details::where('m_phone', $request->m_phone)->first();

            // if ($managerData == null) {
                $c_id = session()->get('c_id');
                $newitem = new Manager_Details();
                $newitem->c_id = $c_id;
                $newitem->m_name = !empty($request->m_name) ? $request->m_name : '';
                $newitem->m_address = !empty($request->m_address) ? $request->m_address : '';
                $newitem->m_email = !empty($request->m_email) ? $request->m_email : '';
                $newitem->m_phone = !empty($request->m_phone) ? $request->m_phone : '';
                $newitem->save();

                // return Response::json(array('success' => true));
                return Redirect::to('/manager');
            // } else {
            //     return Response::json(array('success' => 200));
            // }
        } catch (\Throwable $th) {
            $notification = array(
                'message' => 'Suppiler can`t Add!',
                'alert-type' => 'success'
            );

            return Redirect::to('/manager');
            // return Response::json(array('success' => false));
        }
    }

    // supplier edit
    public function edit($id)
    {
        //dd($id);
        $data = array();
        $data['manager'] = Manager_Details::findOrFail($id);
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
                'm_phone' => 'required|unique:manager_details,m_phone',

            ]);            //dd($request);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput($request->all());
            }

            $newitem = array();
            $newitem['m_name'] = !empty($request->m_name) ? $request->m_name : '';
            $newitem['m_address'] = !empty($request->m_address) ? $request->m_address : '';
            $newitem['m_email'] = !empty($request->m_email) ? $request->m_email : '';
            $newitem['m_phone'] = !empty($request->m_phone) ? $request->m_phone : '';

            Manager_Details::where('m_id', $id)->update($newitem);

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
        $suplier = Manager_Details::find($id);
        $suplier->delete();
        $notification = array(
            'message' => 'User Deleted!',
            'alert-type' => 'success'
        );

        return Redirect::to('/manager')->with($notification);
    }
}
