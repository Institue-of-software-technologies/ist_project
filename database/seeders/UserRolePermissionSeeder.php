<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create General Permissions
        // Permission::create(['name' => 'view dashboard']);
        // Permission::create(['name' => 'view analytics']);

        // Create Superuser Permissions
        Permission::create(['name' => 'view role']);
        Permission::create(['name' => 'create role']);
        Permission::create(['name' => 'update role']);
        Permission::create(['name' => 'delete role']);
        Permission::create(['name' => 'view permission']);
        Permission::create(['name' => 'create permission']);
        Permission::create(['name' => 'update permission']);
        Permission::create(['name' => 'delete permission']);
        Permission::create(['name' => 'view user']);
        Permission::create(['name' => 'create user']);
        Permission::create(['name' => 'update user']);
        Permission::create(['name' => 'delete user']);
        Permission::create(['name' => 'view applications']);

        // Create Admin Permissions
        Permission::create(['name' => 'view job']);
        Permission::create(['name' => 'create job']);
        Permission::create(['name' => 'update job']);
        Permission::create(['name' => 'delete job']);
        Permission::create(['name' => 'view alumni job']);

        // Create Employer Permissions
        Permission::create(['name' => 'create job']);

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
        $superAdminRole = Role::create(['name' => 'super-admin']);
        $adminRole = Role::create(['name' => 'admin']);
        $alumniRole = Role::create(['name' => 'alumni']);
        $employerRole = Role::create(['name' => 'employer']);

        // Assign all permissions to super-admin role
        $superAdminRole->givePermissionTo(Permission::all());

        // Assign specific permissions to admin role
        $adminRole->givePermissionTo([
            'view role',
            'create role',
            'update role',
            'view permission',
            'create permission',
            'view user',
            'create user',
            'update user',
            'view job',
            'create job',
            'update job'
        ]);

        // Assign specific permissions to employer role
        $employerRole->givePermissionTo(['create job posting']);

        // Assign specific permissions to alumni role
        $alumniRole->givePermissionTo([
            'create portfolio',
            'publish projects',
            'edit projects',
            'delete projects',
            'view job postings',
            'apply for jobs',
            'view own profile',
            'edit profile',
            'view own applications'
        ]);

        // Create and assign roles to users
        $superAdminUser = User::firstOrCreate([
            'email' => 'kabogp@gmail.com',
        ], [
            'name' => 'James',
            'email' => 'kabogp@gmail.com',
            'password' => Hash::make('@Kabzngarang254
'),
        ]);
        $superAdminUser->assignRole($superAdminRole);

        $adminUser = User::firstOrCreate([
            'email' => 'jknkabogo@gmail.com'
        ], [
            'name' => 'Admin',
            'email' => 'jknkabogo@gmail.com',
            'password' => Hash::make('@Kabzngarang254
'),
        ]);
        $adminUser->assignRole($adminRole);

        $employerUser = User::firstOrCreate([
            'email' => 'jknkabz@gmail.com',
        ], [
            'name' => 'Employer',
            'email' => 'jknkabz@gmail.com',
            'password' => Hash::make('@Kabzngarang254
'),
        ]);
        $employerUser->assignRole($employerRole);

        $alumniUser = User::firstOrCreate([
            'email' => 'etest7725@gmail.com',
        ], [
            'name' => 'Alumni',
            'email' => 'etest7725@gmail.com',
            'password' => Hash::make('@Kabzngarang254
'),
        ]);
        $alumniUser->assignRole($alumniRole);
    }
}
