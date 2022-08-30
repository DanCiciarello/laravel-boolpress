<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewPostMail extends Mailable
{
    use Queueable, SerializesModels;

    public $newPost;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($_newPost)
    {
        $this->newPost = $_newPost;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mails.new-post', [
            "post" => $this->newPost,
            "user" => $this->newPost->user
        ])
            ->subject("Ehi, nuovo post: " . $this->newPost->title);
    }
}
