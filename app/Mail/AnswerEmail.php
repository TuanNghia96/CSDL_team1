<?php

namespace App\Mail;

use App\Models\Feedback;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AnswerEmail extends Mailable
{
    use Queueable, SerializesModels;
    protected $input;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($input)
    {
        $this->input = $input;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $feedback= Feedback::find($this->input['id']);
        $data = [
            'answer' => $this->input['answer'],
            'admin' => $this->input['admin'],
            'customer' => $feedback->user->name,
            'content' => $feedback->content
        ];
        return $this->view('mail.answer')->with($data);
    }
}
