<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Create Divisions
        $path = base_path('database/seeds/divisions.sql');
        $this->command->info("Seeding $path");
        DB::unprepared(file_get_contents($path));
        $this->command->info('Divisions Seeded!');
        
        //Create Cities
        $path = base_path('database/seeds/cities.sql');
        $this->command->info("Seeding $path");
        DB::unprepared(file_get_contents($path));
        $this->command->info('Cities Seeded!');
        
        //Create Categories
        $path = base_path('database/seeds/categories.sql');
        $this->command->info("Seeding $path");
        DB::unprepared(file_get_contents($path));
        $this->command->info('Categories Seeded!');
        
        //Create SubCategories
        $path = base_path('database/seeds/subcategories.sql');
        $this->command->info("Seeding $path");
        DB::unprepared(file_get_contents($path));
        $this->command->info('Sub Categories Seeded!');
        
        $this->command->info("Emptying Tables..");
        DB::table("users")->truncate();
        DB::table("posts")->truncate();
        DB::table("postimages")->truncate();

        $this->command->info("Emptying Image Folders..");
        /* Delete previous images*/
        $files = glob('public/images/*'); 
        foreach ($files as $file) { 
            if (is_file($file))
                unlink($file); 
        }
        /* Delete previous thumbnails*/
        $files = glob('public/images/thumb/*'); 
        foreach ($files as $file) { 
            if (is_file($file))
                unlink($file); 
        }
        
                
    }
}
