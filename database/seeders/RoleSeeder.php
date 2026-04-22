<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::findOrCreate('admin');
        $adminRole->givePermissionTo(Permission::all());

        $managerRole = Role::findOrCreate('manager');
        $managerRole->givePermissionTo([
            'view users',
            'view transactions',
            'view reports'
        ]);

        $sellerRole = Role::findOrCreate('seller');
        $sellerRole->givePermissionTo([
            'view transactions',
            'create transactions'
        ]);

        $buyerRole = Role::findOrCreate('buyer');
        $buyerRole->givePermissionTo([
            'view transactions'
        ]);

        $accountantRole = Role::findOrCreate('accountant');
        $accountantRole->givePermissionTo([
            'view transactions',
            'view reports'
        ]);
    }
}