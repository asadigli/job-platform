<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
// use DB;
use App\Contact;
use Mail;
use App\Mail\Message;

class SendMessage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'show:echo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
      // $cts = Contact::where('email_stat',0)->get();
      // foreach ($cts as $key => $ct) {
        // $cont = Contact::find($ct->id);
        // $cont->email_stat = 1;
        // $cont->update();
        $data = array(
          'name' => "name here",
          'email' => "email here",
          'subject' => "subject here",
          'message' => "message here",
        );
        Mail::to("azad.sadiqli@gmail.com")->send(new Message($data));
      // }
    }
}
