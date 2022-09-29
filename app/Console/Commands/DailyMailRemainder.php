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

        $users=\App\Models\User::with('ads')->whereHas("ads",function($q) {
            return $q->notReminder();
        })->get();

        try{
            foreach($users as $user){

                Mail::to($user->email)->send(new MailDailyMailRemainder([
                    "email"=>$user->email,
                    "name"=>$user->name,
                    "ads"=>$user->ads,
                ]));
            }
        }catch(Exception $e){
            return $e;
        }


        return 0;
    }
}
