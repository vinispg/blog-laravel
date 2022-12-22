<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::with('user', 'comments')->orderBy('id', 'DESC')->paginate(9);

       // dd($posts);

        return view('posts', ['title' => 'Posts', 'posts' => $posts]);
    }
}
