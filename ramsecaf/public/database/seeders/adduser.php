<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class adduser extends Seeder
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

        User::create([
            'name' => 'Kitchen Express', 
            'email' => 'kexpress@gmail.com', 
            'password' => Hash::make('123456'),
            'role' => 'vendor-ke'
        ]);

        User::create([
            'name' => 'Red Brew', 
            'email' => 'rbrew@gmail.com', 
            'password' => Hash::make('123456'),
            'role' => 'vendor-rb'
        ]);

        User::create([
            'name' => 'La Mudras Corner', 
            'email' => 'lmudras@gmail.com', 
            'password' => Hash::make('123456'),
            'role' => 'vendor-lm'
        ]);

        User::create([
            'name' => 'Admin', 
            'email' => 'admin@apc.edu.ph', 
            'password' => Hash::make('123456'),
            'role' => 'admin'
        ]);

    }
}
