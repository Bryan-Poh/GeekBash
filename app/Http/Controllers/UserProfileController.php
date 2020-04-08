<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Category;
use App\Role;
use DB;
use Session;
use Hash;
use Input;
use Auth;

class UserProfileController extends Controller
{
  public function index($name){
  	$user = User::where('name', $name)->first();
    $posts = Post::where('author_id', $user->id)->get();
    $categories = Category::all();

  	return view('content.profiles.index', compact(['user', 'posts', 'categories']));
 	}

 	public function update(Request $request){
  	if($request->hasFile('avatar')){
      $imageName = $request->avatar->store('public/avatar');
    }

    $user = Auth::user();
    $user->image = $imageName;
    $user->save();

  	return view('content.profiles.index')->withUser($user);
 	}
}
