<?php


namespace App\Http\Controllers;

use App\Models\D_Purchase;
use App\Models\Working_Stock;
use App\Models\Supplier_Details;
use App\Models\Ready_Stock;
use App\Models\Sell_Stock;
use App\Models\defective_pcs;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\Rule;

class Defective_Pcs_Controller extends Controller
{
    public function index()
    {

        $data = array();
        $c_id = session()->get('c_id');
        $data['diamond'] = defective_pcs::join('d_purchase', 'defective_pcs.d_id', '=', 'd_purchase.d_id')
            ->where('defective_pcs.c_id', $c_id)
            ->get(['defective_pcs.*', 'd_purchase.*']);

        return view('Defective_Pcs.index', $data);
    }

    public function create()
    {

        // $data = array();
        // $c_id = session()->get('c_id');
        // $data['supplier'] = D_Purchase::where('c_id', $c_id)->get();
        // // $data['supplier'] = Supplier_Details::where('c_id', $c_id)->get();
        // $data['supplier'] = D_Purchase::join('supplier_details', 'D_Purchase.s_id', '=', 'supplier_details.s_id')
        //     ->join('diamond_shape', 'd_purchase.shape_id', '=', 'diamond_shape.shape_id')

        //     ->get(['D_Purchase.*', 'supplier_details.*', 'diamond_shape.*']);
        // $data['toDaydate'] = Carbon::now()->format('D-m-Y');
        return view('Defective_Pcs.create');
    }
    public function store(Request $request)
    {

        // $resone = $request->resone;
        // $d_wt = $request->date;
        try {
            $validator = Validator::make($request->all(), [
                'bar_code' => 'required',
                'resone' => 'required',
                'date' => 'required',

            ]);            //dd($request);
            if ($validator->fails()) {
                return Response::json(array('success' => false));
            }
            $c_id = session()->get('c_id');
            $barcodeExist = D_Purchase::where([['c_id', $c_id], ['d_barcode', $request->bar_code]])->first();
            $d_id = $barcodeExist['d_id'];
            $df_d_id = defective_pcs::where('d_id', $d_id)->first();
            if ($df_d_id == null) {
                $c_id = session()->get('c_id');
                $newitem = new defective_pcs;
                $newitem->d_id = $d_id;
                $newitem->resone = !empty($request->resone) ? $request->resone : '';
                $newitem->c_id = $c_id;
                $newitem->date =  !empty($request->date) ? $request->date : '';
                $newitem->save();
                D_Purchase::where('d_barcode', $request->bar_code)->update(['status' => 0]);
                if ($barcodeExist['isReady'] != null) {
                    Ready_Stock::where('d_id', $d_id)->update(['status' => 0]);
                } else {
                    Working_Stock::where('d_id', $d_id)->update(['status' => 0]);
                }

                return Response::json(array('success' => true));
            } else {
                return Response::json(array('success' => 200));
            }
        } catch (\Throwable $th) {
            return Response::json(array('success' => false));
        }
    }
    public function edit(Request $request)
    {
        $where = array('df_id' => $request->id);
        $data['Diamond']  = defective_pcs::join('d_purchase', 'defective_pcs.d_id', '=', 'd_purchase.d_id')
            ->where($where)->first();

        // return Response()->json($Diamond);
        //dd($id);
        // $data = array();
        // $data['supplier'] = D_Purchase::findOrFail($id);
        // return Response::json(array('success' => $data));
        // echo $data['Diamond'];
        return view('Defective_Pcs.edit', $data);
    }
    public function update(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'bar_code' => 'required',
                'resone' => 'required',
                'date' => 'required',

            ]);            //dd($request);
            if ($validator->fails()) {
                return Response::json(array('success' => false));
            }
            $c_id = session()->get('c_id');
            $barcodeExist = D_Purchase::where([['c_id', $c_id], ['d_barcode', $request->bar_code]])->first();
            $d_id = $barcodeExist['d_id'];
            $c_id = session()->get('c_id');
            $newitem = array();
            $newitem['d_id'] = $d_id;
            $newitem['resone'] = !empty($request->resone) ? $request->resone : '';
            $newitem['c_id'] = $c_id;
            $newitem['date'] =  !empty($request->date) ? $request->date : '';

            defective_pcs::where('d_id', $d_id)->update($newitem);

            D_Purchase::where('d_barcode', $request->bar_code)->update(['status' => 1]);
            return redirect('/Defective_Pcs');
        } catch (\Throwable $th) {
            return Response::json(array('success' => false));
        }
        echo "welcome this is index";
    }
    public function destroy($id)
    {

        echo $id;
        //
        $dimond = defective_pcs::where('df_id', $id)->first();
        $d_id = $dimond['d_id'];
        // echo $d_id;
        $time = Carbon::now();
        defective_pcs::where('df_id', $id)->update(['deleted_at' => $time]);
        $diamond = D_Purchase::where('d_id', $d_id)->first();
        D_Purchase::where('d_id', $d_id)->update(['status' => 1]);
        if ($diamond['isReady'] != null) {
            Ready_Stock::where('d_id', $d_id)->update(['status' => 1]);
        } else {
            Working_Stock::where('d_id', $d_id)->update(['status' => 1]);
        }
        $notification = array(
            'message' => 'User Deleted!',
            'alert-type' => 'success'
        );

        return Redirect::to('/Defective_Pcs')->with($notification);
    }
}