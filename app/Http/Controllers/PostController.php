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
use DB;

class PostController extends Controller
{
    // ホーム画面、全てのポストを表示
    public function index(Request $request){
        $authUser = Auth::user();
        $posts = Post::orderBy('id', 'desc')->get();
        $topics = Topic::all();
        return view('post.index', compact('authUser','posts','topics'));
    }

    // ポスト投稿ページに移動
    public function add(Request $request){
        $authUser = Auth::user();
        $topics = Topic::all();
        return view('post.add', compact('authUser','topics'));
    }

    // ポストを投稿、ストレージに画像を保存
    public function create(PostAddRequest $request){
        $postimage = $request->file('image');
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

    // ポストを開く、タイトルやメッセージ、他のユーザーからのコメントなどを見る
    public function show(Request $request){
        $authUser = Auth::user();
        $topics = Topic::all();
        $showpost = Post::find($request->post_id);
        $showcomments = $showpost->comments()->get();
        // $showcomments = Comment::with('user')->where('post_id', $request->post_id)->get();
        return view('post.show', compact('authUser','showpost','showcomments','topics'));
    }

    // ポスト編集ページに移動
    public function edit(Request $request){
        $authUser = Auth::user();
        $topics = Topic::all();
        $editpost = Post::find($request->post_id);
        return view('post.edit', compact('authUser','editpost','topics'));
    }

    // ポストを編集して更新
    public function update(PostUpdateRequest $request){
        $authUserId = Auth::id();

        $edittopic = Topic::where('topic', $request->topic)->first();
        if(!$edittopic){
            $topic = new Topic;
            $topic->topic = $request->topic;
            $topic->save();

            $newtopic = Topic::where('topic', $request->topic)->first();
            $param = [
                'title'=>$request->title,
                'message'=>$request->message,
                'topic_id'=>$newtopic->id,
                'user_id'=>$authUserId,
            ];
            $post = Post::find($request->postid);
            $post->fill($param)->save();
            return redirect()->back()->with('post_success', 'ポストを編集しました。');

        }
        
        $param = [
            'title'=>$request->title,
            'message'=>$request->message,
            'topic_id'=>$edittopic->id,
            'user_id'=>$authUserId,
        ];
        $post = Post::find($request->postid);
        
        $post->fill($param)->save();
        return redirect()->back()->with('post_success', 'ポストを編集しました。');
    }

    // ポスト削除ページに移動
    public function delete(Request $request){
        $authUser = Auth::user();
        $topics = Topic::all();
        $deletepost = Post::find($request->post_id);
        return view('post.delete', compact('authUser','deletepost','topics'));
    }

    // ポストを削除、ストレージからも画像を削除
    public function remove(Request $request){
        $post = Post::find($request->post_id);
        $deleteimage = basename($post->image);
        Storage::disk('s3')->delete('postimages/' . $deleteimage);
        $post->delete();
        return redirect('/');
    }

    // キーワードとトピック、あるいはその組み合わせでユーザーやポストを検索
    public function search(Request $request){
        $authUser = Auth::user();
        $topics = Topic::all();

        $keyword = $request->keyword;    
        $topic = $request->topic;
        $searchtopic = Topic::where('topic', $request->topic)->first();

        if($keyword && ($topic != 'トピックで検索')){
            $topicposts = $searchtopic->posts();  
            // DB::enableQueryLog();

            // $posts = $topicposts->where('title', 'like', '%'.$keyword.'%')
            //                     ->orWhere('message', 'like', '%'.$keyword.'%')
            //                     ->get();  
            // $posts = $topicposts->where(function ($topicposts) use ($keyword) {
            //     $topicsposts->where('title', 'like', ‘ % ’ . $keyword . ‘ % ')->orWhere('message', 'like', ‘ % ’ . $keyword . ‘ % ');
                
            // })->get();
            // $posts = $topicposts->where(function ($query) use ($keyword) {
            //     $query->where('title', 'like', ' % ' . $keyword . ' % ')->orWhere('message', 'like', ' % ' . $keyword . ' % ');
            // })->get();
            $posts = $topicposts->where(function ($topicposts) use ($keyword) {
                $topicposts->where('title', 'like', '%' . $keyword . '%')->orWhere('message', 'like', '%' . $keyword . '%');
            })->get();
        
            // dd(DB::getQueryLog()); 
            if($posts->isEmpty()){
                $posts = null;
            }  

            $users = User::where('name', 'like', '%'.$keyword.'%')->get();
            if($users->isEmpty()){
                $users = null;
            }

        }elseif(empty($keyword) && ($topic != 'トピックで検索')){
            $posts = $searchtopic->posts()->get();  
            $users = 'noneed';

        }elseif($keyword && ($topic == 'トピックで検索')){
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