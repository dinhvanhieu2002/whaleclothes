<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{   
    public function AuthLogin() {
        $admin_id = Session::get('admin_id');
        if($admin_id) {
            return Redirect::to('dashboard');
        } else {
            return Redirect::to('admin')->send();
        }
    }

    public function add_brand_product() {
        $this->AuthLogin();
        return view('admin.add_brand_product');
    }

    public function all_brand_product() {
        $this->AuthLogin();
        $all_brand_product = DB::table('tbl_brand_product')->get();
        return view('admin.all_brand_product')->with('all_brand_product', $all_brand_product);
    }

    public function save_brand_product(Request $request) {
        $this->AuthLogin();
        $data = array();

        $data['brand_name'] = $request->brand_name;
        $data['brand_desc'] = $request->editor1;

        DB::table('tbl_brand_product')->insert($data);
        Session::put('message', 'Thêm thương hiệu sản phẩm thành công!');
        return Redirect::to('/add-brand-product');
    }

    public function update_brand_product(Request $request) {
        $this->AuthLogin();
        $data = array();
        
        $brand_id = $request->update_brand_id;
        $data['brand_name'] = $request->update_brand_name;
        $data['brand_desc'] = $request->update_brand_desc;

        DB::table('tbl_brand_product')->where('id', $brand_id)->update($data);
        return Redirect::to('/all-brand-product');
    }

    public function delete_brand_product(Request $request) {
        $this->AuthLogin();

        $brand_id = $request->del_brand_id;

        DB::table('tbl_brand_product')->where('id', $brand_id)->delete();
        return Redirect::to('/all-brand-product');
    }
    //end-backend

    //frontends

    public function UserLogin() {
        $user_id = Session::get('user_id');
        if(!$user_id) {
            return Redirect::to('/login')->send();
        }
    }
    public function show_brand_product($brand_id) {
        // $this->UserLogin();

        $all_category_product = DB::table('tbl_category_product')->get();
        $all_brand_product = DB::table('tbl_brand_product')->get();

        $product_by_brand = DB::table('tbl_product')->join('tbl_brand_product', 'tbl_brand_product.id', '=', 'tbl_product.brand_id')->where('brand_id', $brand_id)->get();
        return view('pages.brand.show_brand')->with('product_by_brand', $product_by_brand)->with('all_category_product', $all_category_product)->with('all_brand_product', $all_brand_product);

    }
}
