<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [

            [
                'name'=>'Admin User',
                'email'=>'admin1@uniten.edu.my',
                'password'=> bcrypt('password'),
                'user_level' => 0
            ],
            [
                'name'=>'Manager User',
                'email'=>'manager1@uniten.edu.my',
                'password'=> bcrypt('password'),
                'user_level' => 3
            ],
            [
                'name'=>'Developer User',
                'email'=>'dev1@uniten.edu.my',
                'password'=> bcrypt('password'),
                'user_level' => 5
            ],
        ];
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
