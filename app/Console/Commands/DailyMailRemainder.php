<?php

namespace App\Console\Commands;

use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\DailyMailRemainder as MailDailyMailRemainder;

class DailyMailRemainder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'remind:advertisers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'A daily email at time that will be sent to advertisers who have ads the next day as a remainder';

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
     * @return int
     */
    public function handle()
    {

        $users=\App\Models\User::with('ad')->whereHas("ad",function($q) {
            return $q->notReminder();
        })->get()->pluck('ad.info','email')->toArray();

        try{
            foreach($users as $email=>$info){
                Mail::to($email)->send(new MailDailyMailRemainder([
                    "email"=>$email,
                    "title"=>$info[0],
                    "start_date"=>$info[1],
                ]));
            }
        }catch(Exception $e){
            return $e;
        }


        return 0;
    }
}
