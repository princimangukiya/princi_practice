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
        $data['inward']= D_Purchase::join('supplier_details', 'd_purchase.s_id', '=', 'supplier_details.s_id')
        ->join('diamond_shape', 'd_purchase.shape_id', '=', 'diamond_shape.shape_id')
        ->get(['d_purchase.*', 'supplier_details.*', 'diamond_shape.*']);
        return view('Report.Inward',$data);
    }
    public function genratePDF_Inward()
   {
       $data = [
           'title' => 'Inward Report',
           'date' => date('m/d/Y')
       ];
         
       $pdf = PDF::loadView('Report.Inward_Formatte', $data);
   
       return $pdf->download('Inward.pdf');
       
   }
//Outward PDF Genratte
   public function Outward()
   {
    $data = array();
    $c_id = session()->get('c_id');
    $data['inward'] = D_Purchase::where('c_id', $c_id)->get();
    $data['inward']= D_Purchase::join('supplier_details', 'd_purchase.s_id', '=', 'supplier_details.s_id')
    ->join('diamond_shape', 'd_purchase.shape_id', '=', 'diamond_shape.shape_id')
    ->get(['d_purchase.*', 'supplier_details.*', 'diamond_shape.*']);
       return view('Report.Outward', $data);
      
   }
   public function genratePDF_Outward()
  {
      $data = [
          'title' => 'Outward Report',
          'date' => date('m/d/Y')
      ];
        
      $pdf = PDF::loadView('Report.Outward_Formatte', $data);
  
      return $pdf->download('Outward.pdf');
      
  }

   //Party_Labour Genrate PDF
   public function Party_Labour()
    {
        $data = array();
        $c_id = session()->get('c_id');
        $data['Pay_Labour'] = D_Purchase::where('c_id', $c_id)->get();
        $data['Pay_Labour'] = Supplier_Details::join('rate_masters', 'rate_masters.s_id', '=', 'supplier_details.s_id')
        ->get(['rate_masters.*', 'supplier_details.*']);
        $data['Pay_labour'] = rate_master::join('rates', 'rates.r_id', '=', 'rate_masters.r_id')
        ->get(['rate_masters.*', 'rates.*']);
        return view('Report.Party_Labour', $data);
    }
   public function genratePDF_Party_Labour()
   {
       $data = [
           'title' => 'Party Labour Report',
           'date' => date('m/d/Y')
       ];
         
       $pdf = PDF::loadView('Report.Party_Labour_formatte', $data);
   
       return $pdf->download('Party Labour.pdf');
       
   }
}