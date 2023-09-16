<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
            'name' => 'Jamir Sia', 
            'email' => 'jzsia@student.apc.edu.ph', 
            'password' => Hash::make('123456'),
            'role' => 'customer'
        ]);
    }
}
