<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Validator;

class CommentController extends Controller
{
    public function add(Request $request){
        $id = Auth::id();

        $param = [
            'comment'=>$request->comment,
            'user_id'=>$id,
            'post_id'=>$request->post_id,
        ];

        $comment = new Comment;
        $comment->fill($param)->save();
        return redirect()->back();
        // return view('post.show');
    }
}
