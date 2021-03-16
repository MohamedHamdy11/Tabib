<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(VendorsTableSeeder::class); 
        $this->call(MedicalInformationTableSeeder::class); 
        $this->call(CountriesTableSeeder::class); 
        $this->call(CitiesTableSeeder::class);
        
    }
}
