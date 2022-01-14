<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;


class CheckoutController extends Controller
{   
    public function UserLogin() {
        $user_id = Session::get('user_id');
        if(!$user_id) {
            return Redirect::to('/login')->send();
        }
    }

    public function show_checkout(Request $request) {
        $this->UserLogin();
        $user_id = Session::get('user_id');

        $cart = DB::table('tbl_cart_product')->join('tbl_product', 'tbl_cart_product.product_id', '=', 'tbl_product.id')->where('tbl_cart_product.user_id', $user_id)->where('tbl_cart_product.status', 1)->get(['tbl_cart_product.id', 'tbl_cart_product.product_id',  'tbl_product.product_name' , 'tbl_product.image', 'tbl_product.price', 'tbl_cart_product.size', 'tbl_cart_product.quantity']);
        $shipping = DB::table('tbl_shipping')->where('user_id', $user_id)->get();

        return view('pages.checkout.show_checkout')->with('cart', $cart)->with('user_id', $user_id)->with('shipping', $shipping);
    }

    public function save_checkout(Request $request) {
        $user_id = $request->user_id;
        $total = $request->total;
        $method = $request->method;
        $shipping_id = $request->shipping_id;

        $payment_id = app('App\Http\Controllers\PaymentController')->save_payment($method);
        $order = app('App\Http\Controllers\OrderController')->save_order($user_id, $shipping_id, $payment_id, $total);
        $delete_cart = app('App\Http\Controllers\CartController')->delete_all_cart($user_id);

        return Redirect::to('/');

        //how to call controller function
        //$result = (new OtherController)->method();
        //app('App\Http\Controllers\OtherController')->method();

        // $order = Redirect::to('/save-order')->with(['user_id' => $user_id, 'total' => $total, 'shipping_id' => $shipping_id]);
        //tao db order + order detail + payment // order controller + paymentcontroller
        //1.select id shipping
        //2.insert payment + get id -> return save order 
        //3.insert order + get id
        //4.insert order-detail - qh nhiều
        //5.delete cart with id user
    }
}
