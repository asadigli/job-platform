<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Lang;
class Sendres extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email/sendres')->from(config("settings.contact_email"))
                 ->subject(Lang::get("app.User_resume_for",['title'=>$this->data['title']]))
                 ->attach($this->data['document']->getRealPath(),
                 [
                     'as' => $this->data['document']->getClientOriginalName(),
                     'mime' => $this->data['document']->getClientMimeType(),
                 ]);
    }
}
