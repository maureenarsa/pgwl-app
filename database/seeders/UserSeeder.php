<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a new user
        // $user = new \App\Models\User();
        // $user->name = 'Admin';
        // $user->phone = '08536226233';
        // $user->email = 'admin@gmail.com';
        // $user->password = bcrypt('admin1234');
        // $user->save();

        //Create a new user
        $user = [
            [
                'name' => 'Admin',
                'phone'=> '082763532',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Maureen',
                'phone' => '085641659525',
                'email' => 'maureenarsa7@gmail.com',
                'password' => bcrypt('Maureenmeisya7'),
            ],
        ];

        //Insert the user into the database
        DB::table('users')->insert($user);

    }
}
