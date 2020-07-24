<?php

namespace App\Jobs;

use App\Mail\QuestionAsked;
use App\Attorney;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

class QuestionAskedJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $attorney;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Attorney $attorney)
    {
        $this->attorney = $attorney;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->attorney)->send(new QuestionAsked());

    }
}
