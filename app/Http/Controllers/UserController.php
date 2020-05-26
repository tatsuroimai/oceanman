<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Validator;
// use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;
use Hash;
use App\Post;
use App\Http\Requests\ChangePasswordRequest;

class UserController extends Controller
{
    public function index(Request $request){
        $authUser = Auth::user();
        $user_id = Auth::id();
        $posts = Post::where('user_id', $user_id)->orderBy('id', 'desc')->get();
        $param = [
            'authUser'=>$authUser,
            'posts'=>$posts,
        ];

        return view('user.index',$param);
    }

    
    public function edit(Request $request){
        $authUser = Auth::user();
        return view('user.edit', compact('authUser'));
    }

    public function update(Request $request){
        
        $rules = [
            'name' => 'required',
            'email' => 'required',
        
           

        ];
        $messages = [
            'name.required' => 'ユーザー名が未入力です',
            'email.required' => 'メールアドレスが未入力です',
            
        ];
        $validator = Validator::make($request->all(),$rules,$messages);

        if($validator->fails()){
            return redirect('/user/edit')
                ->withErrors($validator)
                ->withInput();
        }

        $authUser = Auth::user();
        $newthumbnail = $request->file('thumbnail');

        if($newthumbnail){
            
            $delimgname = basename($authUser->thumbnail);
            // Storage::delete('public/user/' . $delimgname);
            Storage::disk('s3')->delete($delimgname);

            // $thumbnailname = $request->file('thumbnail')->hashName();
            // $request->file('thumbnail')->storeAs('public/user', $thumbnailname);
            // $thumbnail = $request->file('thumbnail');
            $path = Storage::disk('s3')->putFile('/',$newthumbnail,'public');
            

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
        return view('auth.changepassword', compact('authUser'));
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
        return view('user.delete', compact('authUser'));
    }

    public function remove(Request $request){
        $authUser = Auth::user();
        $delthumbnail = basename($authUser->thumbnail);
        // Storage::delete('public/user/' . $delthumbnail);
        Storage::disk('s3')->delete($delthumbnail);

        $id = Auth::id();
        $deleteposts = Post::where('user_id', $id)->get();
        if($deleteposts){
            foreach($deleteposts as $deletepost){
                $deleteimage = basename($deletepost->image);
                // Storage::delete('public/post/' . $delimage);
                Storage::disk('s3')->delete($deleteimage);
                $deletepost->delete;
            }
        }

        User::find($id)->delete();
        return redirect('/');
    }

    public function show(Request $request){
        $authUser = Auth::user();
        $userid = $request->user_id;

        if($authUser->id == $userid){
            return redirect(route('user.index'));
        }


        
        $showuser = User::find($userid);
        $posts = Post::where('user_id', $userid)->orderBy('id', 'desc')->get();
        $param = [
            'authUser'=>$authUser,
            'showuser'=>$showuser,
            'posts'=>$posts,
        ];

        return view('user.show', $param);
    }
}
