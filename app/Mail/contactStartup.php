<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class contactStartup extends Mailable
{
    use Queueable, SerializesModels;

    public $sentFrom;
    protected $name;
    protected $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($sentFrom,$message,$name)
    {
        $this->name=$name;
        $this->message=$message;
        $this->sentFrom=$sentFrom;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->sentFrom)
                    ->markdown('emails.startup.contact')
                     ->with([
                         'name'=>$this->name,
                         'message'=>$this->message,
                     ]);
    }
}
