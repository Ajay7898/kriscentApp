<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Mail\SendEmailTest;
use Mail;

class MailSendCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:mail-send-command';

    /**
     * The console command description. 
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = new SendEmailTest();
        Mail::to('ajaydyadav7898@gmail.com')->send($email);
    }
}
