<?php

use App\Country;
use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::create([
            'en' => [
                'country_name' => 'Kuwait'
            ],
            'ar' => [
                'country_name' => 'الكويت'
            ]
            
        ]);
    }

}
