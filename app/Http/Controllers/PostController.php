<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Http\Requests\PostAddRequest;
use App\Http\Requests\PostUpdateRequest;
use App\User;
use Storage;

class PostController extends Controller
{
    public function index(Request $request){
        $authUser = Auth::user();
        $items = Post::orderBy('id', 'desc')->get();

        return view('post.index', compact('authUser','items'));
    }


    public function add(Request $request){
        $authUser = Auth::user();
        return view('post.add', compact('authUser'));
    }

    public function create(PostAddRequest $request){

        // $postimagename = $request->file('image')->hashName(); ←多分あってる
        $postimagename = $request->file('image');
        // $path = Storage::disk('s3')->putFile('/',$postimagename,'public');
        dd(Storage::disk('s3')->putFile('/',$postimagename,'public'));


        // $request->file('image')->storeAs('public/post', $postimagename);

        $id = Auth::id();

        
        

        $param = [
            'title'=>$request->title,
            'message'=>$request->message,
            'topic'=>$request->topic,
            'image'=>Storage::disk('s3')->url($postimagename),
            'user_id'=>$id,
        ];
        
        $post = new Post;
        // $post->image = Storage::disk('s3')->url($postimagename);
        $post->fill($param)->save();
        return redirect()->back()->with('post_success', '投稿しました。');

    }

    public function show(Request $request){
        $authUser = Auth::user();
        
        $showpost = Post::find($request->post_id);

        $postuser = User::find($showpost->user_id);

        $showcomments = Comment::where('post_id', $request->post_id)->get();
        $showcomments2 = Comment::where('post_id', $request->post_id);

        $showcommentsids = Comment::select('user_id')->where('post_id', $request->post_id)->get();

        $users = User::all();

        return view('post.show', compact('authUser','showpost','postuser','showcomments','showcomments2','showcommentsids','users'));
    }

    public function edit(Request $request){
        $authUser = Auth::user();
        $editpost = Post::find($request->post_id);

        return view('post.edit', compact('authUser','editpost'));
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
        $authUser = Auth::user();

        $deletepost = Post::find($request->post_id);
        return view('post.delete', compact('authUser','deletepost'));
    }

    public function remove(Request $request){
        $post = Post::find($request->id);
        
        $delimgname = $post->image;
        Storage::delete('public/post/' . $delimgname);

        Post::find($request->id)->delete();

        return redirect('/');
    }
}
