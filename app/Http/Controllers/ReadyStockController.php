<?php

namespace App\Http\Controllers;

use App\Models\D_Purchase;
use App\Models\Working_Stock;
use App\Models\Ready_Stock;
use App\Models\Manager_Details;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\Rule;


class ReadyStockController extends Controller
{
    public function index()
    {
        $data = array();
        $c_id = session()->get('c_id');
        $data['ready_stock'] = Ready_Stock::where('c_id', $c_id)->with('Manager','Diamond')->get();
        return view('ready_stock.index',$data);
    }

    public function create()
    {
        $data = array();
        $c_id = session()->get('c_id');
        $data['manager'] = Manager_Details::where('c_id', $c_id)->get();
        return view('ready_stock.return',$data);
    }

    public function store(Request $request)
    {
        
       // try {
            $validator = Validator::make($request->all(), [
                'bar_code' => 'required|unique:Ready_Stock,d_barcode',
                'm_id' => 'required',

            ]);            //dd($request);
            if ($validator->fails()) {
                return Response::json(array('success' => false));
            }
            //dd($request);
            $DiamondData = Working_Stock::where('d_barcode',$request->bar_code)->first();

            if($DiamondData == null && $DiamondData->m_id != $request->m_id){
                return Response::json(array('success' => 200));
            }
            else{
                $c_id = session()->get('c_id');
                $newitem = new Ready_Stock();
                $newitem->d_id = !empty($DiamondData->d_id) ? $DiamondData->d_id : '';
                $newitem->m_id = !empty($request->m_id) ? $request->m_id : '';
                $newitem->c_id = $c_id;
                $newitem->d_barcode = !empty($request->bar_code) ? $request->bar_code : '';
                $newitem->save();
    
                D_Purchase::where('d_id',$DiamondData->d_id)->update(['doReady' => $request->m_id, 'isReady' => 1]);

                $stockdelete = Working_Stock::find($DiamondData->w_id);
                $stockdelete->delete();
                return Response::json(array('success' => true));
            }   
       /* } catch (\Throwable $th) {
            return Response::json(array('success' => false));
        }*/
    }

    // supplier delete
    public function destroy($id)
    {
        //
        $stock = Ready_Stock::find($id);
        $stock->delete();
        $notification = array(
            'message' => 'User Deleted!',
            'alert-type' => 'success'
        );

        return Redirect::to('/ready_stock')->with($notification);

    }
}
