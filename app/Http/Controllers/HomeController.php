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
        $recent_posts = Post::orderBy('published_at', 'desc')->take(4)->get();

        return view('home', compact(['posts', 'users', 'categories','recent_posts']));
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $users = User::all();
        $categories = Category::all();

        return view('content.posts.show', compact(['post', 'users', 'categories']));
    }
}
