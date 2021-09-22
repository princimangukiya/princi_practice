<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\D_Purchase;
use App\Models\Diamond_Shape;
use App\Models\Manager_Details;
use App\Models\rate_master;
use App\Models\rate;
use App\Models\Ready_Stock;
use App\Models\Sell_Stock;
use App\Models\Supplier_Details;
use App\Models\User;
use App\Models\Working_Stock;
use Illuminate\Support\Facades\Response;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        return view('Report.index');
    }

    //Genrate PDF
    //Inward genrate PDF
    public function Inward()
    {
        $data = array();
        $c_id = session()->get('c_id');
        $data['inward'] = D_Purchase::where('c_id', $c_id)->get();
        $data['inward'] = D_Purchase::join('supplier_details', 'd_purchase.s_id', '=', 'supplier_details.s_id')
            ->join('diamond_shape', 'd_purchase.shape_id', '=', 'diamond_shape.shape_id')
            ->where([['supplier_details.c_id', $c_id]])
            ->get(['d_purchase.*', 'supplier_details.*', 'diamond_shape.*']);


        return view('Report.Inward', $data);
    }

    // public function genratePDF_Inward()
    // {
    //     $data = [
    //         'title' => 'Inward Report',
    //         'date' => date('d/m/Y')
    //     ];

    //     $pdf = PDF::loadView('Report.Inward_Formatte', $data);

    //     return $pdf->download('Inward.pdf');
    // }
    public function search_data_Inward(Request $request)
    {
        // $data = array();+
        $s_id = $request->s_id;
        $start_date = $request->Start_date;
        $end_date = $request->End_date;
        $c_id = session()->get('c_id');
        $data['inward'] = D_Purchase::where('c_id', $c_id)->get();
        $data = D_Purchase::join('supplier_details', 'd_purchase.s_id', '=', 'supplier_details.s_id')
            ->join('diamond_shape', 'd_purchase.shape_id', '=', 'diamond_shape.shape_id')
            ->where([['supplier_details.c_id', $c_id], ['d_purchase.s_id', $s_id]])
            ->whereBetween('bill_date', [$start_date, $end_date])
            ->get(['d_purchase.*', 'supplier_details.s_name', 'diamond_shape.shape_name']);
        // $data = "hello";
        return Response::json(array('success' => $data));
        // return response()->json([
        //     'success' => $data
        // ]);
        // return view('Report.Inward', $data);
        // echo $data['inward'];
    }
    //Outward PDF Genratte
    public function Outward()
    {
        $data = array();
        $d_id = Ready_Stock::get('d_id');
        $c_id = session()->get('c_id');
        $data['inward'] = Ready_Stock::where('c_id', $c_id)->get();
        $data['inward'] = Ready_Stock::join('d_purchase', 'ready_stock.d_id', '=', 'd_purchase.d_id')
            ->where([['ready_stock.c_id', $c_id]])
            ->get(['d_purchase.*']);
        return view('Report.Outward', $data);
    }
    // public function genratePDF_Outward()
    // {
    //     $data = [
    //         'title' => 'Outward Report',
    //         'date' => date('d/m/Y')
    //     ];

    //     $pdf = PDF::loadView('Report.Outward_Formatte', $data);

    //     return $pdf->download('Outward.pdf');
    // }
    public function search_data_Outward(Request $request)
    {
        $s_id = $request->s_id;
        $start_date = $request->Start_date;
        $end_date = $request->End_date;
        // $data = D_Purchase::where('s_id', $s_id)->whereBetween('bill_date', [$start_date, $end_date])->get();

        $data = Ready_Stock::join('supplier_details', 'd_purchase.s_id', '=', 'supplier_details.s_id')
            ->join('diamond_shape', 'd_purchase.shape_id', '=', 'diamond_shape.shape_id')
            ->where([['d_purchase.s_id', $s_id]])
            ->get(['d_purchase.*', 'supplier_details.s_name', 'diamond_shape.shape_name']);
        $data['inward'] = D_Purchase::where('bill_date', $start_date)->get();
        // return view('Report.Outward', $data);
        return Response::json(array('success' => $data));
        // echo $data['inward'];
    }
    //Party_Labour Genrate PDF
    public function Party_Labour()
    {
        $data = array();
        $c_id = session()->get('c_id');
        $data['inward'] = D_Purchase::where('c_id', $c_id)->get();
        $data['Pay_labour'] = Supplier_Details::where('c_id', $c_id)
            ->get();
        $s_id = $data['Pay_labour'][0]['s_id'];
        $data['daimond'] = D_Purchase::where('s_id', $s_id)->get();
        // echo $data['daimond'];

        $json_data = rate_master::where('rate_masters.s_id', $s_id)->get('json_price');
        $json_data = $json_data[0]['json_price'];
        $json_decoded = json_decode($json_data);
        foreach ($json_decoded[0] as $key => $val) {
            $r_id = $key;
            $wt_category = rate::where('rates.r_id', $r_id)->get();
            $wt_category = $wt_category[0]['wt_category'];
            // echo $wt_category;
        }
        // echo $data;
        return view('Report.Party_Labour', $data);
    }
    // public function genratePDF_Party_Labour()
    // {
    //     $data = [
    //         'title' => 'Party Labour Report',
    //         'date' => date('d/m/Y')
    //     ];

    //     $pdf = PDF::loadView('Report.Party_Labour_formatte', $data);

    //     return $pdf->download('Party Labour.pdf');
    // }
    public function search_data_Party_Labour(Request $request)
    {
        $c_id = session()->get('c_id');
        $s_id = $request->s_id;
        $start_date = $request->Start_date;
        $end_date = $request->End_date;
        echo $s_id;
        echo "<br>";
        echo $start_date;
        echo "<br>";
        echo $end_date;
        $data['Pay_labour'] = Supplier_Details::where([['c_id', $c_id], ['S_id', $s_id]])->whereBetween('')
            ->get();
        $data['inward'] = D_Purchase::where('bill_date', $start_date)->get();
        return view('Report.Party_Labour', $data);
    }
}