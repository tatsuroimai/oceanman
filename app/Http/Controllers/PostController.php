<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use Illuminate\Support\Facades\Auth;
use Validator;
use Storage;
use App\Http\Requests\PostAddRequest;
use App\Http\Requests\PostUpdateRequest;
use App\User;
use App\Topic;

class PostController extends Controller
{
    public function index(Request $request){
        $authUser = Auth::user();
        $posts = Post::orderBy('id', 'desc')->get();
        $topics = Topic::all();
        return view('post.index', compact('authUser','posts','topics'));
    }
    public function add(Request $request){
        $authUser = Auth::user();
        $topics = Topic::all();
        return view('post.add', compact('authUser','topics'));
    }
    public function create(PostAddRequest $request){
        $postimage = $request->file('image');
        // dd($postimage);
        $path = Storage::disk('s3')->putFile('postimages',$postimage,'public');
        $id = Auth::id();
        $param = [
            'title'=>$request->title,
            'message'=>$request->message,
            'topic'=>$request->topic,
            'image'=>Storage::disk('s3')->url($path),
            'user_id'=>$id,
        ];
        $post = new Post;
        $post->fill($param)->save();
        return redirect()->back()->with('post_success', '投稿しました。');
    }
    public function show(Request $request){
        $authUser = Auth::user();
        $topics = Topic::all();
        $showpost = Post::find($request->post_id);
        // $postuser = User::find($showpost->user_id);
        $showcomments = Comment::where('post_id', $request->post_id)->get();
        // $showcomments = $showpost->comments(); 的なできるんじゃね？
        return view('post.show', compact('authUser','showpost','showcomments','topics'));
    }
    public function edit(Request $request){
        $authUser = Auth::user();
        $topics = Topic::all();
        $editpost = Post::find($request->post_id);
        return view('post.edit', compact('authUser','editpost','topics'));
    }
    public function update(PostUpdateRequest $request){
        $authUserId = Auth::id();
        $param = [
            'title'=>$request->title,
            'message'=>$request->message,
            'topic'=>$request->topic,
            'user_id'=>$authUserId,
        ];
        $post = Post::find($request->postid);
        // var_dump($post);
        $post->fill($param)->save();
        return redirect()->back()->with('post_success', 'ポストを編集しました。');
    }
    public function delete(Request $request){
        $authUser = Auth::user();
        $topics = Topic::all();
        $deletepost = Post::find($request->post_id);
        return view('post.delete', compact('authUser','deletepost','topics'));
    }
    public function remove(Request $request){
        $post = Post::find($request->post_id);
        $deleteimage = basename($post->image);
        Storage::disk('s3')->delete('postimages/' . $deleteimage);
        $post->delete();
        return redirect('/');
    }
}
