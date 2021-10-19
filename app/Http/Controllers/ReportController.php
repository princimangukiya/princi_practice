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
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    //Genrate PDF
    //Inward generate PDF
    public function Inward()
    {
        $data = array();
        $c_id = session()->get('c_id');
        $data['inward'] = D_Purchase::join('supplier_details', 'd_purchase.s_id', '=', 'supplier_details.s_id')
            ->join('diamond_shape', 'd_purchase.shape_id', '=', 'diamond_shape.shape_id')
            ->where([['supplier_details.c_id', $c_id]])
            ->get(['d_purchase.*', 'supplier_details.*', 'diamond_shape.*']);
        $data['inward_manager'] = Working_Stock::join('manager_details', 'working_stock.m_id', '=', 'manager_details.m_id')
            ->join('d_purchase', 'working_stock.d_id', '=', 'd_purchase.d_id')
            ->join('diamond_shape', 'd_purchase.shape_id', '=', 'diamond_shape.shape_id')
            ->where([['working_stock.c_id', $c_id], ['working_stock.status', 1]])
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
        $data['s_name'] = Supplier_Details::where('s_id', $s_id)->first('s_name');
        $data['today_date'] = Carbon::now()->format('d-m-Y');
        if (empty($s_id)) {
            if (empty($start_date)) {
                $start_date = new Carbon('first day of January 2000');
            }
            if (empty($End_date)) {
                $End_date = Carbon::now()->format('Y-m-d');
            }
            $data['inward'] = D_Purchase::join('supplier_details', 'd_purchase.s_id', '=', 'supplier_details.s_id')
                ->join('diamond_shape', 'd_purchase.shape_id', '=', 'diamond_shape.shape_id')
                ->where('d_purchase.c_id', $c_id)
                ->whereBetween('d_purchase.bill_date', [$start_date, $End_date])
                ->get(['d_purchase.*', 'supplier_details.*', 'diamond_shape.*']);

            // return Response::json(array('success' => $data));
        } else {
            if (empty($start_date)) {
                $start_date = new Carbon('first day of January 2000');
            }
            if (empty($End_date)) {
                $End_date = Carbon::now()->format('Y-m-d');
            }

            $data['inward'] = D_Purchase::join('supplier_details', 'd_purchase.s_id', '=', 'supplier_details.s_id')
                ->join('diamond_shape', 'd_purchase.shape_id', '=', 'diamond_shape.shape_id')
                ->where([['d_purchase.c_id', $c_id], ['d_purchase.s_id', $s_id]])
                ->whereBetween('d_purchase.bill_date', [$start_date, $End_date])
                ->get(['d_purchase.*', 'supplier_details.*', 'diamond_shape.*']);
            // return Response::json(array('success' => $data));
        }
        // dd($data);
        $pdf = PDF::loadView('Report.Inward_formate', $data);

        return $pdf->download('Inward_Company.pdf');
    }
    public function generateManagerPDF(Request $request)
    {
        $s_id = $request->m_id;
        $data = array();
        $c_id = session()->get('c_id');
        $start_date = $request->Start_date_manager;
        $End_date = $request->End_date_manager;
        $data['s_name'] = Manager_Details::where('m_id', $s_id)->get('m_name');
        $data['today_date'] = Carbon::now()->format('d-m-Y');
        if (empty($s_id)) {
            if (empty($start_date)) {
                $start_date = new Carbon('first day of January 2000');
            }
            if (empty($End_date)) {
                $End_date = Carbon::now()->format('Y-m-d');
            }
            $data['inward_manager'] = Working_Stock::join('manager_details', 'working_stock.m_id', '=', 'manager_details.m_id')
                ->join('d_purchase', 'working_stock.d_id', '=', 'd_purchase.d_id')
                ->join('diamond_shape', 'd_purchase.shape_id', '=', 'diamond_shape.shape_id')
                ->where([['manager_details.c_id', $c_id], ['working_stock.status', 1]])
                ->whereBetween('working_stock.bill_date', [$start_date, $End_date])
                ->get(['d_purchase.*', 'manager_details.m_name', 'working_stock.*', 'diamond_shape.shape_name']);
            // return Response::json(array('success' => $data));
        } else {
            if (empty($start_date)) {
                $start_date = new Carbon('first day of January 2000');
            }
            if (empty($End_date)) {
                $End_date = Carbon::now()->format('Y-m-d');
            }
            $data['inward_manager'] = Working_Stock::join('manager_details', 'working_stock.m_id', '=', 'manager_details.m_id')
                ->join('d_purchase', 'working_stock.d_id', '=', 'd_purchase.d_id')
                ->join('diamond_shape', 'd_purchase.shape_id', '=', 'diamond_shape.shape_id')
                ->where([['working_stock.c_id', $c_id], ['working_stock.m_id', $s_id], ['working_stock.status', 1]])
                ->whereBetween('working_stock.bill_date', [$start_date, $End_date])
                ->get(['d_purchase.*', 'manager_details.m_name', 'working_stock.*', 'diamond_shape.shape_name']);
            // return Response::json(array('success' => $data));
        }
        // echo $s_id;
        $pdf = PDF::loadView('Report.Inward_formate_manager', $data);

        return $pdf->download('Inward_manager.pdf');
    }
    public function search_data_Inward(Request $request)
    {
        // $data = array();+
        $s_id = $request->s_id;
        $data = array();
        $c_id = session()->get('c_id');
        $start_date = $request->Start_date;
        $End_date = $request->End_date;
        $data = Supplier_Details::where('s_id', $s_id)->get('s_name');
        if (empty($s_id)) {
            if (empty($start_date)) {
                $start_date = new Carbon('first day of January 2000');
            }
            if (empty($End_date)) {
                $End_date = Carbon::now()->format('Y-m-d');
            }
            $data = D_Purchase::join('supplier_details', 'd_purchase.s_id', '=', 'supplier_details.s_id')
                ->join('diamond_shape', 'd_purchase.shape_id', '=', 'diamond_shape.shape_id')
                ->where([['d_purchase.c_id', $c_id]])
                ->whereBetween('d_purchase.bill_date', [$start_date, $End_date])
                ->get(['d_purchase.*', 'supplier_details.s_name', 'diamond_shape.*']);

            return Response::json(array('success' => $data));
        } else {
            if (empty($start_date)) {
                $start_date = new Carbon('first day of January 2000');
            }
            if (empty($End_date)) {
                $End_date = Carbon::now()->format('Y-m-d');
            }
            $data = D_Purchase::join('supplier_details', 'd_purchase.s_id', '=', 'supplier_details.s_id')
                ->join('diamond_shape', 'd_purchase.shape_id', '=', 'diamond_shape.shape_id')
                ->where([['d_purchase.c_id', $c_id], ['d_purchase.s_id', $s_id]])
                ->whereBetween('d_purchase.bill_date', [$start_date, $End_date])
                ->get(['d_purchase.*', 'supplier_details.s_name', 'diamond_shape.*']);
            return Response::json(array('success' => $data));
        }
    }
    public function searchDataInwardManager(Request $request)
    {
        $s_id = $request->m_id;
        $data = array();
        $c_id = session()->get('c_id');
        $start_date = $request->Start_date;
        $End_date = $request->End_date;
        $data = Manager_Details::where('m_id', $s_id)->get('m_name');
        if (empty($s_id)) {
            if (empty($start_date)) {
                $start_date = new Carbon('first day of January 2000');
            }
            if (empty($End_date)) {
                $End_date = Carbon::now()->format('Y-m-d');
            }
            $data = Working_Stock::join('manager_details', 'working_stock.m_id', '=', 'manager_details.m_id')
                ->join('d_purchase', 'working_stock.d_id', '=', 'd_purchase.d_id')
                ->join('diamond_shape', 'd_purchase.shape_id', '=', 'diamond_shape.shape_id')
                ->where([['manager_details.c_id', $c_id], ['working_stock.status', 1]])
                ->whereBetween('working_stock.bill_date', [$start_date, $End_date])
                ->get(['d_purchase.*', 'manager_details.m_name', 'working_stock.*', 'diamond_shape.shape_name']);
            return Response::json(array('success' => $data));
        } else {
            if (empty($start_date)) {
                $start_date = new Carbon('first day of January 2000');
            }
            if (empty($End_date)) {
                $End_date = Carbon::now()->format('Y-m-d');
            }
            $data = Working_Stock::join('manager_details', 'working_stock.m_id', '=', 'manager_details.m_id')
                ->join('d_purchase', 'working_stock.d_id', '=', 'd_purchase.d_id')
                ->join('diamond_shape', 'd_purchase.shape_id', '=', 'diamond_shape.shape_id')
                ->where([['working_stock.c_id', $c_id], ['working_stock.m_id', $s_id], ['working_stock.status', 1]])
                ->whereBetween('working_stock.bill_date', [$start_date, $End_date])
                ->get(['d_purchase.*', 'manager_details.m_name', 'working_stock.*', 'diamond_shape.shape_name']);
            return Response::json(array('success' => $data));
        }
    }
    //Outward PDF Genratte
    public function Outward()
    {
        $data = array();
        $c_id = session()->get('c_id');
        $data['inward'] = Ready_Stock::where('c_id', $c_id)->get();
        $data['inward'] = sell_stock::join('d_purchase', 'sell_stock.d_id', '=', 'd_purchase.d_id')
            ->join('diamond_shape', 'd_purchase.shape_id', '=', 'diamond_shape.shape_id')
            ->join('supplier_details', 'd_purchase.s_id', '=', 'supplier_details.s_id')
            ->where('sell_stock.c_id', $c_id)
            ->get(['sell_stock.*', 'd_purchase.*', 'diamond_shape.shape_name', 'supplier_details.s_name']);
        // echo $data['inward'];
        $data['outward_manager'] = Ready_Stock::where([['ready_stock.c_id', $c_id], ['ready_stock.status', 0]])
            ->join('manager_details', 'ready_stock.m_id', '=', 'manager_details.m_id')
            ->join('d_purchase', 'ready_stock.d_id', '=', 'd_purchase.d_id')
            ->join('working_stock', 'ready_stock.d_id', '=', 'working_stock.d_id')
            ->join('diamond_shape', 'd_purchase.shape_id', '=', 'diamond_shape.shape_id')
            ->get(['ready_stock.*', 'd_purchase.*', 'Working_stock.bill_date', 'manager_details.m_name', 'diamond_shape.shape_name']);
        // echo $data['outward_manager'];
        return view('Report.Outward', $data);
    }
    public function generatePDF_Outward(Request $request)
    {
        $data = array();
        $s_id = $request->s_id;
        $c_id = session()->get('c_id');
        $d_id = Ready_Stock::get('d_id');
        $start_date = $request->Start_date;
        $data['s_name'] = Supplier_Details::where('s_id', $s_id)->get('s_name');
        $End_date = $request->End_date;
        $data['date'] = $start_date;
        if (empty($s_id)) {
            if (empty($start_date)) {
                $start_date = new Carbon('first day of January 2000');
            }
            if (empty($End_date)) {
                $End_date = Carbon::now()->format('Y-m-d');
            }
            $data['inward'] = sell_stock::join('d_purchase', 'sell_stock.d_id', '=', 'd_purchase.d_id')
                ->join('diamond_shape', 'd_purchase.shape_id', '=', 'diamond_shape.shape_id')
                ->join('supplier_details', 'd_purchase.s_id', '=', 'supplier_details.s_id')
                ->where('sell_stock.c_id', $c_id)
                ->whereBetween('sell_stock.return_date', [$start_date, $End_date])
                ->get(['sell_stock.*', 'd_purchase.*', 'diamond_shape.shape_name', 'supplier_details.s_name']);
            // dd($data);
            // return Response::json(array('success' => $data));
        } else {
            if (empty($start_date)) {
                $start_date = new Carbon('first day of January 2000');
            }
            if (empty($End_date)) {
                $End_date = Carbon::now()->format('Y-m-d');
            }
            $data['inward'] = sell_stock::join('d_purchase', 'sell_stock.d_id', '=', 'd_purchase.d_id')
                ->join('diamond_shape', 'd_purchase.shape_id', '=', 'diamond_shape.shape_id')
                ->join('supplier_details', 'd_purchase.s_id', '=', 'supplier_details.s_id')
                ->where([['sell_stock.c_id', $c_id], ['sell_stock.s_id', $s_id]])
                ->whereBetween('sell_stock.return_date', [$start_date, $End_date])
                ->get(['sell_stock.*', 'd_purchase.*', 'diamond_shape.shape_name', 'supplier_details.s_name']);
            // return Response::json(array('success' => $data));
        }
        $pdf = PDF::loadView('Report.Outward_formate', $data);

        return $pdf->download('Outward.pdf');
        // return response::json(array('success' => true));
    }
    public function generateManagerPDF_outward(Request $request)
    {
        $data = array();
        $m_id = $request->m_id;
        $c_id = session()->get('c_id');
        $start_date = $request->Start_date;
        $data['s_name'] = Manager_Details::where('m_id', $m_id)->get('m_name');
        $End_date = $request->End_date;
        $data['date'] = $start_date;
        if (empty($m_id)) {
            if (empty($start_date)) {
                $start_date = new Carbon('first day of January 2000');
            }
            if (empty($End_date)) {
                $End_date = Carbon::now()->format('Y-m-d');
            }
            $data['outward_manager'] = Ready_Stock::where([['ready_stock.c_id', $c_id], ['ready_stock.status', 0]])
                ->join('manager_details', 'ready_stock.m_id', '=', 'manager_details.m_id')
                ->join('d_purchase', 'ready_stock.d_id', '=', 'd_purchase.d_id')
                ->join('working_stock', 'ready_stock.d_id', '=', 'working_stock.d_id')
                ->join('diamond_shape', 'd_purchase.shape_id', '=', 'diamond_shape.shape_id')
                ->whereBetween('ready_stock.return_date', [$start_date, $End_date])
                ->get(['ready_stock.*', 'd_purchase.*', 'Working_stock.bill_date', 'manager_details.m_name', 'diamond_shape.shape_name']);
            // dd($data);
            // return Response::json(array('success' => $data));
        } else {
            if (empty($start_date)) {
                $start_date = new Carbon('first day of January 2000');
            }
            if (empty($End_date)) {
                $End_date = Carbon::now()->format('Y-m-d');
            }
            $data['outward_manager'] = Ready_Stock::join('manager_details', 'ready_stock.m_id', '=', 'manager_details.m_id')
                ->join('d_purchase', 'ready_stock.d_id', '=', 'd_purchase.d_id')
                ->join('working_stock', 'ready_stock.d_id', '=', 'working_stock.d_id')
                ->join('diamond_shape', 'd_purchase.shape_id', '=', 'diamond_shape.shape_id')
                ->where([['ready_stock.c_id', $c_id], ['ready_stock.status', 0], ['ready_stock.m_id', $m_id]])
                ->whereBetween('ready_stock.return_date', [$start_date, $End_date])
                ->get(['ready_stock.*', 'd_purchase.*', 'Working_stock.bill_date', 'manager_details.m_name', 'diamond_shape.shape_name']);
            // return Response::json(array('success' => $data));
        }

        $pdf = PDF::loadView('Report.Outward_manager_formate', $data);

        return $pdf->download('Outward_manager.pdf');
        // return response::json(array('success' => true));
    }
    public function search_data_Outward(Request $request)
    {
        $data = array();
        $s_id = $request->S_id;
        $c_id = session()->get('c_id');
        $start_date = $request->Start_date;
        $End_date = $request->End_date;
        // $data = Supplier_Details::where('s_id', $s_id)->get('s_name');
        // $data['date'] = $start_date;
        if (empty($s_id)) {
            if (empty($start_date)) {
                $start_date = new Carbon('first day of January 2000');
            }
            if (empty($End_date)) {
                $End_date = Carbon::now()->format('Y-m-d');
            }
            $data = sell_stock::join('d_purchase', 'sell_stock.d_id', '=', 'd_purchase.d_id')
                ->join('diamond_shape', 'd_purchase.shape_id', '=', 'diamond_shape.shape_id')
                ->join('supplier_details', 'd_purchase.s_id', '=', 'supplier_details.s_id')
                ->where('sell_stock.c_id', $c_id)
                ->whereBetween('sell_stock.return_date', [$start_date, $End_date])
                ->get(['sell_stock.*', 'd_purchase.*', 'diamond_shape.shape_name', 'supplier_details.s_name']);
            // dd($data);
            return Response::json(array('success' => $data));
        } else {
            if (empty($start_date)) {
                $start_date = new Carbon('first day of January 2000');
            }
            if (empty($End_date)) {
                $End_date = Carbon::now()->format('Y-m-d');
            }
            $data = sell_stock::join('d_purchase', 'sell_stock.d_id', '=', 'd_purchase.d_id')
                ->join('diamond_shape', 'd_purchase.shape_id', '=', 'diamond_shape.shape_id')
                ->join('supplier_details', 'd_purchase.s_id', '=', 'supplier_details.s_id')
                ->where([['sell_stock.c_id', $c_id], ['sell_stock.s_id', $s_id]])
                ->whereBetween('sell_stock.return_date', [$start_date, $End_date])
                ->get(['sell_stock.*', 'd_purchase.*', 'diamond_shape.shape_name', 'supplier_details.s_name']);
            return Response::json(array('success' => $data));
        }
        // echo $data['inward'];
    }
    public function search_data_manager(Request $request)
    {
        $c_id = session()->get('c_id');
        $m_id = $request->m_id;
        $start_date = $request->Start_date;
        $End_date = $request->End_date;
        if (empty($m_id)) {
            if (empty($start_date)) {
                $start_date = new Carbon('first day of January 2000');
            }
            if (empty($End_date)) {
                $End_date = Carbon::now()->format('Y-m-d');
            }
            $data = Ready_Stock::where([['ready_stock.c_id', $c_id], ['ready_stock.status', 0]])
                ->join('manager_details', 'ready_stock.m_id', '=', 'manager_details.m_id')
                ->join('d_purchase', 'ready_stock.d_id', '=', 'd_purchase.d_id')
                ->join('working_stock', 'ready_stock.d_id', '=', 'working_stock.d_id')
                ->join('diamond_shape', 'd_purchase.shape_id', '=', 'diamond_shape.shape_id')
                ->whereBetween('ready_stock.return_date', [$start_date, $End_date])
                ->get(['ready_stock.*', 'd_purchase.*', 'Working_stock.bill_date', 'manager_details.m_name', 'diamond_shape.shape_name']);
            // dd($data);
            return Response::json(array('success' => $data));
        } else {
            if (empty($start_date)) {
                $start_date = new Carbon('first day of January 2000');
            }
            if (empty($End_date)) {
                $End_date = Carbon::now()->format('Y-m-d');
            }
            $data = Ready_Stock::join('manager_details', 'ready_stock.m_id', '=', 'manager_details.m_id')
                ->join('d_purchase', 'ready_stock.d_id', '=', 'd_purchase.d_id')
                ->join('working_stock', 'ready_stock.d_id', '=', 'working_stock.d_id')
                ->join('diamond_shape', 'd_purchase.shape_id', '=', 'diamond_shape.shape_id')
                ->where([['ready_stock.c_id', $c_id], ['ready_stock.status', 0], ['ready_stock.m_id', $m_id]])
                ->whereBetween('ready_stock.return_date', [$start_date, $End_date])
                ->get(['ready_stock.*', 'd_purchase.*', 'Working_stock.bill_date', 'manager_details.m_name', 'diamond_shape.shape_name']);
            return Response::json(array('success' => $data));
        }
        // echo $data['inward'];
    }
    //Party_Labour Genrate PDF
    public function Party_Labour()
    {
        $data = array();
        // $rates = array();
        $c_id = session()->get('c_id');
        $data['supplier'] = Supplier_Details::where([['c_id', $c_id]])->get();
        foreach ($data['supplier'] as $key => $supplier) {


            $s_id = $supplier->s_id;
            // $data['diamond'] = D_Purchase::where('s_id', $s_id)->get();
            $sell_stock = sell_stock::where([['c_id', $c_id], ['s_id', $s_id]])->get();
            $daimond = D_Purchase::where([['c_id', $c_id], ['s_id', $s_id]])->get();
            $json_data = rate_master::where([['c_id', $c_id], ['s_id', $s_id]])->get('json_price');
            $rate[$s_id] = array();
            $daimond_data[$s_id] = array();
            $issueCuts[$s_id] = array();
            $outCuts[$s_id] = array();
            $price[$s_id] = array();
            $labour[$s_id] = array();
            $json_data = $json_data[0]['json_price'];
            $json_decoded = json_decode($json_data);
            foreach ($json_decoded[0] as $key => $val) {
                $r_id = $key;
                $wt_category = rate::where('rates.r_id', $r_id)->get();
                $wt_category = $wt_category[0]['wt_category'];
                $fetchPrice = $val;
                array_push($price[$s_id], $fetchPrice);
                array_push($rate[$s_id], $wt_category);
                $count1 = 0;
                $total_weight = 0;
                $d_weight = 0;
                $d_n_wt = 0;
                $count = 0;
                $labour_price = 0;
                $total_new_weight = 0;
                foreach ($daimond as $r) {
                    if ($s_id == $r->s_id) {
                        foreach ($sell_stock as $value) {
                            if ($value['d_id'] == $r->d_id) {
                                $daimond_categorie_id = $r->d_wt_category;

                                if ($r_id == $daimond_categorie_id) {
                                    $count1 = $count1 + 1;
                                    $d_weight = $total_weight + $r->d_wt;
                                    $total_weight = $d_weight;
                                    $d_n_wt = $total_new_weight + $r->d_n_wt;
                                    $total_new_weight = $d_n_wt;
                                    $count = $labour_price + $r->price;
                                    $labour_price = $count;
                                }
                            }
                        }
                    }
                }
                array_push($daimond_data[$s_id], $count1);
                array_push($issueCuts[$s_id], $total_weight);
                array_push($outCuts[$s_id], $total_new_weight);
                array_push($labour[$s_id], $labour_price);
            }
        }
        $data['rates'] = $rate;
        $data['counts'] = $daimond_data;
        $data['issueCuts'] = $issueCuts;
        $data['outCuts'] = $outCuts;
        $data['price'] = $price;
        $data['labour'] = $labour;
        // echo $data['count'];
        return view('Report.Party_Labour', $data);
    }
    public function generatePDF_Party_Labour(Request $request)
    {
        $s_id = $request->s_id;
        $data = array();
        $c_id = session()->get('c_id');
        $start_date = $request->Start_date;
        $End_date = $request->End_date;
        $data['s_name'] = Supplier_Details::where([['c_id', $c_id], ['s_id', $s_id]])->get();
        $data['today_date'] = Carbon::now();
        if (empty($start_date)) {
            $start_date = new Carbon('first day of January 2000');
        }
        if (empty($End_date)) {
            $End_date = Carbon::now()->format('Y-m-d');
        }
        $data['supplier'] = Supplier_Details::where([['c_id', $c_id], ['s_id', $s_id]])->get();
        foreach ($data['supplier'] as $key => $supplier) {
            $s_id = $supplier->s_id;
            $sell_stock = sell_stock::where('s_id', $s_id)->get();
            $daimond = D_Purchase::where('s_id', $s_id)
                ->whereBetween('bill_date', [$start_date, $End_date])
                ->get();
            $json_data = rate_master::where('rate_masters.s_id', $s_id)->get('json_price');
            $rate[$s_id] = array();
            $daimond_data[$s_id] = array();
            $issueCuts[$s_id] = array();
            $outCuts[$s_id] = array();
            $price[$s_id] = array();
            $labour[$s_id] = array();
            $json_data = $json_data[0]['json_price'];
            $json_decoded = json_decode($json_data);
            foreach ($json_decoded[0] as $key => $val) {
                $r_id = $key;
                $wt_category = rate::where('rates.r_id', $r_id)->get();
                $wt_category = $wt_category[0]['wt_category'];
                $fetchPrice = $val;
                array_push($price[$s_id], $fetchPrice);
                array_push($rate[$s_id], $wt_category);
                $count1 = 0;
                $total_weight = 0;
                $d_weight = 0;
                $d_n_wt = 0;
                $count = 0;
                $labour_price = 0;
                $total_new_weight = 0;
                foreach ($daimond as $r) {
                    if ($s_id == $r->s_id) {
                        foreach ($sell_stock as $value) {
                            if ($value['d_id'] == $r->d_id) {
                                $daimond_categorie_id = $r->d_wt_category;

                                if ($r_id == $daimond_categorie_id) {
                                    $count1 = $count1 + 1;
                                    $d_weight = $total_weight + $r->d_wt;
                                    $total_weight = $d_weight;
                                    $d_n_wt = $total_new_weight + $r->d_n_wt;
                                    $total_new_weight = $d_n_wt;
                                    $count = $labour_price + $r->price;
                                    $labour_price = $count;
                                }
                            }
                        }
                    }
                }
                array_push($daimond_data[$s_id], $count1);
                array_push($issueCuts[$s_id], $total_weight);
                array_push($outCuts[$s_id], $total_new_weight);
                array_push($labour[$s_id], $labour_price);
            }

            $data['rates'] = $rate;
            $data['counts'] = $daimond_data;
            $data['issueCuts'] = $issueCuts;
            $data['outCuts'] = $outCuts;
            $data['price'] = $price;
            $data['labour'] = $labour;
            $data['start_date'] = $start_date;
            $data['end_date'] = $End_date;

            return view('Report.party_Labour_formate', $data);
            // $pdf = PDF::loadView('Report.party_Labour_formate', $data);
            // return $pdf->download('Party_Labour.pdf');
        }
    }
    public function genrate_pdf($data)
    {
        $data = $data;

        echo $data;
    }
    public function search_data_Party_Labour(Request $request)
    {
        $data = array();
        $s_id = $request->s_id;
        $start_date = $request->Start_date;
        $end_date = $request->End_date;
        $c_id = session()->get('c_id');
        // $data['supplier'] = Supplier_Details::where([['c_id', $c_id], ['s_id', $s_id]])
        //     ->get();
        if (empty($start_date)) {
            $start_date = new Carbon('first day of January 2000');
        }
        if (empty($end_date)) {
            $end_date = Carbon::now()->format('Y-m-d');
        }
        if (empty($s_id)) {

            $data['supplier'] = Supplier_Details::where('c_id', $c_id)->get();
            foreach ($data['supplier'] as $key => $supplier) {


                $s_id = $supplier->s_id;
                // $data['diamond'] = D_Purchase::where('s_id', $s_id)->get();
                $sell_stock = sell_stock::where([['c_id', $c_id], ['s_id', $s_id]])->get();
                $daimond = D_Purchase::where([['c_id', $c_id], ['s_id', $s_id]])
                    ->whereBetween('bill_date', [$start_date, $end_date])
                    ->get();
                $json_data = rate_master::where([['c_id', $c_id], ['s_id', $s_id]])->get('json_price');
                $rate[$s_id] = array();
                $daimond_data[$s_id] = array();
                $issueCuts[$s_id] = array();
                $outCuts[$s_id] = array();
                $price[$s_id] = array();
                $labour[$s_id] = array();
                $json_data = $json_data[0]['json_price'];
                $json_decoded = json_decode($json_data);
                foreach ($json_decoded[0] as $key => $val) {
                    $r_id = $key;
                    $wt_category = rate::where('rates.r_id', $r_id)->get();
                    $wt_category = $wt_category[0]['wt_category'];
                    $fetchPrice = $val;
                    array_push($price[$s_id], $fetchPrice);
                    array_push($rate[$s_id], $wt_category);
                    $count1 = 0;
                    $total_weight = 0;
                    $d_weight = 0;
                    $d_n_wt = 0;
                    $count = 0;
                    $labour_price = 0;
                    $total_new_weight = 0;
                    foreach ($daimond as $r) {
                        if ($s_id == $r->s_id) {
                            foreach ($sell_stock as $value) {
                                if ($value['d_id'] == $r->d_id) {
                                    $daimond_categorie_id = $r->d_wt_category;

                                    if ($r_id == $daimond_categorie_id) {
                                        $count1 = $count1 + 1;
                                        $d_weight = $total_weight + $r->d_wt;
                                        $total_weight = $d_weight;
                                        $d_n_wt = $total_new_weight + $r->d_n_wt;
                                        $total_new_weight = $d_n_wt;
                                        $count = $labour_price + $r->price;
                                        $labour_price = $count;
                                    }
                                }
                            }
                        }
                    }
                    array_push($daimond_data[$s_id], $count1);
                    array_push($issueCuts[$s_id], $total_weight);
                    array_push($outCuts[$s_id], $total_new_weight);
                    array_push($labour[$s_id], $labour_price);
                }
            }
            $data['rates'] = $rate;
            $data['counts'] = $daimond_data;
            $data['issueCuts'] = $issueCuts;
            $data['outCuts'] = $outCuts;
            $data['price'] = $price;
            $data['labour'] = $labour;
            // echo $data['count'];
            // return view('Report.Party_Labour', $data);
            // dd($data);
            // echo  $daimond;
            return Response::json(array('success' => $data));
        } else {
            $data['supplier'] = Supplier_Details::where([['c_id', $c_id], ['s_id', $s_id]])->get();
            foreach ($data['supplier'] as $key => $supplier) {
                $s_id = $supplier->s_id;
                $sell_stock = sell_stock::where('s_id', $s_id)->get();
                $daimond = D_Purchase::where('s_id', $s_id)
                    ->whereBetween('bill_date', [$start_date, $end_date])
                    ->get();
                $json_data = rate_master::where('rate_masters.s_id', $s_id)->get('json_price');
                $rate[$s_id] = array();
                $daimond_data[$s_id] = array();
                $issueCuts[$s_id] = array();
                $outCuts[$s_id] = array();
                $price[$s_id] = array();
                $labour[$s_id] = array();
                $json_data = $json_data[0]['json_price'];
                $json_decoded = json_decode($json_data);
                foreach ($json_decoded[0] as $key => $val) {
                    $r_id = $key;
                    $wt_category = rate::where('rates.r_id', $r_id)->get();
                    $wt_category = $wt_category[0]['wt_category'];
                    $fetchPrice = $val;
                    array_push($price[$s_id], $fetchPrice);
                    array_push($rate[$s_id], $wt_category);
                    $count1 = 0;
                    $total_weight = 0;
                    $d_weight = 0;
                    $d_n_wt = 0;
                    $count = 0;
                    $labour_price = 0;
                    $total_new_weight = 0;
                    foreach ($daimond as $r) {
                        if ($s_id == $r->s_id) {
                            foreach ($sell_stock as $value) {
                                if ($value['d_id'] == $r->d_id) {
                                    $daimond_categorie_id = $r->d_wt_category;

                                    if ($r_id == $daimond_categorie_id) {
                                        $count1 = $count1 + 1;
                                        $d_weight = $total_weight + $r->d_wt;
                                        $total_weight = $d_weight;
                                        $d_n_wt = $total_new_weight + $r->d_n_wt;
                                        $total_new_weight = $d_n_wt;
                                        $count = $labour_price + $r->price;
                                        $labour_price = $count;
                                    }
                                }
                            }
                        }
                    }
                    array_push($daimond_data[$s_id], $count1);
                    array_push($issueCuts[$s_id], $total_weight);
                    array_push($outCuts[$s_id], $total_new_weight);
                    array_push($labour[$s_id], $labour_price);
                }
            }
            $data['s_name'] = $data['supplier'][0]['s_name'];
            $data['rates'] = $rate;
            $data['counts'] = $daimond_data;
            $data['issueCuts'] = $issueCuts;
            $data['outCuts'] = $outCuts;
            $data['price'] = $price;
            $data['labour'] = $labour;
            // dd($data);
            // echo  $daimond;
            return Response::json(array('success' => $data));
        }
    }
}