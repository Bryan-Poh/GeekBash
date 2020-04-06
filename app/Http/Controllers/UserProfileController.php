<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
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

  	return view('content.profiles.index')->withUser($user);
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
