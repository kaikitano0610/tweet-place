<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Favorite;

class FavoritesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        for ($i = 2; $i <=10; $i++){
            Favorite::create([
                'user_id' => 1,
                'tweet_id' => $i
            ]);
        }
    }
}
