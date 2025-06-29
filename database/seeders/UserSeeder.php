<?php

namespace Database\Seeders;

use App\Models\User;
use App\RoleEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(10)->create();
        User::factory()->create([
            'first_name' => 'admin',
            'last_name' => 'Admin',
            'email' => 'admin@email.com',
            'password' => 'secret'
        ])->syncRoles([RoleEnum::ADMIN]);
    }
}
