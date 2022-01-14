<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    public function save_payment($method) {
        $id = DB::table('tbl_payment_method')->insertGetId(['payment_method' => $method]);
        return $id;
    }
}
