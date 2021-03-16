<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$faker = \Faker\Factory::create();  Doctors

        Category::create([
            'en' => [
                'name' => 'Doctors' //1 
            ],
            'ar' => [
                'name' => 'الدكاترة'
            ]
            //'picture' => $faker->image('public/storage/images',400,300, null, false),
        ]);
        Category::create([
            'en' => [
                'name' => 'Clinics' //2 
            ],
            'ar' => [
                'name' => 'العيادات'
            ]
            //'picture' => $faker->image('public/storage/images',400,300, null, false),

        ]);
        Category::create([
            'en' => [
                'name' => 'Hospital & MedicalCenters' // 3
            ],
            'ar' => [
                'name' => 'المستشفيات والمراكز الطبية'
            ]
            //'picture' => $faker->image('public/storage/images',400,300, null, false),

        ]);
        Category::create([
            'en' => [
                'name' => 'Medical Services' // 4
            ],
            'ar' => [
                'name' => 'الخدمات الطبية'
            ]
            //'picture' => $faker->image('public/storage/images',400,300, null, false),

        ]);
        Category::create([
            'en' => [
                'name' => 'Pharmacies & Medical Labs' // 5
            ],
            'ar' => [
                'name' => 'صيدليات ومختبرات طبية'
            ]
            //'picture' => $faker->image('public/storage/images',400,300, null, false),

        ]);
        Category::create([
            'en' => [
                'name' => 'Hospital'  
            ],
            'ar' => [
                'name' => 'مستشفى'
            ],
            'parent'  => 3
        ]);
        Category::create([
            'en' => [
                'name' => 'MedicalCenters'  
            ],
            'ar' => [
                'name' => 'المراكز الطبية'
            ],
            'parent'  => 3
        ]);
        Category::create([
            'en' => [
                'name' => 'Pharmacies' 
            ],
            'ar' => [
                'name' => 'صيدليات'
            ],
            'parent'  => 5
        ]);
        Category::create([
            'en' => [
                'name' => 'Medical Labs' 
            ],
            'ar' => [
                'name' => 'المعامل الطبية'
            ],
            'parent'  => 5
        ]);

        for ($i=1; $i <=12 ; $i++) {
            Category::create([
                'en' => [
                    'name' => 'Dermatology' 
                ],
                'ar' => [
                    'name' => 'الجلدية'
                ],
                'parent'  => 1
            ]);
        }

        for ($i=1; $i <=4 ; $i++) {
            Category::create([
                'en' => [
                    'name' => 'Psychiatry' 
                ],
                'ar' => [
                    'name' => 'الطب النفسي'
                ],
                'parent'  => 2
            ]);
        }

        for ($i=1; $i <=5 ; $i++) {
            Category::create([
                'en' => [
                    'name' => 'Kids Care'  
                ],
                'ar' => [
                    'name' => 'رعاية الاطفال'
                ],
                'parent'  => 4
            ]);
        }


    }
}
