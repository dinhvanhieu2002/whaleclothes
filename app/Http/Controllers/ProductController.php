<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

use App\Http\Controllers\Controller;

class ProductController extends Controller
{   
    public function AuthLogin() {
        $admin_id = Session::get('admin_id');
        if($admin_id) {
            return Redirect::to('dashboard');
        } else {
            return Redirect::to('admin')->send();
        }
    }

    public function add_product() {
        $this->AuthLogin();
        $all_category_product = DB::table('tbl_category_product')->get();
        $all_brand_product = DB::table('tbl_brand_product')->get();
        return view('admin.add_product')->with(['all_category_product'=>$all_category_product, 'all_brand_product'=>$all_brand_product]);
    }

    public function all_product() {
        $this->AuthLogin();
        $all_product = DB::table('tbl_product')->where('status', 1)->get();
        return view('admin.all_product')->with('all_product', $all_product);
    }

    public function save_product(Request $request) {
        $this->AuthLogin();
        $data = array();
        $data_size = array();

        $data['category_id'] = $request->product_category;
        $data['brand_id'] = $request->product_brand;
        $data['product_name'] = $request->product_name;
        $data['product_desc'] = $request->editor1;
        $data['price'] = $request->price;
        $data['gender'] = $request->gender;

        $image = $request->file('image');
        $storedPath = $image->storeAs('product',$image->getClientOriginalName(), 'local');
        $data['image'] = $image->getClientOriginalName();

        $data['status'] = 1;

        $product_id = DB::table('tbl_product')->insertGetId($data);
        $data_size['product_id'] = $product_id;

        if(isset($request->sizeS)) {
            $data_size['size'] = $request->sizeS;
            $data_size['quantity'] = $request->quantityS;
            DB::table('tbl_size_product')->insert($data_size);
        }

        if(isset($request->sizeM)) {
            $data_size['size'] = $request->sizeM;
            $data_size['quantity'] = $request->quantityM;
            DB::table('tbl_size_product')->insert($data_size);
        }

        if(isset($request->sizeL)) {
            $data_size['size'] = $request->sizeL;
            $data_size['quantity'] = $request->quantityL;
            DB::table('tbl_size_product')->insert($data_size);
        }
        
        Session::put('message', 'Thêm sản phẩm thành công!');
        return Redirect::to('/add-product');
    }

    public function update_product(Request $request) {
        $this->AuthLogin();
        $data = array();
        
        $product_id = $request->update_product_id;
        $data['product_name'] = $request->update_product_name;
        $data['product_desc'] = $request->update_product_desc;
        $data['price'] = $request->update_product_price;

        $image = $request->file('update_product_image');
        $storedPath = $image->storeAs('product',$image->getClientOriginalName(), 'local');
        $data['image'] = $image->getClientOriginalName();
        // $data['image'] = $request->update_product_image;


        DB::table('tbl_product')->where('id', $product_id)->update($data);
        return Redirect::to('/all-product');
    }

    public function delete_product(Request $request) {
        $this->AuthLogin();

        $product_id = $request->del_product_id;

        DB::table('tbl_product')->where('id', $product_id)->delete();
        DB::table('tbl_size_product')->where('product_id', $product_id)->delete();
        return Redirect::to('/all-product');
    }

    public function size_by_product(Request $request) {
        $this->AuthLogin();
        $product_id = $request->productid;
        $sizes = DB::table('tbl_size_product')->where('product_id', $product_id)->get();
        return view('admin.size_by_product')->with('sizes', $sizes);
    }

    //frontend--------------------------------------------------------------
    public function UserLogin() {
        $user_id = Session::get('user_id');
        if(!$user_id) {
            return Redirect::to('/login')->send();
        }
    }

    public function show_product() {
        // $this->UserLogin();

        $all_category_product = DB::table('tbl_category_product')->get();
        $all_brand_product = DB::table('tbl_brand_product')->get();
        // $qty_product = DB::table('tbl_product')->count('id');
        // $pages = ceil($qty_product / 9);
        $products = DB::table('tbl_product')->where('status', 1)->paginate(9);

        return view('pages.products')->with('all_category_product', $all_category_product)->with('all_brand_product', $all_brand_product)->with('products', $products);
    }

    public function show_product_detail($product_id) {
        // $this->UserLogin();
        $user_id = Session::get('user_id');

        $product_detail = DB::table('tbl_product')->where('id', $product_id)->get();
        // $comment_product = DB::table('tbl_comment')->where('product_id', $product_id)->where('user_id', $user_id)->get();
        
        return view('pages.product.show_product_detail')->with('product_detail', $product_detail)->with('product_id', $product_id);
    }


}
