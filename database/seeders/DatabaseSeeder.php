<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@queue-company.test'],
            ['name' => 'Admin User', 'password' => Hash::make('Admin@123456')]
        );

        $this->call(ProjectSeeder::class);
    }
}
