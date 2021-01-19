<?php

namespace App\Jobs;
use App\Mail\FormResponse;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class FormResponseJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $subject;
    protected $mail;
    protected $message;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($mail, $subject, $message)
    {
        $this->subject = $subject;
        $this->mail = $mail;
        $this->message = $message;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->mail)->send(new FormResponse($this->subject, $this->message));
    }
}
