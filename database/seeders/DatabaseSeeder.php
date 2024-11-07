<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Location;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $roles = [
            ['name' => 'superadmin'],
            ['name' => 'pegawai'],
            ['name' => 'magang'],
        ];
        foreach ($roles as $role) {
            Role::create($role);
        }

        $superadmin = User::create([
            'name' => 'Super Hugo',
            'email' => 'superadmin@hugostudio.id',
            'email_verified_at' => now(),
            'role_user' => 'superadmin',
            'password' => Hash::make('merdeka17'),
            'is_changed' => true
        ]);
        $superadmin->assignRole('superadmin');

        Location::create([
            'name' => 'Kantor Pusat',
            'latitude' => -7.3790510332700645, 
            'longitude' => 109.2427320090812,
        ]);
    }
}
