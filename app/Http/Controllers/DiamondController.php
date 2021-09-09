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

use Illuminate\Support\Facades\Response;
use Illuminate\Validation\Rule;

class DiamondController extends Controller
{
    public function index()
    {
       
        $data = array();
        $c_id = session()->get('c_id');
        $data['diamond'] = D_Purchase::where('c_id', $c_id)->with('shapeDate', 'supplier')->get();
        return view('Diamond_purchase.index', $data);
    }

    public function create()
    {
        
        $data = array();
        $c_id = session()->get('c_id');
        // $data['supplier'] = D_Purchase::where('c_id', $c_id)->get();
        $data['supplier'] = Supplier_Details::where('c_id', $c_id)->get();
        $data['supplier']= D_Purchase::join('supplier_details', 'D_Purchase.s_id', '=', 'supplier_details.s_id')
        ->join('diamond_shape', 'd_purchase.shape_id', '=', 'diamond_shape.shape_id')
        ->get(['D_Purchase.*', 'supplier_details.*', 'diamond_shape.*']);
        return view('Diamond_purchase.create', $data);
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'bar_code' => 'required',
                'd_wt' => 'required',
                'shape_id' => 'required',
                's_id' => 'required' 

            ]);            //dd($request);
            if ($validator->fails()) {
                return Response::json(array('success' => false));
            }

            $barcodeExist = D_Purchase::where('d_barcode', $request->bar_code)->first();

            if ($barcodeExist == null) {
                //dd($request);
                $c_id = session()->get('c_id');
                $newitem = new D_Purchase();
                $newitem->d_barcode = !empty($request->bar_code) ? $request->bar_code : '';
                $newitem->d_wt = !empty($request->d_wt) ? $request->d_wt : '';
                $newitem->s_id = !empty($request->s_id) ? $request->s_id : '';
                $newitem->c_id = $c_id;
                $new_date= $request->bill_date;
                $newDate = \Carbon\Carbon::createFromFormat('Y-m-d', $new_date)
                ->format('d/m/Y');
                dd($newDate);
                $newitem->bill_date = $newDate;
                //$newitem->d_col = !empty($request->d_col) ? $request->d_col : '';
                //$newitem->d_pc = !empty($request->d_pc) ? $request->d_pc : '';
                $newitem->shape_id = !empty($request->shape_id) ? $request->shape_id : '';
                //$newitem->d_cla = !empty($request->d_cla) ? $request->d_cla : '';
                //$newitem->d_exp_pr = !empty($request->d_exp_pr) ? $request->d_exp_pr : '';
                //$newitem->d_exp = !empty($request->d_exp) ? $request->d_exp : '';
                $newitem->save();
                // dd($newitem);
                return Response::json(array('success' => true));
            } else {
                return Response::json(array('success' => 200));
            }
        } catch (\Throwable $th) {
            return Response::json(array('success' => false));
        }
    }
    public function edit($id)
    {
        //dd($id);
        $data = array();
        $data['supplier'] = D_Purchase::findOrFail($id);
        return view('Diamond_Purchase.edit', $data);
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

        $c_id = session()->get('c_id');
        $newitem = new D_Purchase();
        $newitem->d_barcode = !empty($request->bar_code) ? $request->bar_code : '';
        $newitem->d_wt = !empty($request->d_wt) ? $request->d_wt : '';
        $newitem->s_id = !empty($request->s_id) ? $request->s_id : '';
        $newitem->c_id = $c_id;
        //$newitem->d_col = !empty($request->d_col) ? $request->d_col : '';
        //$newitem->d_pc = !empty($request->d_pc) ? $request->d_pc : '';
        $newitem->shape_id = !empty($request->shape_id) ? $request->shape_id : '';
        //$newitem->d_cla = !empty($request->d_cla) ? $request->d_cla : '';
        //$newitem->d_exp_pr = !empty($request->d_exp_pr) ? $request->d_exp_pr : '';
        //$newitem->d_exp = !empty($request->d_exp) ? $request->d_exp : '';
        D_Purchase::where('d_id', $id)->update($newitem);

        return Redirect::to('/diamond/create');
        // }
    }
    public function destroy($id)
    {
        //
        $dimond = D_Purchase::find($id);
        $dimond->delete();
        $notification = array(
            'message' => 'User Deleted!',
            'alert-type' => 'success'
        );

        return Redirect::to('/diamond')->with($notification);
    }
}