<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;

class ShippingController extends Controller
{   
    //backend
    public function AuthLogin() {
        $admin_id = Session::get('admin_id');
        if($admin_id) {
            return Redirect::to('dashboard');
        } else {
            return Redirect::to('admin')->send();
        }
    }

    public function shipping_address($shipping_id) {
        $this->AuthLogin();
        $shipping_address = DB::table('tbl_shipping')->where('id', $shipping_id)->get();
        return view('admin.shipping_address')->with('shipping_address', $shipping_address);
    }


    //frontend
    public function UserLogin() {
        $user_id = Session::get('user_id');
        if(!$user_id) {
            return Redirect::to('/login')->send();
        }
    }

    public function save_shipping(Request $request) {
        $this->UserLogin();
        $data = array();

        $data['user_id'] = $request->user_id;
        $data['fname'] = $request->fname;
        $data['lname'] = $request->lname;
        $data['phone'] = $request->phone;
        $data['email'] = $request->email;
        $data['address'] = $request->address;

        $save = DB::table('tbl_shipping')->insert($data);
        return Redirect::to('/checkout');
    }

    public function delete_shipping(Request $request) {
        $this->UserLogin();
        $id = $request->del_shipping_id;
        DB::table('tbl_shipping')->where('id', $id)->delete();
        return Redirect::to('/checkout');
    }
}
