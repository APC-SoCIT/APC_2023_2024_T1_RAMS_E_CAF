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
            'name' => 'Kurt Jordan Cadenas', 
            'email' => 'kvcadenas@student.apc.edu.ph', 
            'password' => Hash::make('123456'),
            'role' => 'customer'
        ]);

        User::create([
            'name' => 'Nathan Allen Sinaguinan', 
            'email' => 'nbsinaguinan@student.apc.edu.ph', 
            'password' => Hash::make('123456'),
            'role' => 'customer'
        ]);

        User::create([
            'name' => 'Isaiah Jade Tutor', 
            'email' => 'imtutor@student.apc.edu.ph', 
            'password' => Hash::make('123456'),
            'role' => 'customer'
        ]);

        User::create([
            'name' => 'Stephano Franco Binay', 
            'email' => 'ssjbinay@student.apc.edu.ph', 
            'password' => Hash::make('123456'),
            'role' => 'customer'
        ]);
    }
}
