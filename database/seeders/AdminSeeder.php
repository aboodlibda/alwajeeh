<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::query()->create([
           'name' => 'Jasir',
           'email' => 'Jasir@wajeh.com',
           'password' => Hash::make('jasir@2024'),
        ]);
    }
}
