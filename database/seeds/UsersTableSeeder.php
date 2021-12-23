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
        //
        User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt(12345678),
            'original_password' => '12345678'
        ]);


        User::create([
            'name' => 'user1',
            'email' => 'user1@gmail.com',
            'password' => bcrypt(12345678),
            'original_password' => '12345678'
        ]);
    }
}
