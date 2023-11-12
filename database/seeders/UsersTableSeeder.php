<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{

    public function run(): void
    {
        User::create([
            'name' => 'Francisco',
            'email' => 'fscpinheiro@gmail.com',
            'password' => Hash::make('1234567890'),
        ]);

        User::factory()->count(5)->create();
    }
}
