<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {

        if ($request->input('s'))
        {
            $post = Post::where('title', "like","%{$request->input('s')}%")
                    ->orWhere('slug', "like","%{$request->input('s')}%")
                    ->orWhere('content', "like","%{$request->input('s')}%")
                    ->with(['user', 'comments'])
                    ->paginate(3);
            //dd($post);
        }
        else
        {
            $post = Post::limit(6)->with(['user', 'comments'])->orderBy('id', 'DESC')->get();
            //dd($post);
        }
        //dd($post);
        return view('home', ['title' => 'Home - BLOG', 'posts' => $post]);
    }

    public function error()
    {
        return view('404', ['title' => 'Página não encontrada']);
    }
}
