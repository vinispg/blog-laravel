<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function show(Post $post)
    {
        return view('post', ['post' => $post, 'title' => $post->slug]);
    }

    public function postagem()
    {
        return view('postagem', ['title' => 'Nova Postagem']);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'title'   => 'required',
            'slug'    => 'required',
            'content' => 'required',
            'thumb'   => 'required',
        ]);

        if ($request->hasFile('thumb') && $request->file('thumb')->isValid())
        {
            $requestImage = $request->thumb;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime('now')) . '.' . $extension;
            $requestImage->move(public_path('images/posts'), $imageName);

            if($validate)
            {
                Post::create([
                    'title'   => $request->title,
                    'slug'    => $request->slug,
                    'content' => $request->content,
                    'thumb'   => $imageName,
                    'user_id' => $request->user_id
                ]);
                return redirect()->route('home');
            }

        }
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/');
    }

    public function editar_post(Post $post)
    {
        $post = Post::findOrFail($post->id);
        return view('editar_post', ['title' => 'Editar Artigo', 'post' => $post]);
    }
    public function atualizar(Request $request, Post $post)
    {
        $validate = $request->validate([
            'title'   => 'required',
            'slug'    => 'required',
            'content' => 'required',
            'thumb'   => 'required',
        ]);

        if ($request->hasFile('thumb') && $request->file('thumb')->isValid())
        {
            $requestImage = $request->thumb;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime('now')) . '.' . $extension;
            $requestImage->move(public_path('images/posts'), $imageName);

            if($validate)
            {
                $post = Post::findOrFail($post->id);
                $post->title = $request->title;
                $post->slug = $request->slug;
                $post->content = $request->content;
                $post->thumb = $imageName;
                $post->save();
                return redirect('post' . '/' . $post->slug );
            }

        }
    }

        //dd($post);
       /**
        $post = Post::findOrFail($post->id);
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->content = $request->content;
        $post->thumb = $request->thumb;
        $post->save();
        return redirect('/');
        * **/


}
