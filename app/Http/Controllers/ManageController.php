<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;


class ManageController extends Controller
{
	public function index()
	{
		return redirect()->route('manage.dashboard');
	}

  public function dashboard()
  {
  	$posts = Post::get();
  	$users = User::get();

  	return view('manage.dashboard', compact(['posts', 'users']));
  }
}
