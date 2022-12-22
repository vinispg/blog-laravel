<?php

namespace App\Http\Controllers;

use App\Events\CommentPost;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $validate = $request->validate([
            'comment' => 'required'
        ]);

        $created = Comment::create([
            'comment' => $validate['comment'],
            'user_id' => auth()->user()->id,
            'post_id' => $request->input('post_id')
        ]);

        if ($created)
        {

            return redirect()->back();
        }
        else
        {
            return back()-with('error_create_comment', 'Ocorreu um erro ao cadastrar o comentário, tente novamente em alguns segundos.');
        }

    }
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return back();
    }
}
