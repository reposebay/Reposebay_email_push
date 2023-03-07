<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class regSuccessNotifyAdmin extends Mailable
{
    use Queueable, SerializesModels;
    public $name,$email,$companies,$companyEmail;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$email, $companies,$companyEmail)
    {
        //
        $this->name = $name;
        $this->email = $email;
        $this->companies = $companies;
        $this->companyEmail = $companyEmail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.registrationSuccessfulForAdmin')->with(['user'=>$this->name,'companies' => $this->companies, 'companyEmail' =>$this->companyEmail ])->subject('New Company Registration');
    }
}
