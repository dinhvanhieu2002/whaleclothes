<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function load_search(Request $request) {
        $txtSearch = $request->txtSearch;


        $result = DB::table('tbl_product')->where('product_name','like', '%'.$txtSearch.'%')->get();

        $op = "";
        foreach($result as $key => $value) {
            $link = url('/product-detail/'.$value->id);
            $image = url('/').'/public/uploads/product/'.$value->image;
            $op .= "<div class='col-md-6 col-xl-4'>
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
            'search_products' => $op,
            ]);
    }
}
