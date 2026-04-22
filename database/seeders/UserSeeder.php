<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $admin = User::create([
            'username' => 'Heiber123',
            'personal_name' => 'Alejandro',
            'email' => 'admin@example.com',
            'password' => Hash::make('password123'),
        ]);
        $admin->assignRole('admin');

        $manager = User::create([
            'username' => 'Maria123',
            'personal_name' => 'Maria',
            'email' => 'manager@example.com',
            'password' => Hash::make('password123'),
        ]);
        $manager->assignRole('manager');

        $seller = User::create([
            'username' => 'Carlos123',
            'personal_name' => 'Carlos',
            'email' => 'seller@example.com',
            'password' => Hash::make('password123'),
        ]);
        $seller->assignRole('seller');
    }
}