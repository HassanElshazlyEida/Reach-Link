<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'email'=> env('ADMIN_EMAIL',"admin@gmail.com"),
            'password'=>bcrypt(env('ADMIN_EMAIL','password')),
            'name'=>"Admin",
            "created_at"=>now(),
            "updated_at"=>now(),
        ]);

    }
}
