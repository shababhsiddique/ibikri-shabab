<?php

use Illuminate\Database\Seeder;
use Faker\Factory;


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
        
        
        $faker = Factory::create();

        /* Fake Customers */
        for ($nc = 0; $nc <= 10; $nc++) {
//            App\User::create([
//                
//            ]);
//            App\Models\Customer::create([
//                'customer_name' => $faker->name,
//                'customer_phone' => $faker->phoneNumber,
//                'customer_company' => $faker->company,
//                'customer_email' => $faker->email,
//                'customer_address' => $faker->address,
//                'customer_remarks' => "",
//                'customer_balance' => 0, //$faker->numberBetween(0, 200) * 100,
//            ]);
        }
        
    }
}
