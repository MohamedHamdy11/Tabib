<?php

use App\Admin;
use Illuminate\Database\Seeder;


class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name'  => 'Mohamed Hamdy',
            'email' => 'admin@test.com',
            'password'=>bcrypt('123456')
        ]);
        Admin::create([
            'name'  => 'Ahmed Hamdy',
            'email' => 'admin@admin.com',
            'password'=>bcrypt('123456')
        ]);
        Admin::create([
            'name'  => 'Sayed Hamdy',
            'email' => 'test@test.com',
            'password'=>bcrypt('123456')
        ]);
    }
}
