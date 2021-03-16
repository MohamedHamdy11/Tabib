<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_name' => 'Mohamed',
            'last_name' => 'Hamdy',
            'email' => 'Mohamed@gmail.com',
            'mobile' => '01226497712',
            'password' => bcrypt('123456')
        ]);
        User::create([
            'first_name' => 'Mohamed',
            'last_name' => 'Sayed',
            'email' => 'Ahmed@gmail.com',
            'mobile' => '01222222222',
            'password' => bcrypt('123456')
        ]);
        User::create([
            'first_name' => 'Mohamed',
            'last_name' => 'Sayed',
            'email' => 'Hamdy@gmail.com',
            'mobile' => '01550533514',
            'password' => bcrypt('123456')
        ]);
    }
}
