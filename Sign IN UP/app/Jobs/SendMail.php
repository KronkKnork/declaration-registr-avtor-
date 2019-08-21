<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

class SendMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 1;
    protected $data_message;

    /**
     * Create a new job instance.
     *
     * @param $data
     */
    public function __construct($data)
    {
        $this -> data_message = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::send('mail.mail', ['var1' => $this->data_message['name_declaration'], 'var2' => $this->data_message['declaration'], 'var3' => $this->data_message->User->find($this->data_message -> users_id)->name, 'var4' => $this->data_message->User->find($this->data_message -> users_id)->email, 'var5' => $this->data_message['created_at'], 'var6' => $this->data_message['url_image']], function ($message) {   //письмо
            $message -> to('declarationpo4ta@gmail.com', 'to declaration') -> subject('Declaration');   //кому
            $message -> from('declarationpo4ta@gmail.com','declaration');                               //от кого
        });
    }
}
