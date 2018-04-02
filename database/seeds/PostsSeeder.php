<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Facades\Hash;

class PostsSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $faker = Factory::create();

        $this->command->info("Generating 10 fake users..");
        /* Fake Users */
        for ($nc = 0; $nc < 10; $nc++) {
            App\User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => Hash::make('123456'),
                'mobile' => $faker->phoneNumber,
                'city_id' => $faker->numberBetween(1, 64)
            ]);
        }

        $this->command->info("Generating 1000 fake posts..");
        /* Fake Ads */
        for ($nc = 0; $nc < 1000; $nc++) {
            App\Models\Post::create([
                'user_id' => $faker->numberBetween(1, 10),
                'subcategory_id' => $faker->numberBetween(1, 62),
                'ad_type' => "newsell",
                'ad_title' => $faker->sentence(6, true),
                'item_condition' => "New",
                'item_price' => $faker->numberBetween(10, 500) * 100,
                'price_negotiable' => '0',
                'model' => $faker->sentence(3, true),
                'status' => 1,
                'short_description' => $faker->sentence(10, true),
                'long_description' => $faker->paragraph(2, true)
            ]);
        }
        
        $this->command->info("Finished!");
    }

}
