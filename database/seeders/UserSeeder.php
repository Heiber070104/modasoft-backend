<?php

namespace Database\Seeders;

use App\Enums\Roles;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::updateOrCreate([
            'email' => 'admin@example.com',
        ], [
            'username' => 'Heiber123',
            'personal_name' => 'Alejandro',
            'password' => Hash::make('password123'),
        ]);
        $admin->syncRoles([Roles::ADMIN->value]);

        $manager = User::updateOrCreate([
            'email' => 'manager@example.com',
        ], [
            'username' => 'Maria123',
            'personal_name' => 'Maria',
            'password' => Hash::make('password123'),
        ]);
        $manager->syncRoles([Roles::MANAGER->value]);

        $seller = User::updateOrCreate([
            'email' => 'seller@example.com',
        ], [
            'username' => 'Carlos123',
            'personal_name' => 'Carlos',
            'password' => Hash::make('password123'),
        ]);
        $seller->syncRoles([Roles::SELLER->value]);

        $buyer = User::updateOrCreate([
            'email' => 'buyer@example.com',
        ], [
            'username' => 'Jose123',
            'personal_name' => 'Jose',
            'password' => Hash::make('password123'),
        ]);
        $buyer->syncRoles([Roles::BUYER->value]);

        $accountant = User::updateOrCreate([
            'email' => 'accountant@example.com',
        ], [
            'username' => 'Elena123',
            'personal_name' => 'Elena',
            'password' => Hash::make('password123'),
        ]);
        $accountant->syncRoles([Roles::ACCOUNTANT->value]);
    }
}
