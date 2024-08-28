<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'view role']);
        Permission::create(['name' => 'create role']);
        Permission::create(['name' => 'edit role']);
        Permission::create(['name' => 'delete role']);
        Permission::create(['name' => 'view permission']);
        Permission::create(['name' => 'create permission']);
        Permission::create(['name' => 'edit permission']);
        Permission::create(['name' => 'delete permission']);
        Permission::create(['name' => 'view user']);
        Permission::create(['name' => 'create user']);
        Permission::create(['name' => 'edit user']);
        Permission::create(['name' => 'delete user']);
        Permission::create(['name' => 'view applications']);
        Permission::create(['name' => 'addPermissionToRole']);
        Permission::create(['name' => 'givePermissionToRole']);

        // Create Admin Permissions
        Permission::create(['name' => 'view job']);
        Permission::create(['name' => 'create job']);
        Permission::create(['name' => 'edit job']);
        Permission::create(['name' => 'delete job']);
        Permission::create(['name' => 'view alumni job']);

        // Create Employer Permissions
        // Permission::create(['name' => 'create job']);

        // Create Alumni Permissions
        Permission::create(['name' => 'create profile']);
        Permission::create(['name' => 'publish project']);
        Permission::create(['name' => 'edit project']);
        Permission::create(['name' => 'delete project']);
        Permission::create(['name' => 'view job postings']);
        Permission::create(['name' => 'apply for jobs']);
        Permission::create(['name' => 'view profile']);
        Permission::create(['name' => 'edit profile']);
        Permission::create(['name' => 'view own applications']);


        // Create Roles
        $superAdminRole = Role::create(['name' => 'super-user']); //as super-admin
        $adminRole = Role::create(['name' => 'admin']);
        $alumniRole = Role::create(['name' => 'alumni']);
        // $userRole = Role::create(['name' => 'user']);

        // Lets give all permission to super-admin role.
        $allPermissionNames = Permission::pluck('name')->toArray();

        $superAdminRole->givePermissionTo($allPermissionNames);

        // Let's give few permissions to admin role.
        $adminRole->givePermissionTo(['create role', 'view role', 'edit role']);
        $adminRole->givePermissionTo(['create permission', 'view permission']);
        $adminRole->givePermissionTo(['create user', 'view user', 'edit user']);
        $adminRole->givePermissionTo(['create job', 'view job', 'edit job']);

        $alumniRole->givePermissionTo([
            'create profile',
            'publish project',
            'edit project',
            'delete project',
            'view job postings',
            'apply for jobs',
            'view profile',
            'edit profile',
            'view own applications'
        ]);

        // Let's Create User and assign Role to it.

        $superAdminUser = User::firstOrCreate([
            'email' => 'kabogp@gmail.com',
        ], [
            'name' => 'Super Admin',
            'email' => 'kabogp@gmail.com',
            'password' => Hash::make('12345678'),
        ]);

        $superAdminUser->assignRole($superAdminRole);


        $adminUser = User::firstOrCreate([
            'email' => 'admin@gmail.com'
        ], [
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
        ]);

        $adminUser->assignRole($adminRole);


        $alumniUser = User::firstOrCreate([
            'email' => 'etest7725@gmail.com',
        ], [
            'name' => 'Staff',
            'email' => 'etest7725@gmail.com',
            'password' => Hash::make('12345678'),
        ]);

        $alumniUser->assignRole($alumniRole);
    }
}