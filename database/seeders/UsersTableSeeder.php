<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=1; $i <=10; $i++){
            User::create([
                'screen_name'    => 'test_user' .$i,
                'name'           => 'TEST' .$i,
                'profile_image'  => 'https://placehold.jp/50x50.png',
                'email'          => 'test' .$i .'@test.com',
                'password'       => Hash::make('12345678'),
                'remember_token' => str::random(10),
                'created_at'     => now(),
                'updated_at'     => now()
            ]);
        }
    }
}
