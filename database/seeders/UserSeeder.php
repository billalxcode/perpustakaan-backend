<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::findOrCreate('admin');
        Role::findOrCreate('officer');
        Role::findOrCreate('member');

        $admin = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
        ]);
        $admin->assignRole('admin');

        $officer = User::factory()->create([
            'name' => 'Officer',
            'email' => 'officer@admin.com',
            'password' => bcrypt('password'),
        ]);
        $officer->assignRole('officer');

        $member = User::factory()->create([
            'name' => 'Member',
            'email' => 'member@admin.com',
            'password' => bcrypt('password'),
        ]);
        $member->assignRole('member');
    }
}
