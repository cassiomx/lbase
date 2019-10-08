<?php

namespace App\Jobs;

use App\Models\Sistema\User;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

class UserSendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $title;
    private $message;
    public function __construct($title,$message)
    {
        //
        $this->title = $title;
        $this->message = $message;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        Mail::send([],[],function($message){
            $message->to('cassiomx@gmail.com')
                    ->subject($this->title)
                    ->setBody($this->message);
        });
    }
}
