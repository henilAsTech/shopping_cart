<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\SuperAdmin;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'email' => 'user@gmail.com',
        ]);

        Admin::factory()->create([
            'email' => 'admin@gmail.com',
        ]);

        SuperAdmin::factory()->create([
            'email' => 'superadmin@gmail.com'
        ]);
    }
}
