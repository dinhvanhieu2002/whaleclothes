<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{   

    public function load_comment(Request $request) {
        $product_id = $request->loadcmt_product_id;

        $comments = DB::table('tbl_comment')->join('tbl_user', 'tbl_comment.user_id', '=','tbl_user.id')->where('product_id', $product_id)->orderBy('tbl_comment.id', 'Desc')->get(['tbl_user.user_name', 'tbl_comment.content', 'tbl_comment.time']);
        // return $comments;
        // 'tbl_user.user_name', 'tbl_comment.content', 'tbl_comment.time'

        return response()->json([
            'comments' => $comments,
        ]);
    }

    public function add_comment(Request $request) {
        
        if(!isset($request->user_id)) {
            return view('pages.login');
        } else {

            $data = array();
            $data['user_id'] = $request->user_id;
            $data['product_id'] = $request->product_id;
            $data['content'] = $request->comment_content;

            $data['time'] = date("Y-m-d h:i:sa");

            $user_name = Session::get('user_name');

            $add_comment = DB::table('tbl_comment')->insert($data);
            
            return response()->json([
                'data' => $data,
                'username' => $user_name,
                'status' => 200,
                'message' => 'comment add successfully'
            ]);
        }
    }
}
