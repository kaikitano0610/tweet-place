<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comment;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            Comment::create([
                'user_id' => 1,  // 適切な user_id を設定
                'tweet_id' => $i,  // 適切な tweet_id を設定
                'text' => 'これはテストコメント' . $i,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
