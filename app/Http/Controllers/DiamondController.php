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
        $c_id = session()->get('c_id');
        $data = array();
        $data['diamond'] = D_Purchase::where('c_id', $c_id)->with('shapeDate', 'supplier')->get();
        return view('Diamond_purchase.index', $data);
    }

    public function create()
    {
        $c_id = session()->get('c_id');
        $data = array();
        $data['supplier'] = Supplier_Details::where('c_id', $c_id)->get();
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
                //$newitem->d_col = !empty($request->d_col) ? $request->d_col : '';
                //$newitem->d_pc = !empty($request->d_pc) ? $request->d_pc : '';
                $newitem->shape_id = !empty($request->shape_id) ? $request->shape_id : '';
                //$newitem->d_cla = !empty($request->d_cla) ? $request->d_cla : '';
                //$newitem->d_exp_pr = !empty($request->d_exp_pr) ? $request->d_exp_pr : '';
                //$newitem->d_exp = !empty($request->d_exp) ? $request->d_exp : '';
                $newitem->save();

                return Response::json(array('success' => true));
            } else {
                return Response::json(array('success' => 200));
            }
        } catch (\Throwable $th) {
            return Response::json(array('success' => false));
        }
    }
}
