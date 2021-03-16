<?php

use App\MedicalInformation;
use Illuminate\Database\Seeder;

class MedicalInformationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <=12 ; $i++) {
            MedicalInformation::create([
                'en' => [
                    'body'  => 'Medical Information Table Seeder Dermatology'
                ],
                'ar' => [
                    'body'  => 'جدول المعلومات الطبية للأمراض الجلدية بزار'
                ],
                'admin_id'  => 1,
            ]);
        }
    }

}
