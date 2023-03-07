<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class subExpiring extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $name, $day;
    public function __construct($name,$day)
    {
        $this->name = $name ; 
        $this->day = $day;
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('email.registrationSuccessfulForAdmin')->with(['user'=>$this->name,'companies' => $this->companies, 'companyEmail' =>$this->companyEmail ])->subject('New Company Registration');
            if ($this->day == 3) {

                return $this->view('email.subExpiring3Days')->with(['user' =>$this->name, 'day' => $this->day])->subject('Your Subscription Expires in 3 Days');
            } 
        return $this->view('email.subExpiring')->with(['user' =>$this->name, 'day' => $this->day])->subject('Payment Reminder: 7 days left
        ');
    }
}
