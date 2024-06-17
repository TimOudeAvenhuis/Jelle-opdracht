<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Role;
use App\Models\Comment;
use App\Models\Like;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    protected static ?string $password;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Generate guaranteed admin user and role
        Role::factory()
            ->has(User::factory()
                ->state([
                    'name' => 'admin',
                    'username' => 'IAmAdmin',
                    'email' => 'admin@noreply.com',
                    'password' => static::$password ??= Hash::make('admin'),
                ]))
            ->state([
                'role_name' => 'admin'
            ])
            ->create();

        // Generate set role 
        $roles = ['writer', 'user'];

        foreach ($roles as $role) {
            Role::factory()
                ->has(User::factory()->count(5))
                ->state([
                    'role_name' => $role
                ])
                ->create();
        }

        // Generate posts with comments
        Post::factory()
            ->count(2)
            ->state(
                new Sequence(
                    fn () => ['user_id' => User::all()->random()]
                )
            )
            ->has(
                Comment::factory()
                    ->count(3)
                    ->state(
                        new Sequence(
                            fn () => ['user_id' => User::all()->random()]
                        )
                    )
            )
        ->has(
            Like::factory()
                ->count(3)
                ->state(
                    new Sequence(
                        fn () => ['user_id' => User::all()->random()]
                    )
                )
        )
            ->create();

    }
}
