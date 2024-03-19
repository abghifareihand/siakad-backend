<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'admin@gmail.com',
            'phone' => '087777711022',
            'roles' => 'admin',
            'address' => 'Andara Street',
            'password' => Hash::make('admin123'),
            'email_verified_at' => now(),
        ]);

        \App\Models\User::factory(25)->create();
        \App\Models\Subject::factory(20)->create();
        \App\Models\Schedule::factory(10)->create();
    }
}
