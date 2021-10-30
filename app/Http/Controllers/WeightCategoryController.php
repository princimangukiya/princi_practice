<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use App\Models\RateMaster;
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
        $data['weightCategory'] = Rate::where('c_id', $c_id)->get();
        // echo $data['WorkingStock'];
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
        $rates = RateMaster::where('c_id', $c_id)->get();
        $jsonArr = "";
        foreach ($rates as $value) {
            $jsonArr .= $value->json_price;
        }
        // echo $jsonArr;
        $matchStr = '"' . $id . '"' . ":";
        // echo $matchStr;
        if (preg_match("/$matchStr/i", $jsonArr)) {
            $notification = array(
                'message' => 'This Weight Category Alredy Used..',
                'alert-type' => 'danger'
            );
            return redirect('/weight-category')->with($notification);
        } else {
            Rate::where('r_id', $id)->delete();
            return redirect('/weight-category');
        }
    }
}
