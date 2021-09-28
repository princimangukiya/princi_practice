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
    //Inward generate PDF
    public function Inward()
    {
        $data = array();
        $c_id = session()->get('c_id');
        $data['inward'] = D_Purchase::where('c_id', $c_id)->get();
        $data['inward'] = D_Purchase::join('supplier_details', 'd_purchase.s_id', '=', 'supplier_details.s_id')
            ->join('diamond_shape', 'd_purchase.shape_id', '=', 'diamond_shape.shape_id')
            ->where([['supplier_details.c_id', $c_id]])
            ->get(['d_purchase.*', 'supplier_details.*', 'diamond_shape.*']);
        $data['inward_manager'] = Working_Stock::join('manager_details', 'working_stock.m_id', '=', 'manager_details.m_id')
            ->join('d_purchase', 'working_stock.d_id', '=', 'd_purchase.d_id')
            ->join('diamond_shape', 'd_purchase.shape_id', '=', 'diamond_shape.shape_id')
            ->where([['working_stock.c_id', $c_id]])
            ->get(['d_purchase.*', 'manager_details.m_name', 'working_stock.*', 'diamond_shape.shape_name']);
        // echo $data['manager'];
        return view('Report.Inward', $data);
    }
    public function generatePDF_Inward(Request $request)
    {
        $s_id = $request->s_id;
        $data = array();
        $c_id = session()->get('c_id');
        $start_date = $request->Start_date;
        $End_date = $request->End_date;
        $data['s_name'] = Supplier_Details::where('s_id', $s_id)->get('s_name');
        if (empty($s_id)) {
            $data['inward'] = D_Purchase::join('supplier_details', 'd_purchase.s_id', '=', 'supplier_details.s_id')
                ->join('diamond_shape', 'd_purchase.shape_id', '=', 'diamond_shape.shape_id')
                ->where('d_purchase.c_id', $c_id)
                ->get(['d_purchase.*', 'supplier_details.*', 'diamond_shape.*']);
        } else {
            $data['inward'] = D_Purchase::join('supplier_details', 'd_purchase.s_id', '=', 'supplier_details.s_id')
                ->join('diamond_shape', 'd_purchase.shape_id', '=', 'diamond_shape.shape_id')
                ->where([['d_purchase.c_id', $c_id], ['d_purchase.s_id', $s_id]])
                ->whereBetween('d_purchase.bill_date', [$start_date, $End_date])
                ->get(['d_purchase.*', 'supplier_details.*', 'diamond_shape.*']);
        }
        // echo $s_id;
        $pdf = PDF::loadView('Report.Inward_formate', $data);

        return $pdf->download('Inward_Company.pdf');
    }
    public function generateManagerPDF(Request $request)
    {
        $s_id = $request->m_id;
        $data = array();
        $c_id = session()->get('c_id');
        $start_date = $request->Start_date_manager;
        $end_date = $request->End_date_manager;
        $data['s_name'] = Manager_Details::where('m_id', $s_id)->get('m_name');
        if (empty($s_id)) {
            $data['inward_manager'] = Working_Stock::join('manager_details', 'working_stock.m_id', '=', 'manager_details.m_id')
                ->join('d_purchase', 'working_stock.d_id', '=', 'd_purchase.d_id')
                ->join('diamond_shape', 'd_purchase.shape_id', '=', 'diamond_shape.shape_id')
                ->where([['working_stock.c_id', $c_id]])
                ->get(['d_purchase.*', 'manager_details.m_name', 'working_stock.*', 'diamond_shape.shape_name']);
        } else {
            $data['inward_manager'] = Working_Stock::join('manager_details', 'working_stock.m_id', '=', 'manager_details.m_id')
                ->join('d_purchase', 'working_stock.d_id', '=', 'd_purchase.d_id')
                ->join('diamond_shape', 'd_purchase.shape_id', '=', 'diamond_shape.shape_id')
                ->where([['working_stock.c_id', $c_id], ['working_stock.m_id', $s_id]])
                ->orWhereBetween('bill_date', [$start_date, $end_date])
                ->get(['d_purchase.*', 'manager_details.m_name', 'working_stock.*', 'diamond_shape.shape_name']);
        }
        // echo $s_id;
        $pdf = PDF::loadView('Report.Inward_formate_manager', $data);

        return $pdf->download('Inward_manager.pdf');
    }
    public function search_data_Inward(Request $request)
    {
        // $data = array();+
        $s_id = $request->s_id;
        $start_date = $request->Start_date;
        $end_date = $request->End_date;
        $c_id = session()->get('c_id');
        $data = D_Purchase::join('supplier_details', 'd_purchase.s_id', '=', 'supplier_details.s_id')
            ->join('diamond_shape', 'd_purchase.shape_id', '=', 'diamond_shape.shape_id')
            ->where([['supplier_details.c_id', $c_id], ['d_purchase.s_id', $s_id]])
            ->orWhereBetween('bill_date', [$start_date, $end_date])
            ->get(['d_purchase.*', 'supplier_details.s_name', 'diamond_shape.shape_name']);

        // $data = "hello";
        return Response::json(array('success' => $data));
    }
    public function searchDataInwardManager(Request $request)
    {
        $s_id = $request->m_id;
        $start_date = $request->Start_date;
        $end_date = $request->End_date;
        $c_id = session()->get('c_id');
        $data = Working_Stock::join('manager_details', 'working_stock.m_id', '=', 'manager_details.m_id')
            ->join('d_purchase', 'working_stock.d_id', '=', 'd_purchase.d_id')
            ->join('diamond_shape', 'd_purchase.shape_id', '=', 'diamond_shape.shape_id')
            ->where([['working_stock.c_id', $c_id], ['working_stock.m_id', $s_id]])
            ->orWhereBetween('bill_date', [$start_date, $end_date])
            ->get(['d_purchase.*', 'manager_details.m_name', 'working_stock.*', 'diamond_shape.shape_name']);
        // $data = D_Purchase::join('supplier_details', 'd_purchase.s_id', '=', 'supplier_details.s_id')
        //     ->join('diamond_shape', 'd_purchase.shape_id', '=', 'diamond_shape.shape_id')
        //     ->where([['supplier_details.c_id', $c_id], ['d_purchase.s_id', $s_id]])

        //     ->get(['d_purchase.*', 'supplier_details.s_name', 'diamond_shape.shape_name']);
        // $data = "hello";
        return Response::json(array('success' => $data));
    }
    //Outward PDF Genratte
    public function Outward()
    {
        $data = array();
        $d_id = Ready_Stock::get('d_id');
        $c_id = session()->get('c_id');
        $data['inward'] = Ready_Stock::where('c_id', $c_id)->get();
        $data['inward'] = sell_stock::join('d_purchase', 'sell_stock.d_id', '=', 'd_purchase.d_id')
            ->join('diamond_shape', 'd_purchase.shape_id', '=', 'diamond_shape.shape_id')
            ->join('supplier_details', 'd_purchase.s_id', '=', 'supplier_details.s_id')
            ->where([['sell_stock.c_id', $c_id]])
            ->get(['sell_stock.*', 'd_purchase.*', 'diamond_shape.shape_name', 'supplier_details.s_name']);
        $data['outward_manager'] = Working_Stock::join('manager_details', 'working_stock.m_id', '=', 'manager_details.m_id')
            ->join('d_purchase', 'working_stock.d_id', '=', 'd_purchase.d_id')
            ->join('diamond_shape', 'd_purchase.shape_id', '=', 'diamond_shape.shape_id')
            ->where('working_stock.c_id', $c_id)
            ->whereNotNull('deleted _at')
            ->get(['d_purchase.*', 'manager_details.m_name', 'working_stock.*', 'diamond_shape.shape_name']);
        return view('Report.Outward', $data);
    }
    public function generatePDF_Outward(Request $request)
    {
        $data = array();
        $s_id = $request->s_id;
        $c_id = session()->get('c_id');
        $d_id = Ready_Stock::get('d_id');
        $c_id = session()->get('c_id');
        $start_date = $request->Start_date;
        $data['s_name'] = Supplier_Details::where('s_id', $s_id)->get('s_name');
        $data['date'] = $start_date;
        if (empty($s_id)) {
            $data['inward'] = sell_stock::join('d_purchase', 'sell_stock.d_id', '=', 'd_purchase.d_id')
                ->where([['sell_stock.c_id', $c_id]])
                ->get(['sell_stock.*', 'd_purchase.*']);
        } else {
            $data['inward'] = sell_stock::join('d_purchase', 'sell_stock.d_id', '=', 'd_purchase.d_id')
                ->where([['sell_stock.c_id', $c_id], ['d_purchase.s_id', $s_id]])
                ->whereDate('sell_stock.created_at', '=', $start_date)
                ->get(['sell_stock.*', 'd_purchase.*']);
        }


        $pdf = PDF::loadView('Report.Outward_formate', $data);

        return $pdf->download('Outward.pdf');
        return response::json(array('success' => true));
    }
    public function search_data_Outward(Request $request)
    {
        $c_id = session()->get('c_id');
        $s_id = $request->s_id;
        $start_date = $request->Start_date;
        $end_date = $request->End_date;
        // $data = D_Purchase::where('s_id', $s_id)->whereBetween('bill_date', [$start_date, $end_date])->get();

        $data = sell_stock::join('d_purchase', 'sell_stock.d_id', '=', 'd_purchase.d_id')
            ->join('supplier_details', 'd_purchase.s_id', '=', 'supplier_details.s_id')
            ->join('diamond_shape', 'd_purchase.shape_id', '=', 'diamond_shape.shape_id')
            ->where([['supplier_details.c_id', $c_id], ['d_purchase.s_id', $s_id]])
            ->orWhereBetween('sell_stock.created_at', [$start_date, $end_date])
            ->get(['sell_stock.*', 'd_purchase.*', 'supplier_details.s_name', 'diamond_shape.shape_name']);
        return Response::json(array('success' => $data));
        // echo $data['inward'];
    }
    public function search_data_manager(Request $request)
    {
        $c_id = session()->get('c_id');
        $s_id = $request->m_id;
        $start_date = $request->Start_date;
        $end_date = $request->End_date;
        // $data = D_Purchase::where('s_id', $s_id)->whereBetween('bill_date', [$start_date, $end_date])->get();

        $data = sell_stock::join('d_purchase', 'sell_stock.d_id', '=', 'd_purchase.d_id')
            ->join('supplier_details', 'd_purchase.s_id', '=', 'supplier_details.s_id')
            ->join('diamond_shape', 'd_purchase.shape_id', '=', 'diamond_shape.shape_id')
            ->where([['supplier_details.c_id', $c_id], ['d_purchase.s_id', $s_id]])
            ->orWhereBetween('sell_stock.created_at', [$start_date, $end_date])
            ->get(['sell_stock.*', 'd_purchase.*', 'supplier_details.s_name', 'diamond_shape.shape_name']);
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
        // $data['diamond'] = D_Purchase::where('s_id', $s_id)->get();
        // echo $data['diamond'];

        $json_data = rate_master::where('rate_masters.s_id', $s_id)->get('json_price');
        $json_data = $json_data[0]['json_price'];
        $json_decoded = json_decode($json_data);
        $count1 = 0;
        foreach ($json_decoded[0] as $key => $val) {
            $r_id = $key;
            $wt_category = rate::where('rates.r_id', $r_id)->get();
            $wt_category = $wt_category[0]['wt_category'];
        }
        return view('Report.Party_Labour', $data);
    }
    public function generatePDF_Party_Labour()
    {
        $data = array();
        $c_id = session()->get('c_id');
        $data['inward'] = D_Purchase::where('c_id', $c_id)->get();
        $data['Pay_labour'] = Supplier_Details::where('c_id', $c_id)
            ->get();

        $s_id = $data['Pay_labour'][0]['s_id'];
        // $data['diamond'] = D_Purchase::where('s_id', $s_id)->get();
        // echo $data['diamond'];

        $json_data = rate_master::where('rate_masters.s_id', $s_id)->get('json_price');
        $json_data = $json_data[0]['json_price'];
        $json_decoded = json_decode($json_data);
        $count1 = 0;
        foreach ($json_decoded[0] as $key => $val) {
            $r_id = $key;
            $wt_category = rate::where('rates.r_id', $r_id)->get();
            $wt_category = $wt_category[0]['wt_category'];
        }
        $pdf = PDF::loadView('Report.Party_Labour_formate', $data);

        return $pdf->download('Party Labour.pdf');
    }
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
        $data['Pay_labour'] = Supplier_Details::where([['c_id', $c_id], ['S_id', $s_id]])
            ->get();
        // $data['inward'] = D_Purchase::where('bill_date', $start_date)->get();
        return view('Report.Party_Labour', $data);
    }
}