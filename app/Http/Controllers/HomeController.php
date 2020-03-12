<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use LaraFlash;
use App\Post;
use App\User;
use App\Category;
use Carbon;
Use Alert;



class HomeController extends Controller

{    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::all();
        $users = User::all();
        $categories = Category::all();

        return view('home', compact(['posts', 'users', 'categories']));
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();
        // dd($post);
        $users = User::all();
        $categories = Category::all();

        return view('content.posts.show', compact(['post', 'users', 'categories']));
    }
}
