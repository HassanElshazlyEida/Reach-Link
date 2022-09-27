<?php

namespace Database\Seeders;


use App\Models\Ads;
use App\Models\User;
use App\Models\Category;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        Ads::create([
            "title"=>$faker->title,
            "description"=>$faker->sentence,
            "type"=>'free',
            "category_id"=>Category::all()->random()->id,
            "advertiser_id"=>User::first()->id,
            "start_date"=>$faker->dateTimeBetween('+0 days', '+3 days')
        ]);
    }
}
