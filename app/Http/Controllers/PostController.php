<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index(Request $request){
        $items = Post::orderBy('id', 'desc')->get();

        return view('post.index', ['items'=>$items]);
    }


    public function add(Request $request){
        return view('post.add');
    }

    public function create(Request $request){
        $rules = [
            'image' => 'image|required',
            'title' => 'required',
            'message' => 'nullable', 
            'topic' => 'required',         
        ];
        $messages = [
            'image.integer' => '画像ファイルを選択してください',
            'image.required' => '画像が選択されていません',
            'title.required' => 'タイトルが未入力です',
            'topic.required' => 'トピックが未入力です',
                      
        ];
        $validator = Validator::make($request->all(),$rules,$messages);

        if($validator->fails()){
            return redirect('/post/create')
                ->withErrors($validator)
                ->withInput();
        }

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

    public function update(Request $request){
        $rules = [
            'title' => 'required',
            'message' => 'nullable', 
            'topic' => 'required',         
        ];
        $messages = [
            'title.required' => 'タイトルが未入力です',
            'topic.required' => 'トピックが未入力です',
                      
        ];
        $validator = Validator::make($request->all(),$rules,$messages);

        if($validator->fails()){
            return redirect('/post/update')
                ->withErrors($validator)
                ->withInput();
        }

        

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
