<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;

class CartController extends Controller
{   
    public function UserLogin() {
        $user_id = Session::get('user_id');
        if(!$user_id) {
            return Redirect::to('/login')->send();
        }
    }

    public function show_cart(Request $request) {
        $this->UserLogin();
        $user_id = Session::get('user_id');
        $cart = DB::table('tbl_cart_product')->join('tbl_product', 'tbl_cart_product.product_id', '=', 'tbl_product.id')->where('tbl_cart_product.user_id', $user_id)->where('tbl_cart_product.status', 1)->get(['tbl_cart_product.id', 'tbl_cart_product.product_id',  'tbl_product.product_name' , 'tbl_product.image', 'tbl_product.price', 'tbl_cart_product.size', 'tbl_cart_product.quantity']);

        return view('pages.cart.show_cart')->with('cart', $cart);
    }

    public function add_to_cart(Request $request) {
        $this->UserLogin();

        $data = array();
        $user_id = Session::get('user_id');

        if($user_id) 
        {
            $data['user_id'] = $user_id;
            $data['product_id'] = $request->product_id;
            $data['quantity'] = $request->quantity;
            $data['size'] = $request->size;
            $data['status'] = 1;

            $product = DB::table('tbl_cart_product')->where('user_id', $data['user_id'])->where('product_id', $data['product_id'])->where('size', $data['size'])->get();

            if(count($product) > 0) 
            {   
                foreach($product as $key => $value) {
                    $quantity_old = $value->quantity;
                }
            
                $quantity_new = $quantity_old + $data['quantity'];
                $update_quantity = DB::table('tbl_cart_product')->where('user_id', $data['user_id'])->where('product_id', $data['product_id'])->where('size', $data['size'])->update(['quantity' => $quantity_new]);

                if($update_quantity) 
                {
                    return Redirect::to('/cart');
                } else 
                {
                    return Redirect::to('/products');
                }
            } 
            else 
            {
                $add_cart = DB::table('tbl_cart_product')->insert($data);
                if($add_cart) 
                {
                    return Redirect::to('/cart');
                } 
                else 
                {
                    return Redirect::to('/products');
                }
            }
        } 
        else 
        {
            Session::put('message', 'Vui lòng đăng nhập');
            return Redirect::to('/login');
        }
        
    }

    public function update_cart(Request $request) {
        $this->UserLogin();

        $qty = $request->qty;
        $size = $request->size;

        foreach ($qty as $key => $value) {
            DB::table('tbl_cart_product')->where('id', number_format($key))->update(['quantity' => $value]);
        }

        foreach ($size as $key => $value) {
            DB::table('tbl_cart_product')->where('id', number_format($key))->update(['size' => $value]);
        }
        
        return Redirect::to('/cart');
    }

    public function delete_cart($cart_id) {
        $this->UserLogin();
        
        DB::table('tbl_cart_product')->where('id', $cart_id)->delete();
        return Redirect::to('/cart');
    }

    public function delete_all_cart($user_id) {
        DB::table('tbl_cart_product')->where('user_id', $user_id)->update(['status' => 0]);
    }
}
