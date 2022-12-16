<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $post = Post::limit(9)->orderBy('id', 'DESC')->get();
        //dd($post);
        return view('home', ['title' => 'Home - BLOG', 'posts' => $post]);
    }
}
