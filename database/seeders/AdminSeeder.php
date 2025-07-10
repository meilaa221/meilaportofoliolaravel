<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create default admin user
        User::create([
            'name' => 'Dian Gita Meilani',
            'email' => 'admin@diangita.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        // Create additional admin if needed
        User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@diangita.com',
            'password' => Hash::make('superadmin123'),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        // Create a regular user for testing
        User::create([
            'name' => 'Regular User',
            'email' => 'user@example.com',
            'password' => Hash::make('user123'),
            'role' => 'user',
            'email_verified_at' => now(),
        ]);

        $this->command->info('Admin users created successfully!');
        $this->command->info('Admin Login: admin@diangita.com / admin123');
        $this->command->info('Super Admin Login: superadmin@diangita.com / superadmin123');
        $this->command->info('Regular User Login: user@example.com / user123');
    }
}
