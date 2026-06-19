<?php

namespace Database\Seeders;

use App\Enums\Permissions;
use App\Enums\Roles;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app(PermissionRegistrar::class)->forgetCachedPermissions();

        $guardName = config('auth.defaults.guard', 'web');

        $admin = Role::findOrCreate(Roles::ADMIN->value, $guardName);
        $manager = Role::findOrCreate(Roles::MANAGER->value, $guardName);
        $seller = Role::findOrCreate(Roles::SELLER->value, $guardName);
        $buyer = Role::findOrCreate(Roles::BUYER->value, $guardName);
        $accountant = Role::findOrCreate(Roles::ACCOUNTANT->value, $guardName);

        $admin->syncPermissions(Permission::where('guard_name', $guardName)->get());

        $manager->syncPermissions([
            Permissions::VIEW_USERS->value, Permissions::CREATE_USERS->value, Permissions::EDIT_USERS->value, Permissions::TOGGLE_STATUS_USERS->value,
            Permissions::VIEW_CATEGORIES->value, Permissions::CREATE_CATEGORIES->value, Permissions::EDIT_CATEGORIES->value, Permissions::TOGGLE_STATUS_CATEGORIES->value,
            Permissions::VIEW_SIZES->value, Permissions::CREATE_SIZES->value, Permissions::EDIT_SIZES->value,
            Permissions::VIEW_PRODUCTS->value, Permissions::CREATE_PRODUCTS->value, Permissions::EDIT_PRODUCTS->value, Permissions::TOGGLE_STATUS_PRODUCTS->value,
            Permissions::VIEW_SUPPLIERS->value, Permissions::CREATE_SUPPLIERS->value, Permissions::EDIT_SUPPLIERS->value,
            Permissions::VIEW_CUSTOMERS->value, Permissions::CREATE_CUSTOMERS->value, Permissions::EDIT_CUSTOMERS->value,
            Permissions::VIEW_PURCHASES->value, Permissions::CREATE_PURCHASES->value, Permissions::EDIT_PURCHASES->value,
            Permissions::VIEW_SALES->value, Permissions::CREATE_SALES->value, Permissions::EDIT_SALES->value,
            Permissions::VIEW_DEVOLUTIONS->value, Permissions::CREATE_DEVOLUTIONS->value, Permissions::EDIT_DEVOLUTIONS->value,
            Permissions::VIEW_PAYMENTS->value, Permissions::CREATE_PAYMENTS->value, Permissions::EDIT_PAYMENTS->value,
            Permissions::VIEW_PENDING_COUNTS->value,
            Permissions::VIEW_TRANSACTIONS->value,
            Permissions::VIEW_REPORTS->value,
            Permissions::VIEW_DASHBOARD->value,
        ]);

        $seller->syncPermissions([
            Permissions::VIEW_CATEGORIES->value,
            Permissions::VIEW_SIZES->value,
            Permissions::VIEW_PRODUCTS->value,
            Permissions::VIEW_CUSTOMERS->value, Permissions::CREATE_CUSTOMERS->value, Permissions::EDIT_CUSTOMERS->value,
            Permissions::VIEW_SALES->value, Permissions::CREATE_SALES->value,
            Permissions::VIEW_DEVOLUTIONS->value, Permissions::CREATE_DEVOLUTIONS->value,
            Permissions::VIEW_PAYMENTS->value, Permissions::CREATE_PAYMENTS->value,
            Permissions::VIEW_DASHBOARD->value,
        ]);

        $buyer->syncPermissions([
            Permissions::VIEW_CATEGORIES->value, Permissions::CREATE_CATEGORIES->value, Permissions::EDIT_CATEGORIES->value,
            Permissions::VIEW_SIZES->value, Permissions::CREATE_SIZES->value, Permissions::EDIT_SIZES->value,
            Permissions::VIEW_PRODUCTS->value, Permissions::CREATE_PRODUCTS->value, Permissions::EDIT_PRODUCTS->value,
            Permissions::VIEW_SUPPLIERS->value, Permissions::CREATE_SUPPLIERS->value, Permissions::EDIT_SUPPLIERS->value,
            Permissions::VIEW_PURCHASES->value, Permissions::CREATE_PURCHASES->value,
            Permissions::VIEW_DEVOLUTIONS->value, Permissions::CREATE_DEVOLUTIONS->value,
            Permissions::VIEW_PAYMENTS->value, Permissions::CREATE_PAYMENTS->value,
            Permissions::VIEW_DASHBOARD->value,
        ]);

        $accountant->syncPermissions([
            Permissions::VIEW_SUPPLIERS->value,
            Permissions::VIEW_CUSTOMERS->value,
            Permissions::VIEW_PURCHASES->value,
            Permissions::VIEW_SALES->value,
            Permissions::VIEW_DEVOLUTIONS->value,
            Permissions::VIEW_PAYMENTS->value, Permissions::CREATE_PAYMENTS->value, Permissions::EDIT_PAYMENTS->value,
            Permissions::VIEW_PENDING_COUNTS->value,
            Permissions::VIEW_TRANSACTIONS->value,
            Permissions::VIEW_REPORTS->value,
            Permissions::VIEW_DASHBOARD->value,
        ]);

        app(PermissionRegistrar::class)->forgetCachedPermissions();
    }
}
