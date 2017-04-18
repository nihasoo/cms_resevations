<?php

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
        DB::table('users')->insert([
            'name' => 'Wishwa',
            'email' => 'wishwa.anuruddha@gmail.com',
            'password' => bcrypt('123456'),
            'phone' => '0112779792',
            'mobile' => '0713486350',
            'is_admin' => true,
        ]);

        DB::table('events')->insert([
            'type' => 'E1',
        ]);

        DB::table('resources')->insert([
            'name' => 'r1',
        ]);
    }
}
