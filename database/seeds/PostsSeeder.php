<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class PostsSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $faker = Factory::create();

        
        $numberOfUsers = 500;
        $this->command->info("Generating $numberOfUsers fake users..");
        /* Fake Users */
        DB::table('Users')->delete();
        for ($nc = 0; $nc < $numberOfUsers; $nc++) {

            App\User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => Hash::make('123456'),
                'mobile' => $faker->phoneNumber,                
                'user_type' => $faker->numberBetween(0, 1),
                'city_id' => $faker->numberBetween(1, 64)
            ]);
        }

        $numberOfAds = 3000; //<- change this to less numbers if you want less test data
        $this->command->info("Generating $numberOfAds fake posts..");

        /* Fake Ads */
        for ($indx = 1; $indx <= $numberOfAds; $indx++) {

            $rndUser = $faker->numberBetween(1, $numberOfUsers);
            $imgCount = $faker->numberBetween(2, 4);

            $types = ['New','Used'];
            
            $postId = App\Models\Post::create([
                'user_id' => $rndUser,
                'subcategory_id' => $faker->numberBetween(2, 62),
                'ad_type' => "newsell",
                'ad_title' => $faker->sentence(6, true),
                'item_condition' => $types[$faker->numberBetween(0,1)],
                'item_price' => $faker->numberBetween(10, 500) * 100,
                'price_negotiable' => '0',
                'model' => $faker->sentence(3, true),
                'status' => 1,
                'short_description' => $faker->sentence(10, true),
                'long_description' => $faker->paragraph(2, true),
                'created_at' => $faker->dateTimeBetween('-30 days','now')
            ])->post_id;

            /* Fake Ad Images */
            for ($i = 1; $i <= $imgCount; $i++) {

                $randomImageFile = $faker->numberBetween(1, 10);

                $filename = uniqid();
                $tempPath = base_path("public/images/sampleimages/$randomImageFile.jpeg");
                $newPath = base_path("public/images/" . $rndUser . "_" . "$filename.jpeg");

                //move file
                copy($tempPath, $newPath);

                $tempPathThumb = base_path("public/images/sampleimages/$randomImageFile.jpeg");
                $newPathThumb = base_path("public/images/thumb/" . $rndUser . "_" . "$filename.jpeg");

                //move thumbnail
                copy($tempPathThumb, $newPathThumb);

                App\Models\Postimage::create([
                    "post_id" => $postId,
                    "postimage_file" => "images/" . $rndUser . "_" . "$filename.jpeg",
                    "postimage_thumbnail" => "images/thumb/" . $rndUser . "_" . "$filename.jpeg"
                ]);
            }
        }

        $this->command->info("Finished!");
    }

}
