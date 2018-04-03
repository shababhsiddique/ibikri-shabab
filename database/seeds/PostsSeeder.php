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

        
        $this->command->info("Generating 10 fake users..");
        /* Fake Users */
        DB::table('Users')->delete();
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
        for ($postId = 1; $postId <= 50; $postId++) {

            $rndUser = $faker->numberBetween(1, 10);
            $imgCount = $faker->numberBetween(1, 3);

            App\Models\Post::create([
                'user_id' => $rndUser,
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

            /* Fake Ad Images */
            for ($i = 1; $i < $imgCount; $i++) {

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
