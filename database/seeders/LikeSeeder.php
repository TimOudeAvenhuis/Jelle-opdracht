<?php

namespace Database\Seeders;

use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class LikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Like::factory()
            ->count(10)
            ->state(
                new Sequence(
                    fn () => ['user_id' => User::all()->random(), 'post_id' => Post::all()->random()]
                )
            )
            ->create();
    }
}
