<?php

namespace App\Http\Controllers;

use App\Models\d_purchase;
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
        $data['diamond'] = d_purchase::with('Shape_Date')->get();
        return view('Diamond_purchase.index',$data);
    }

    public function create()
    {
        return view('Diamond_purchase.create');
    }

    public function store(Request $request)
    {
        
        try {
            $validator = Validator::make($request->all(), [
                'bar_code' => 'required|unique:d_purchase,d_barcode',
                'd_wt' => 'required',
                'shape_id' => 'required'

            ]);            //dd($request);
            if ($validator->fails()) {
                return Response::json(array('success' => false));
            }
            //dd($request);
            $newitem = new d_purchase();
            $newitem->d_barcode = !empty($request->bar_code) ? $request->bar_code : '';
            $newitem->d_wt = !empty($request->d_wt) ? $request->d_wt : '';
            //$newitem->d_col = !empty($request->d_col) ? $request->d_col : '';
            //$newitem->d_pc = !empty($request->d_pc) ? $request->d_pc : '';
            $newitem->shape_id = !empty($request->shape_id) ? $request->shape_id : '';
            //$newitem->d_cla = !empty($request->d_cla) ? $request->d_cla : '';
            //$newitem->d_exp_pr = !empty($request->d_exp_pr) ? $request->d_exp_pr : '';
            //$newitem->d_exp = !empty($request->d_exp) ? $request->d_exp : '';
            $newitem->save();

            return Response::json(array('success' => true));
        } catch (\Throwable $th) {
            return Response::json(array('success' => false));
        }
    }
}
