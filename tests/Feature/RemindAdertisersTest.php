<?php

namespace Tests\Feature;


use Tests\TestCase;
use Illuminate\Support\Facades\Mail;
use App\Mail\DailyMailRemainder;

class RemindAdertisersTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function testSending()
    {

        Mail::fake();
        Mail::to(env("MAIL_FROM_ADDRESS"))->send(new DailyMailRemainder([
            "email"=>"test",
            "name"=>"test",
            "ads"=>[
                0=>[
                    "title"=>"test",
                    "start_date"=>date("y-m-d")
                ],

            ]
        ]));
        Mail::assertSent(DailyMailRemainder::class);
        Mail::assertSent(DailyMailRemainder::class, function ($mail) {
            $mail->build();
            $this->assertTrue($mail->hasFrom(env("MAIL_FROM_ADDRESS")));
        });
    }

}
