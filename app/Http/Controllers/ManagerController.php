<?php

namespace App\Http\Controllers;

use App\Models\DPurchase;
use App\Models\SupplierDetails;
use App\Models\ManagerDetails;
use App\Models\ReadyStock;
use App\Models\WorkingStock;
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
        $data['manager'] = ManagerDetails::where('c_id', $c_id)->get();
        return view('manager_details.index', $data);
    }

    public function create()
    {
        return view('manager_details.create');
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'm_name' => 'required',
            'm_address' => 'required',
            'm_email' => 'required|email',
            'm_phone' => 'required|min:11|numeric',

        ]);
        if ($validator->fails()) {
            return Response::json(array('success' => false));
        }
        try {
            $email = $request->m_email;
            $c_id = session()->get('c_id');
            $manager = ManagerDetails::where('m_email', $email)->first();
            if (empty($manager)) {
                $newitem = new ManagerDetails();
                $newitem->c_id = $c_id;
                $newitem->m_name = !empty($request->m_name) ? $request->m_name : '';
                $newitem->m_address = !empty($request->m_address) ? $request->m_address : '';
                $newitem->m_email = !empty($request->m_email) ? $request->m_email : '';
                $newitem->m_phone = !empty($request->m_phone) ? $request->m_phone : '';
                $newitem->status = 1;
                $newitem->save();
                return Response::json(array('success' => 200));
            } else {
                return Response::json(array('success' => 312));
            }
        } catch (\Throwable $th) {
            return Response::json(array('success' => 408));
        }
    }

    // supplier edit
    public function edit($id)
    {
        //dd($id);
        $data = array();
        $data['manager'] = ManagerDetails::findOrFail($id);
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
                'm_phone' =>  'required|min:11|numeric',

            ]);            //dd($request);
            // if ($validator->fails()) {
            //     return redirect()->back()->withErrors($validator)->withInput($request->all());
            // }
            // dd("hello");

            $newitem = array();
            $newitem['m_name'] = !empty($request->m_name) ? $request->m_name : '';
            $newitem['m_address'] = !empty($request->m_address) ? $request->m_address : '';
            $newitem['m_email'] = !empty($request->m_email) ? $request->m_email : '';
            $newitem['m_phone'] = !empty($request->m_phone) ? $request->m_phone : '';


            ManagerDetails::where('m_id', $id)->update($newitem);

            return Redirect::to('/manager');
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
        $suplier = ManagerDetails::find($id);
        $suplier->delete();
        // $ReadyStock = ReadyStock::where('m_id', $id)->get();
        // foreach ($ReadyStock as $value) {
        //     $value->delete();
        // }
        // // $ReadyStock->delete();
        // $working_stock = Working_Stock::where('m_id', $id)->get();
        // foreach ($working_stock as $value) {
        //     $value->delete();
        // }
        // $working_stock->delete();
        $notification = array(
            'message' => 'User Deleted!',
            'alert-type' => 'success'
        );

        return Redirect::to('/manager')->with($notification);
    }
    public function edit_data($id)
    {
        $c_id = session()->get('c_id');
        // $isActive = "awese";
        $isActive = $_GET['isActive'];
        // $m_id = $_GET['m_id'];
        $m_id = $id;
        if ($isActive == 1) {
            ManagerDetails::where([['c_id', $c_id], ['m_id', $m_id]])->update(['status' => 0]);
        } else {
            ManagerDetails::where([['c_id', $c_id], ['m_id', $m_id]])->update(['status' => 1]);
        }

        // dd("hello");
        // print_r("hello");
        // return redirect('/manager');
        return Response::json(array('success' => true));
    }
}
