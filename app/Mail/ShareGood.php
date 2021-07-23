<?php

namespace App\Mail;

use App\Models\Good;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class ShareGood extends Mailable
{
    use Queueable, SerializesModels;

    public $good;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Good $good)
    {
        $this->good = $good;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'))
                    ->subject("Новинка от Гала-Центра")
                    ->markdown('emails.share.good', ['sender_email'=>Auth::user()->email, 'sender_name'=>Auth::user()->name, 'image'=>$this->good->img]);
    }
}
