<?php
  
namespace App\Mail;
  
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
  
class MyTestMail extends Mailable
{
    use Queueable, SerializesModels;
  
    public $details;
  
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }
  
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Testing Mail')
                    // ->view('emails.myTestMail')
                     ->markdown('emails.myTestMail');
                     // ->replyTo('tekroigopinadh@gmail.com', 'Gopinadh');

                    // ->attach(public_path('pdf/Sample.pdf'), [
                    //      'as' => 'Sample.pdf',
                    //      'mime' => 'application/pdf',
                    // ]);
    }


}