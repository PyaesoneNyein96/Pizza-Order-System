<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Sequence;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'admin',
            'email' => 'psn@gmail.com',
            'password' =>Hash::make('admin123'),
            'gender' => 'male',
            'role' => 'admin',
            'phone' => '123',
            'address' => 'yangon'
        ]);
        User::create([
            'name' => 'superAdmin',
            'email' => 'superAdmin@gmail.com',
            'password' =>Hash::make('admin123'),
            'gender' => 'female',
            'role' => 'super',
            'phone' => '123',
            'address' => 'yangon'
        ]);



    }
}