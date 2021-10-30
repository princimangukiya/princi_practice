<?php

namespace App\Http\Controllers;

use App\Models\rate;
use App\Models\rate_master;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Response;
use Illuminate\Validation\Rule;


class WeightCategoryController extends Controller
{

    public function index()
    {
        $data = array();
        $c_id = session()->get('c_id');
        $data['weightCategory'] = rate::where('c_id', $c_id)->get();
        // echo $data['working_stock'];
        return view('Weight_Category.index', $data);
    }
    //Weight Category Store
    public function create()
    {
        $c_id =  session()->get('c_id');
        $data = array();
        return view('Weight_Category.create', $data);
    }
    // Weight Category delete
    public function destroy($id)
    {
        $c_id = session()->get('c_id');
        $rates = rate_master::where('c_id', $c_id)->get();
        $jsonArr = "";
        foreach ($rates as $value) {
            $jsonArr .= $value->json_price;
        }
        // echo $jsonArr;
        $matchStr = '"' . $id . '"' . ":";
        // echo $matchStr;
        if (preg_match("/$matchStr/i", $jsonArr)) {
            $notification = array(
                'message' => 'This Weight Category Alredy Use..',
                'alert-type' => 'danger'
            );
            return redirect('/weight-category')->with($notification);
        } else {
            rate::where('r_id', $id)->delete();
            $notification = array(
                'message' => 'Weight Category Is Deleted !',
                'alert-type' => 'Success'
            );
            return redirect('/weight-category')->with($notification);
        }
    }
}