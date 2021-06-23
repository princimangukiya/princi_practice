<?php

namespace App\Http\Controllers;

use App\Models\d_purchase;
use App\Models\supplier_details;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class SupplierController extends Controller
{
    public function index()
    {
        $data = array();
        $data['supplier'] = supplier_details::get();
        return view('supplier_details.index',$data);
    }

    public function create()
    {
        return view('supplier_details.create');
    }

    public function store(Request $request)
    {
        
        try {
            $validator = Validator::make($request->all(), [
                's_name' => 'required',
                's_address' => 'required',
                's_gst' => 'required|unique:supplier_details,s_gst',

            ]);
            //dd($request);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput($request->all());
            }

            $newitem = new supplier_details();
            $newitem->s_name = !empty($request->s_name) ? $request->s_name : '';
            $newitem->s_address = !empty($request->s_address) ? $request->s_address : '';
            $newitem->s_gst = !empty($request->s_gst) ? $request->s_gst : '';
            $newitem->save();

            return Redirect::to('/supplier')->with($notification);
/*
            $parent = 0;
            if ($request->refer_code != null) {
                $parent_id = User::whereReferralCode($request->refer_code)->first();
                if ($parent_id != null) {
                    $parent = $parent_id->id;
                }
            }

           // dd($request->avatar);
           if ($request->hasFile('avatar')) {
            $type = $request->file('avatar')->getMimeType();
            if (strpos($type, 'image/') !== false) {
                //dd($request->avatar);
                $image = substr(($request->input('name')), 0, 10) . '_' . rand(10000,99999) . '.' . $request->avatar->getClientOriginalExtension();
                $request->avatar->move(public_path('/upload/avatar/'),$image);
                $image = '/upload/avatar/'.$image;
                
            }
            
                $refer_code = $request->username .'_'. rand(10000,99999);
                $newUser = array();

                $newUser['role_id'] = $request->role;
                $newUser['username'] = $request->username;
                $newUser['first_name'] = $request->first_name;
                $newUser['last_name'] = $request->last_name;
                $newUser['email'] = $request->email;
                $newUser['mobile_no'] = $request->phone;
                $newUser['avatar'] = $image;
                $newUser['referral_code'] = $refer_code;
                $newUser['parent_id'] = $parent;
                $newUser['password'] = Hash::make($request->password);

                $saveUser = User::create($newUser);
            }
            else{
                
                $refer_code = $request->username .'_'. rand(10000,99999);
                $newUser = array();

                $newUser['role_id'] = $request->role;
                $newUser['username'] = $request->username;
                $newUser['first_name'] = $request->first_name;
                $newUser['last_name'] = $request->last_name;
                $newUser['email'] = $request->email;
                $newUser['mobile_no'] = $request->phone;
                $newUser['referral_code'] = $refer_code;
                $newUser['parent_id'] = $parent;
                $newUser['password'] = Hash::make($request->password);

                $saveUser = User::create($newUser);

            }


            // $f = strtoupper(substr($saveUser->first_name, 0, 1));
            // $l = strtoupper(substr($saveUser->last_name, 0, 1));

            // $saveUserId = $saveUser->id;
            // $referal_code = $f . $l. $saveUserId;

            // $updateReferalCode = User::whereId($saveUserId)->update(['referral_code' => $referal_code]);

            if ($request->refer_code != null) {
                $parent_id = User::whereReferralCode($request->refer_code)->first();

                if ($parent_id != null) {
                    $parent = $parent_id->id;
                    $no_user_team = $parent_id->no_user_team;
                    $addUser=$no_user_team + 1;
                    User::whereId($parent)->upadte(['no_user_team' => $addUser]);
                    $Levels = array();
                    $Level = Level::whereUserId($parent)->first();

                    if ($Level == null) {
                        $childUserId=array();
                        $child=array_push($childUserId,$saveUser->id);
                        $userCreate=array();
                        $userCreate['user_id']=$parent;
                        $userCreate['child_user_id']=json_encode($childUserId);
                        $UserLevel=Level::create($userCreate);
                    }else{
                        $LevelUserId=$Level->user_id;
                        $LevelChild=json_decode($Level->child_user_id);
                        $child=array_push($LevelChild,$saveUser->id);
                        $userUpdate=array();
                        $userUpdate['child_user_id']=$LevelChild;
                        $UserLevel=$Level->update($userUpdate);

                    }
                }
            }

            Mail::to($saveUser->email)->send(new WelcomeMail());


            $notification = array(
                'message' => 'User can`t Add!',
                'alert-type' => 'success'
            );

            return Redirect::to('/admin/users')->with($notification);*/
        } catch (\Throwable $th) {
            $notification = array(
                'message' => 'User can`t Add!',
                'alert-type' => 'success'
            );

            return Redirect::to('/supplier')->with($notification);
        }
    }

    // supplier edit
    public function edit($id)
    {
        //dd($id);
        $data = array();
        $data['supplier']=supplier_details::findOrFail($id);
        return view('supplier_details.edit', $data);
    }

    // user update
    public function update(Request $request, $id)
    {

        try {
            $validator = Validator::make($request->all(), [
                's_name' => 'required',
                's_address' => 'required',
                's_gst' => 'required',

            ]);
            //dd($request);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput($request->all());
            }

            $newitem = array();
            $newitem['s_name'] = !empty($request->s_name) ? $request->s_name : '';
            $newitem['s_address'] = !empty($request->s_address) ? $request->s_address : '';
            $newitem['s_gst'] = !empty($request->s_gst) ? $request->s_gst : '';

            supplier_details::where('s_id',$id)->update($newitem);

            return Redirect::to('/supplier')->with($notification);
        
        } catch (\Throwable $th) {
            $notification = array(
                'message' => 'User can`t Update!',
                'alert-type' => 'error'
            );

            return Redirect::to('/supplier')->with($notification);
        }
    }

    // supplier delete
    public function destroy($id)
    {
        //
        $suplier = supplier_details::find($id);
        $suplier->delete();
        $notification = array(
            'message' => 'User Deleted!',
            'alert-type' => 'success'
        );

        return Redirect::to('/supplier')->with($notification);

    }
}
