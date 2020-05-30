<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Validator;

class CommentController extends Controller
{
    // ポストの個別表示ページでコメントを追加
    public function add(Request $request){
        $authUserId = Auth::id();

        $param = [
            'comment'=>$request->comment,
            'user_id'=>$authUserId,
            'post_id'=>$request->post_id,
        ];

        $comment = new Comment;
        $comment->fill($param)->save();
        return redirect()->back();
        
    }
}
