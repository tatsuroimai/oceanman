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

        $inputtopic = Topic::where('topic', $request->topic)->first();
        if(empty($inputtopic)){
            $topic = new Topic;
            $topic->topic = $request->topic;
            $topic->save();
        }

        $id = Auth::id();
        $posttopic = Topic::where('topic', $request->topic)->first();
        $param = [
            'title'=>$request->title,
            'message'=>$request->message,
            'topic_id'=>$posttopic->id,
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
        $showcomments = $showpost->comments()->get();
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

    public function search(Request $request){
        $authUser = Auth::user();
        $topics = Topic::all();

        $keyword = $request->keyword;    
        $topic = $request->topic;
        $searchtopic = Topic::where('topic', $request->topic)->first();

        


        if($keyword && $topic != 'トピックで検索'){
            $topicposts = $searchtopic->posts();  
            $posts = $topicposts->where('title', 'like', '%'.$keyword.'%')
                                ->orWhere('message', 'like', '%'.$keyword.'%')
                                ->get();   
            if($posts->isEmpty()){
                $posts = null;
            }  

            $users = User::where('name', 'like', '%'.$keyword.'%')->get();
            if($users->isEmpty()){
                $users = null;
            }

        }elseif(empty($keyword) && $topic != 'トピックで検索'){
            $posts = $searchtopic->posts()->get();  
            $users = null;

        }elseif($keyword && $topic == 'トピックで検索'){
            $posts = Post::where('title', 'like', '%'.$keyword.'%')
                            ->orWhere('message', 'like', '%'.$keyword.'%')->get(); 
                            // ->orWhereHas('user', function ($query) use ($keyword){
                            //     $query->where('name', 'like', '%'.$keyword.'%');
                            // })->get();  
            if($posts->isEmpty()){
                $posts = null;
            }  
            
            $users = User::where('name', 'like', '%'.$keyword.'%')->get();  
            if($users->isEmpty()){
                $users = null;
            }
           
        }else{
            return redirect()->back();
        }
        return view('post.search', compact('authUser','topics','posts','users'));
    }
}

// $users = User::where('name', 'like', '%'.$keyword.'%')->get();