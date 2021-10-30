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

        return view('Defective_pcs.index', $data);
    }

    public function create()
    {
        return view('Defective_Pcs.create');
    }
    public function store(Request $request)
    {

        // $resone = $request->resone;
        // $d_wt = $request->date;

        $validator = Validator::make($request->all(), [
            'bar_code' => 'required',
            'resone' => 'required',
            'date' => 'required',

        ]);            //dd($request);
        if ($validator->fails()) {
            return Response::json(array('success' => false));
        }
        try {
            $c_id = session()->get('c_id');
            $barcodeExist = D_Purchase::where('d_barcode', $request->bar_code)->first();
            if ($barcodeExist == null) {
                return Response::json(array('success' => 314));
            } else if ($barcodeExist['c_id'] != $c_id) {
                if ('c_id' == 1) {
                    $data = 1;
                } else {
                    $data = 2;
                }
                return Response::json(array('success' => 318));
            }
            $d_id = $barcodeExist['d_id'];
            $df_d_id = defective_pcs::where('d_id', $d_id)->first();

            if ($barcodeExist['isReturn'] != null) {
                //Sell Stock = 4
                $fromWhere = 4;
            } else if ($barcodeExist['isReady'] != null) {
                //Ready Stock = 3
                $fromWhere = 3;
            } else if ($barcodeExist['doReady'] != null) {
                // Working Stock = 2
                $fromWhere = 2;
            } else {
                // Diamond Purchase = 1
                $fromWhere = 1;
            }
            if ($df_d_id == null) {
                $c_id = session()->get('c_id');
                $newitem = new defective_pcs;
                $newitem->d_id = $d_id;
                $newitem->resone = $request->resone;
                $newitem->c_id = $c_id;
                $newitem->date = $request->date;
                $newitem->from_where = $fromWhere;
                $newitem->save();
                D_Purchase::where('d_barcode', $request->bar_code)->update(['status' => 0, 'isReturn' => $request->date]);
                if ($barcodeExist['isReady'] != null) {
                    Ready_Stock::where('d_id', $d_id)->update(['dif_pcs' => 0]);
                } else {
                    Working_Stock::where('d_id', $d_id)->update(['dif_pcs' => 0]);
                }

                return Response::json(array('success' => 200));
            } else {
                return Response::json(array('success' => 312));
            }
        } catch (\Throwable $th) {
            return Response::json(array('success' => 408));
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

            D_Purchase::where('d_barcode', $request->bar_code)->update(['status' => 0, 'isReturn' => $request->date]);
            return redirect('/defective-pcs');
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
        D_Purchase::where('d_id', $d_id)->update(['status' => 1, 'isReturn' => null]);
        if ($diamond['isReady'] != null) {
            Ready_Stock::where('d_id', $d_id)->update(['dif_pcs' => 1]);
        } else {
            Working_Stock::where('d_id', $d_id)->update(['dif_pcs' => 1]);
        }
        $notification = array(
            'message' => 'User Deleted!',
            'alert-type' => 'success'
        );

        return Redirect::to('/defective-pcs')->with($notification);
    }
}