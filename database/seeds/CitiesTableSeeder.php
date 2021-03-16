<?php

use App\City;
use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::create([
            'en' => [
                'city_name' => 'Al Asimah Governorate' 
            ],
            'ar' => [
                'city_name' => 'محافظة العاصمة'
            ],
            'country_id' => 1
        ]);
        City::create([
            'en' => [
                'city_name' => 'Hawalli Governorat' 
            ],
            'ar' => [
                'city_name' => 'محافظة حولي'
            ],
            'country_id' => 1
        ]);
        City::create([
            'en' => [
                'city_name' => 'Al Jahra Governorat' 
            ],
            'ar' => [
                'city_name' => 'محافظة الجهراء'
            ],
            'country_id' => 1
        ]);
        City::create([
            'en' => [
                'city_name' => 'Al Farwaniyah Governorat' 
            ],
            'ar' => [
                'city_name' => 'محافظة الفروانية'
            ],
            'country_id' => 1
        ]);
        City::create([
            'en' => [
                'city_name' => 'Al Ahmadi Governorat' 
            ],
            'ar' => [
                'city_name' => 'محافظة الأحمدي'
            ],
            'country_id' => 1
        ]);
        City::create([
            'en' => [
                'city_name' => 'Mubarak AL-Kabeer Governorat' 
            ],
            'ar' => [
                'city_name' => 'محافظة مبارك الكبير'
            ],
            'country_id' => 1
        ]);

    }
}
