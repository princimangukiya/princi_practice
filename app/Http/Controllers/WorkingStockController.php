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
        $c_id = session()->get('c_id');
        $data['working_stock'] = Working_Stock::where('c_id', $c_id)->with('Manager', 'Diamond')->get();
        // echo $data['working_stock'];
        return view('working_stock.index', $data);
    }

    public function create()
    {
        $c_id =  session()->get('c_id');
        $data = array();
        $data['manager'] = Manager_Details::where('c_id', $c_id)->get();
        $data['check'] = 'hello';
        return view('working_stock.given', $data);
    }

    public function store(Request $request)
    {

        try {
            $validator = Validator::make($request->all(), [
                'bar_code' => 'required',
                'm_id' => 'required'

            ]);            //dd($request);
            if ($validator->fails()) {
                return Response::json(array('success' => false));
            }
            //dd($request);
            $c_id = session()->get('c_id');
            $DiamondData = D_Purchase::where('d_barcode', $request->bar_code)->where('c_id', $c_id)->first();

            if ($DiamondData == null) {
                return Response::json(array('success' => 404));
            } else if ($DiamondData->doReady != null) {
                return Response::json(array('success' => 200));
            } else {
                $newitem = new Working_Stock();
                $newitem->d_id = !empty($DiamondData->d_id) ? $DiamondData->d_id : '';
                $newitem->m_id = !empty($request->m_id) ? $request->m_id : '';
                $newitem->c_id = $c_id;
                $newitem->d_barcode = !empty($request->bar_code) ? $request->bar_code : '';
                $newitem->save();

                D_Purchase::where('d_id', $DiamondData->d_id)->update(['doReady' => $request->m_id]);
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