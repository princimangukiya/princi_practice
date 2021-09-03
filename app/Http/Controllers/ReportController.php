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
    //All Report genrate PDF
    public function Inward_Outward()
    {
        return view('Report.Inward_Outward');
    }
    public function genratePDF()
   {
       $data = [
           'title' => 'Inward_Outward Report',
           'date' => date('m/d/Y')
       ];
         
       $pdf = PDF::loadView('Report.Inward_Outward_Formatte', $data);
   
       return $pdf->download('Inward_Outward.pdf');
       
   }

   //Party_Labour Genrate PDF
   public function Party_Labour()
    {
        return view('Report.Party_Labour');
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