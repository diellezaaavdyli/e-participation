<?php

namespace App\Jobs;
use App\Mail\PlenaryForm;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class PlenaryFormJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
     
    protected $name;
    protected $mail;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($mail, $name)
    {
        $this->name = $name;
        $this->mail = $mail;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->mail)->send(new PlenaryForm($this->mail, $this->name));
    }
}
