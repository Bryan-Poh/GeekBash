<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;
use Carbon;

use App\Post;
use App\User;
use App\Category;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:superadministrator|administrator|editor|author|contributor');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(10);
        $categories = Category::all();
        return view('manage.posts.index', compact(['posts', 'categories']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $categories = Category::all();
      return view('manage.posts.create', compact(['categories']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validateWith([
          'title' => 'required|max:255',
          'slug' => 'required',
          'category_id' => 'required|integer',
          'content' => 'required'
      ]);

      $post = new Post();
      $post->title = $request->title;
      $post->slug = $request->slug;
      $post->category_id = $request->category_id;
      $post->content = $request->content;
      $post->excerpt = Str::limit($request->content, 100);
      $post->author_id = Auth::user()->id;
      $post->published_at = Carbon\Carbon::now();

      $post->save();

      $posts = Post::orderBy('id', 'desc')->paginate(10);
      $categories = Category::all();

      return view('manage.posts.index', compact(['posts', 'categories']))->with('success', 'Post Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      // $post = Post::where('id', $id)->first();
      // $user = User::all();
      // return view('content.posts.show', compact(['post', 'user']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$post = Post::where('id', $id)->first();
    	return view('manage.posts.edit', compact(['post']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validateWith([
          'title' => 'required|max:255',
          'content' => 'required'
      ]);

      $post = Post::findOrFail($id);
      $post->title = $request->title;
      $post->content = $request->content;
      $post->excerpt = Str::limit($request->content, 20);

      $post->save();

      $posts = Post::orderBy('id', 'desc')->paginate(10);
      return view('manage.posts.index', compact(['posts']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     $post = Post::findOrFail($id);
     $post->delete();

     $categories = Category::all();
     $posts = Post::orderBy('id', 'desc')->paginate(10);
     return view('manage.posts.index', compact(['posts', 'categories']));
    }

    public function apiCheckUnique(Request $request)
    {
        return json_encode(!Post::where('slug', '=', $request->slug)->exists());
    }
}
