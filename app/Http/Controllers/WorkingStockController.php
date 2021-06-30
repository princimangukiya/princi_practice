<?php

namespace App\Http\Controllers;

use App\Models\D_Purchase;
use App\Models\Working_Stock;
use App\Models\Manager_Details;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Response;
use Illuminate\Validation\Rule;

class WorkingStockController extends Controller
{
    public function index()
    {
        $data = array();
        $data['working_stock'] = Working_Stock::with('Manager','Diamond')->get();
        return view('working_stock.index',$data);
    }

    public function create()
    {
        $data = array();
        $data['manager'] = Manager_Details::get();
        return view('working_stock.given',$data);
    }

    public function store(Request $request)
    {
        
        try {
            $validator = Validator::make($request->all(), [
                'bar_code' => 'required|unique:Working_Stock,d_barcode',
                'm_id' => 'required',

            ]);            //dd($request);
            if ($validator->fails()) {
                return Response::json(array('success' => false));
            }
            //dd($request);
            $DiamondData = D_Purchase::where('d_barcode',$request->bar_code)->first();

            if($DiamondData == null){
                return Response::json(array('success' => 200));
            }
            else{
                $newitem = new Working_Stock();
                $newitem->d_id = !empty($DiamondData->d_id) ? $DiamondData->d_id : '';
                $newitem->m_id = !empty($request->m_id) ? $request->m_id : '';
                $newitem->d_barcode = !empty($request->bar_code) ? $request->bar_code : '';
                $newitem->save();
    
                return Response::json(array('success' => true));
            }   
        } catch (\Throwable $th) {
            return Response::json(array('success' => false));
        }
    }

    // supplier delete
    public function destroy($id)
    {
        //
        $stock = Working_Stock::find($id);
        $stock->delete();
        $notification = array(
            'message' => 'User Deleted!',
            'alert-type' => 'success'
        );

        return Redirect::to('/working_stock')->with($notification);

    }
}
