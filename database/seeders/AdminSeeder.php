<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        Admin::firstOrCreate(
            ['email' => 'admin@drivelab.ge'],
            [
                'name' => 'DriveLab Admin',
                'password' => 'AdminDrive2026!',
            ]
        );
    }
}
