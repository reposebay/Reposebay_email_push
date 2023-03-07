<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Mail\registrationSuccessful as success;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class registrationSuccessful implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $name , $email ;
    public function __construct($name,$email)
    {
        //

        $this->name = $name; 
        $this->email = $email; 
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        Mail::to( $this->email)->send( new success($this->name));

    }
}
