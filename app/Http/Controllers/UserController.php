<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function show_signup() {
        return view('pages.signup');
    }

    public function show_login() {
        return view('pages.login');
    }

    public function signup(Request $request) {
        $data = array();

        $data['full_name'] = $request->fullname;
        $data['user_name'] = $request->username;
        $data['email'] = $request->email;
        $data['password'] = md5($request->password);
        $data['phone'] = $request->phone;

        if($data['full_name'] =='' || $data['user_name'] =='' || $data['email'] =='' || $data['password'] =='' || $data['phone'] =='') {
            $error = "<span class='error'>Fields must be not empty</span>";
        } else {
            $check_email = DB::table('tbl_user')->where('email', $data['email'])->first();
            $check_username = DB::table('tbl_user')->where('user_name', $data['user_name'])->first();

            if($check_username) {
                $error = "<span class='error'>User name has been existed</span>";
            } else if($check_email) {
                $error = "<span class='error'>Email has been existed</span>";
            } else {
                $new_user = DB::table('tbl_user')->insert($data);
                if($new_user) {
                    $success = "<span class='success'>Sign up successfully</span>";
                    return Redirect::to('/login');
                } else {
                    $error = "<span class='error'>Sign up not successfully</span>";
                }
            }
        }

        Session::put('error_signup', $error);
        return Redirect::to('signup');
        
    }

    public function login(Request $request) {
        $username = $request->username;
        $password = md5($request->password);

        $result = DB::table('tbl_user')->where('user_name',$username)->where('password',$password)->first();

        if($result) {
            Session::put('user_id', $result->id);
            Session::put('user_name', $result->user_name);
            return Redirect::to('/');
        } else {
            Session::put('message', 'Sai tài khoản hoặc mật khẩu. Vui lòng nhập lại');
            return Redirect::to('/login');
        }
        
    }

    public function logout() {     
        Session::put('user_id', null);
        Session::put('user_name', null);
        return Redirect::to('/login');
    }
}
