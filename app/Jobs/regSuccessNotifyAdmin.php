<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use App\Mail\regSuccessNotifyAdmin as MailRegSuccessNotifyAdmin;

class regSuccessNotifyAdmin implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $name, $adminEmail,$companies,$email;
    public function __construct($name,$adminEmail,$companies,$email)
    {
        //
        $this->name = $name; 
        $this->adminEmail = $adminEmail; 
        $this->companies = $companies; 
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
        Mail::to( $this->adminEmail)->send( new MailRegSuccessNotifyAdmin ($this->name,$this->adminEmail,$this->companies,$this->email));
    }
}
