<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Buat Roles
        $roles = ['admin', 'masyarakat', 'operator', 'relawan', 'manajemen'];
        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role]);
        }

        // Data User Default
        $users = [
            [
                'name' => 'Admin User',
                'email' => 'admin@uai.com',
                'password' => 'password',
                'role' => 'admin'
            ],
            [
                'name' => 'Masyarakat User',
                'email' => 'masyarakat@uai.com',
                'password' => 'password',
                'role' => 'masyarakat'
            ],
            [ 
                'name' => 'Operator User',
                'email' => 'operator@uai.com',
                'password' => 'password',
                'role' => 'operator'
            ],
            [
                'name' => 'Relawan User',
                'email' => 'relawan@uai.com',
                'password' => 'password',
                'role' => 'relawan'
            ],
            [
                'name' => 'Manajemen User',
                'email' => 'manajemen@uai.com',
                'password' => 'password',
                'role' => 'manajemen'
            ],
        ];

        // Buat User dan Assign Role
        foreach ($users as $data) {
            $user = User::firstOrCreate(
                ['email' => $data['email']],
                [
                    'name' => $data['name'],
                    'password' => Hash::make($data['password']),
                ]
            );
            $user->assignRole($data['role']);
        }
    }
}
