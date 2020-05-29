<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\Storage;
use Hash;
use App\Post;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Topic;

class UserController extends Controller
{
    public function index(Request $request){
        $authUser = Auth::user();
        $posts = Post::where('user_id', Auth::id())->orderBy('id', 'desc')->get();
        $topics = Topic::all();

        return view('user.index', compact('authUser','posts','topics'));
    }

    
    public function edit(Request $request){
        $authUser = Auth::user();
        $topics = Topic::all();
        return view('user.edit', compact('authUser','topics'));
    }

    public function update(UserUpdateRequest $request){

        $authUser = Auth::user();
        $newthumbnail = $request->file('thumbnail');

        if($newthumbnail){
            
            $delimgname = basename($authUser->thumbnail);
            Storage::disk('s3')->delete('userthumbnails/' . $delimgname);

            $path = Storage::disk('s3')->putFile('userthumbnails',$newthumbnail,'public');
            
            $param = [
                'name'=>$request->name,
                'email'=>$request->email,
                'thumbnail'=>Storage::disk('s3')->url($path),
            ];
        }else{
            $param = [
                'name'=>$request->name,
                'email'=>$request->email,             
            ];
        }

        User::find($authUser->id)->update($param);
        return redirect(route('user.edit'))->with('success', '保存しました。');
    }

    

    public function showChangePasswordForm(){
        $authUser = Auth::user();
        $topics = Topic::all();
        return view('auth.changepassword', compact('authUser','topics'));
    }

    public function changePassword(ChangePasswordRequest $request){
        if(!(Hash::check($request->get('current-password'), Auth::user()->password))){
            return redirect()->back()->with('change_password_error', '現在のパスワードが間違っています。');
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            return redirect()->back()->with('change_password_error', '新しいパスワードが現在のパスワードと同じです。違うパスワードを設定してください。');
        }

        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with('change_password_success', 'パスワードを変更しました。');

    }

    
    public function delete(Request $request){
        $authUser = Auth::user();
        $topics = Topic::all();
        return view('user.delete', compact('authUser','topics'));
    }

    public function remove(Request $request){
        $authUser = Auth::user();
        $delthumbnail = basename($authUser->thumbnail);
        Storage::disk('s3')->delete('userthumbnails/' . $delthumbnail);

        $id = Auth::id();
        $deleteposts = Post::where('user_id', $id)->get();
        if($deleteposts){
            foreach($deleteposts as $deletepost){
                $deleteimage = basename($deletepost->image);
                Storage::disk('s3')->delete('postimages/' . $deleteimage);
                $deletepost->delete();
            }
        }

        User::find($id)->delete();
        return redirect('/');
    }

    public function show(Request $request){
        $authUser = Auth::user();
        $topics = Topic::all();
        $userid = $request->user_id;

        if($authUser->id == $userid){
            return redirect(route('user.index'));
        }
        
        $showuser = User::find($userid);
        $posts = Post::where('user_id', $userid)->orderBy('id', 'desc')->get();

        return view('user.show', compact('authUser','showuser','posts','topics'));
    }
}
