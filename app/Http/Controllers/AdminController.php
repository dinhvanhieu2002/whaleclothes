<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class AdminController extends Controller
{
    public function AuthLogin() {
        $admin_id = Session::get('admin_id');
        if($admin_id) {
            return Redirect::to('dashboard');
        } else {
            return Redirect::to('admin')->send();
        }
    }
    public function index() {
        return view('admin_login');
    }

    public function show_dashboard() {
        $this->AuthLogin();
        return view('admin.dashboard');
    }

    public function dashboard(Request $request) {
        $username = $request->username;
        $password = md5($request->password);

        $result = DB::table('tbl_admin')->where('username',$username)->where('password',$password)->first();

        if($result) {
            Session::put('admin_id', $result->id);
            Session::put('admin_username', $result->username);
            return Redirect::to('/dashboard');
        } else {
            Session::put('message', 'Sai tài khoản hoặc mật khẩu. Vui lòng nhập lại');
            return Redirect::to('/admin');
        }
        
        return view('admin.dashboard');
    }

    public function logout() {
        $this->AuthLogin();
        Session::put('admin_id', null);
        Session::put('admin_username', null);
        return Redirect::to('/admin');
    }
}
