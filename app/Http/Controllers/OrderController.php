<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{   
    // backend
    public function AuthLogin() {
        $admin_id = Session::get('admin_id');
        if($admin_id) {
            return Redirect::to('dashboard');
        } else {
            return Redirect::to('admin')->send();
        }
    }

    public function all_order(Request $request) {
        $this->AuthLogin();
        $all_order = DB::table('tbl_order')->join('tbl_payment_method', 'tbl_order.payment_id', '=', 'tbl_payment_method.id')->get('*', 'tbl_payment_method.payment_method');
        return view('admin.all_order')->with('all_order', $all_order);
    }

    public function order_detail($order_id) {
        $this->AuthLogin();
        $all_order_detail = DB::table('tbl_order_detail')->join('tbl_product', 'tbl_product.id', '=', 'tbl_order_detail.product_id')->where('tbl_order_detail.order_id', $order_id)->get(['tbl_product.product_name', 'tbl_product.image', 'tbl_product.price', 'tbl_order_detail.quantity', 'tbl_order_detail.size']);
        return view('admin.order_detail')->with('all_order_detail', $all_order_detail);
    }

    public function update_order(Request $request) {
        $this->AuthLogin();

        $order_id = $request->update_order_id;
        $status = $request->update_status;
        DB::table('tbl_order')->where('id', $order_id)->update(['status' => $status]);
        return Redirect::to('/all-order');
    }


    // frontend
    public function save_order($user_id, $shipping_id, $payment_id, $total) {
        $cart = DB::table('tbl_cart_product')->where('user_id', $user_id)->where('status', 1)->get();
        $order_id = DB::table('tbl_order')->insertGetId([
            'user_id' => $user_id,
            'shipping_id' => $shipping_id,
            'payment_id' => $payment_id,
            'date' => date('D, d M Y H:i:s'),
            'total' => $total,
            'status' => 'unpaid'
        ]);

        foreach($cart as $key => $value) {
            $order_detail = DB::table('tbl_order_detail')->insert([
                'order_id' => $order_id,
                'product_id' => $value->product_id,
                'quantity' => $value->quantity,
                'size' => $value->size
            ]);

            $update_quantity_product = DB::table('tbl_size_product')->where('product_id', $value->product_id)->where('size', $value->size)->decrement('quantity', $value->quantity);
        }
    
    }

}
