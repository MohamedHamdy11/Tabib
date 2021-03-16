<?php

use App\Vendor;
//use App\Category;
use Illuminate\Database\Seeder;

class VendorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$faker = \Faker\Factory::create();

        for ($i=1; $i <=5 ; $i++) { 
            Vendor::create([
                'en' => [
                    'name' => 'Mohamed'
                ],
                'ar' => [
                    'name' => 'محمد'
                ],
                //'name' => 'Mohamed',
                'category_id' => 11,
                'City_id'     => 1,
                'detection_price' => 22,
                'en' => [
                    'service' => ' will drop all database tables regardless of their prefix. This command should be used with caution when developing on a database that is shared with other applications.'
                ],
                'ar' => [
                    'service' => 'علاج أمراض الجهاز الهضمي .علاج امراض القولون مناظير المعدة عن طريق الفم علاج أمراض الكبد'
                ],
                //'service' => ' will drop all database tables regardless of their prefix. This command should be used with caution when developing on a database that is shared with other applications.',
                'en' => [
                    'address' => 'Hawalli, Tunisia st, khaled Al-Mubarak Complex'
                ],
                'ar' => [
                    'address' => 'حولي شارع تونس مجمع خالد المبارك'
                ],
                //'address' => 'Hawalli, Tunisia st, khaled Al-Mubarak Complex', 
                'mobile'  => '01226497712',
                'en' => [
                    'about'   => ' will drop all database tables regardless of their prefix. This command should be used with caution when developing on a database that is shared with other applications.'
                ],
                'ar' => [
                    'about'   => ' توفر عيادات القاسم خدمات ضمن قسم الجهاز الهضمي الذي يمتلك أحدث التقنيات ووسائل التقنية المستخدم حديثاً للمساعدة في علاج أمراض الجهاز الهضمي والكبد والقولون، وتقديم الأفضل للمرضى في مصر.'
                ],             
                //'about'   => ' will drop all database tables regardless of their prefix. This command should be used with caution when developing on a database that is shared with other applications.',
                'email'   => 'mhsayed337@gmail.com'
            ]);
        }
        for ($i=1; $i <=5 ; $i++) { 
            Vendor::create([
                'en' => [
                    'name' => 'Sayed'
                ],
                'ar' => [
                    'name' => 'سيد'
                ],
                //'name' => 'Mohamed',
                'category_id' => 13,
                'City_id'     => 2,
                'detection_price' => 23,
                'en' => [
                    'service' => ' will drop all database tables regardless of their prefix. This command should be used with caution when developing on a database that is shared with other applications.'
                ],
                'ar' => [
                    'service' => 'علاج أمراض الجهاز الهضمي .علاج امراض القولون مناظير المعدة عن طريق الفم علاج أمراض الكبد'
                ],
                //'service' => ' will drop all database tables regardless of their prefix. This command should be used with caution when developing on a database that is shared with other applications.',
                'en' => [
                    'address' => 'Hawalli, Tunisia st, khaled Al-Mubarak Complex'
                ],
                'ar' => [
                    'address' => 'حولي شارع تونس مجمع خالد المبارك'
                ],
                //'address' => 'Hawalli, Tunisia st, khaled Al-Mubarak Complex', 
                'mobile'  => '01226497712',
                'en' => [
                    'about'   => ' will drop all database tables regardless of their prefix. This command should be used with caution when developing on a database that is shared with other applications.'
                ],
                'ar' => [
                    'about'   => ' توفر عيادات القاسم خدمات ضمن قسم الجهاز الهضمي الذي يمتلك أحدث التقنيات ووسائل التقنية المستخدم حديثاً للمساعدة في علاج أمراض الجهاز الهضمي والكبد والقولون، وتقديم الأفضل للمرضى في مصر.'
                ],             
                //'about'   => ' will drop all database tables regardless of their prefix. This command should be used with caution when developing on a database that is shared with other applications.',
                'email'   => 'mhsayed337@gmail.com'
                
            ]);
        }
        for ($i=1; $i <=5 ; $i++) { 
            Vendor::create([
                'en' => [
                    'name' => 'Hamdy'
                ],
                'ar' => [
                    'name' => 'حمدى'
                ],
                //'name' => 'Mohamed',
                'category_id' => 11,
                'City_id'     => 3,
                'detection_price' => 22,
                'en' => [
                    'service' => ' will drop all database tables regardless of their prefix. This command should be used with caution when developing on a database that is shared with other applications.'
                ],
                'ar' => [
                    'service' => 'علاج أمراض الجهاز الهضمي .علاج امراض القولون مناظير المعدة عن طريق الفم علاج أمراض الكبد'
                ],
                //'service' => ' will drop all database tables regardless of their prefix. This command should be used with caution when developing on a database that is shared with other applications.',
                'en' => [
                    'address' => 'Hawalli, Tunisia st, khaled Al-Mubarak Complex'
                ],
                'ar' => [
                    'address' => 'حولي شارع تونس مجمع خالد المبارك'
                ],
                //'address' => 'Hawalli, Tunisia st, khaled Al-Mubarak Complex', 
                'mobile'  => '01226497712',
                'en' => [
                    'about'   => ' will drop all database tables regardless of their prefix. This command should be used with caution when developing on a database that is shared with other applications.'
                ],
                'ar' => [
                    'about'   => ' توفر عيادات القاسم خدمات ضمن قسم الجهاز الهضمي الذي يمتلك أحدث التقنيات ووسائل التقنية المستخدم حديثاً للمساعدة في علاج أمراض الجهاز الهضمي والكبد والقولون، وتقديم الأفضل للمرضى في مصر.'
                ],             
                //'about'   => ' will drop all database tables regardless of their prefix. This command should be used with caution when developing on a database that is shared with other applications.',
                'email'   => 'mhsayed337@gmail.com'
                
            ]);
        }



    }
}
