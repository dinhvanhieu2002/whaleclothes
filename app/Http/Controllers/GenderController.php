<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;

class GenderController extends Controller
{
    public function show_product_gender($gender) {

        $all_category_product = DB::table('tbl_category_product')->get();
        $all_brand_product = DB::table('tbl_brand_product')->get();

        $product_by_gender = DB::table('tbl_product')->where('gender', $gender)->get();
        return view('pages.gender.show_gender')->with('product_by_gender', $product_by_gender)->with('all_category_product', $all_category_product)->with('all_brand_product', $all_brand_product);

    }
}
