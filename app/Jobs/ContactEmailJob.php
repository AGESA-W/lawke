<?php

namespace App\Jobs;

use App\Mail\ContactEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ContactEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    private  $data;
    public function __construct($data)
    {
        //
        $this->data =$data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
       Mail::to('info@legalmeet.com')->send(new ContactEmail($this->data));
    }
}
