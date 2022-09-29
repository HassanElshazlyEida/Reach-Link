<?php

namespace Database\Seeders;

use App\Models\Ads;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i = 0; $i < 5; $i++) {
            DB::table('tags')->insert([
                "title"=>$faker->name,
                "ad_id"=>Ads::first()->id,
                "created_at"=>now(),
                "updated_at"=>now(),
            ]);
        }
    }
}
