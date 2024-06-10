<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewUserNotification extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $newUser;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($newUser)
    {
        $this->newUser = $newUser;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('New User Registered')
                    ->view('emails.new_user_notification');
    }
}
