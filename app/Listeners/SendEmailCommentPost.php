<?php

namespace App\Listeners;

use App\Events\CommentPost;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\CommentPost as MailCommentPost;

class SendEmailCommentPost
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\CommentPost  $event
     * @return void
     */
    public function handle()
    {
    }
}
