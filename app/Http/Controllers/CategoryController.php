<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{   
    public function AuthLogin() {
        $admin_id = Session::get('admin_id');
        if($admin_id) {
            return Redirect::to('dashboard');
        } else {
            return Redirect::to('admin')->send();
        }
    }

    public function add_category_product() {
        $this->AuthLogin();
        return view('admin.add_category_product');
    }

    public function all_category_product() {
        // $all_category_product = DB::table('tbl_category_product')->get();
        // $manager_category_product = view('admin.all_category_product')->with('all_category_product', $all_category_product);
        // return view('admin_layout')->with('admin.all_category_product', $manager_category_product);
        $this->AuthLogin();
        $all_category_product = DB::table('tbl_category_product')->get();
        return view('admin.all_category_product')->with('all_category_product', $all_category_product);
    }

    public function save_category_product(Request $request) {
        $this->AuthLogin();
        $data = array();

        $data['category_name'] = $request->cate_name;
        $data['category_desc'] = $request->editor1;

        DB::table('tbl_category_product')->insert($data);
        Session::put('message', 'Thêm danh mục sản phẩm thành công!');
        return Redirect::to('/add-category-product');
    }

    public function update_category_product(Request $request) {
        $this->AuthLogin();
        $data = array();
        
        $cate_id = $request->update_cate_id;
        $data['category_name'] = $request->update_cate_name;
        $data['category_desc'] = $request->update_cate_desc;

        DB::table('tbl_category_product')->where('id', $cate_id)->update($data);
        return Redirect::to('/all-category-product');
    }

    public function delete_category_product(Request $request) {
        $this->AuthLogin();

        $cate_id = $request->del_cate_id;

        DB::table('tbl_category_product')->where('id', $cate_id)->delete();
        return Redirect::to('/all-category-product');
    }

    public function UserLogin() {
        $user_id = Session::get('user_id');
        if(!$user_id) {
            return Redirect::to('/login')->send();
        }
    }

    public function show_category_product($category_id) {
        // $this->UserLogin();

        $all_category_product = DB::table('tbl_category_product')->get();
        $all_brand_product = DB::table('tbl_brand_product')->get();
        // $product_by_cate = DB::table('tbl_product')->join('tbl_category_product', 'tbl_category_product.id', '=', 'tbl_product.category_id')->where('tbl_product.category_id', $category_id)->get();
        $product_by_cate = DB::table('tbl_product')->where('category_id', $category_id)->get();

        return view('pages.category.show_category')->with('product_by_cate', $product_by_cate)->with('all_category_product', $all_category_product)->with('all_brand_product', $all_brand_product);
    }
}
