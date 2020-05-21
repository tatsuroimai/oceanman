<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PostAddRequest;
use App\Http\Requests\PostUpdateRequest;

class PostController extends Controller
{
    public function index(Request $request){
        $items = Post::orderBy('id', 'desc')->get();

        return view('post.index', ['items'=>$items]);
    }


    public function add(Request $request){
        return view('post.add');
    }

    public function create(PostAddRequest $request){

        $postimagename = $request->file('image')->hashName();
        $request->file('image')->storeAs('public/post', $postimagename);

        $id = Auth::id();

        $param = [
            'title'=>$request->title,
            'message'=>$request->message,
            'topic'=>$request->topic,
            'image'=>$postimagename,
            'user_id'=>$id,
        ];
        
        $post = new Post;
        $post->fill($param)->save();
        return redirect()->back()->with('post_success', '投稿しました。');

    }

    public function show(Request $request){
        $showpost = Post::find($request->post_id);

        $showcomments = Comment::where('post_id', $request->post_id)->get();

        return view('post.show', compact('showpost','showcomments'));
    }

    public function edit(Request $request){
        $editpost = Post::find($request->post_id);

        return view('post.edit', compact('editpost'));
    }

    public function update(PostUpdateRequest $request){

        // $editimagename = $request->file('image')->hashName();
        // $request->file('image')->storeAs('public/post', $editimagename);

        $id = Auth::id();

        $param = [
            'title'=>$request->title,
            'message'=>$request->message,
            'topic'=>$request->topic,
            // 'image'=>$editimagename,
            'user_id'=>$id,
        ];
        
        $post = Post::find($request->id);
        $post->fill($param)->save();
        return redirect()->back()->with('post_success', 'ポストを編集しました。');

    }

    public function delete(Request $request){
        $deletepost = Post::find($request->post_id);
        return view('post.delete', compact('deletepost'));
    }

    public function remove(Request $request){
        $post = Post::find($request->id);
        
        $delimgname = $post->image;
        Storage::delete('public/post/' . $delimgname);

        Post::find($request->id)->delete();

        return redirect('/');
    }
}
