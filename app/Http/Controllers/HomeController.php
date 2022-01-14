<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{   
    public function UserLogin() {
        $user_id = Session::get('user_id');
        if(!$user_id) {
            return Redirect::to('/login')->send();
        }
    }

    public function index() {
        // $this->UserLogin();

        $feature_product = DB::table('tbl_product')->limit(1)->get();
        $new_product = DB::table('tbl_product')->offset(1)->limit(6)->get();
        return view('pages.home')->with('feature_product', $feature_product)->with('new_product', $new_product);
    }

    public function loadMore(Request $request) {
        // $this->UserLogin();
        
        $data = $request->total;
        $end = $data + 4;
        
        $result = DB::table('tbl_product')->offset($data)->limit($end)->get();

        $op = "";
        foreach($result as $key => $value) {
            $link = url('/product-detail/'.$value->id);
            $image = url()->previous().'public/uploads/product/'.$value->image;
            $op.="<div class='product col-md-6 col-xl-3'>
                <div class='box'>
	                <a href='".$link."'>
                        <div class='img-box'>
                            <img src='".$image."' alt=''>
                        </div>
                        <div class='detail-box'>
                            <h6>".$value->product_name."</h6>
                            <h6>
                                Price:
                                <span>".$value->price."$</span>
                            </h6>
                        </div>
                        <div class='new'>
                            <span> New </span>
                        </div>
	                </a>
                </div>
            </div>";
        }
        return response()->json([
            'more_products' => $op,
            ]);
    }
}
