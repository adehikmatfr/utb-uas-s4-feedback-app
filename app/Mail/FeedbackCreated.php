<?php

namespace App\Mail;

use App\Models\Feedbacks;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FeedbackCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $feedback;

    /**
     * Create a new message instance.
     *
     * @param Feedbacks $feedback
     * @return void
     */
    public function __construct(Feedbacks $feedback)
    {
        $this->feedback = $feedback;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('New Feedback Created')
                    ->view('emails.feedback_created');
    }
}
