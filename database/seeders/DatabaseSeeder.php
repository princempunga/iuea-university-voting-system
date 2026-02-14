<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin User
        User::updateOrCreate(
            ['email' => 'admin@iuea.ac.ug'],
            [
                'name' => 'System Administrator',
                'registration_number' => 'IUEA/ADMIN/001',
                'role' => 'admin',
                'password' => bcrypt('admin123'),
            ]
        );

        // Test Student User
        User::updateOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test Student',
                'registration_number' => 'IUEA/STU/001',
                'role' => 'student',
                'password' => bcrypt('password'), // Ensure it has a password if needed
            ]
        );
    }
}
