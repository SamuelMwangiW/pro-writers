<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\Student;
use App\Models\Team;
use App\Models\User;
use App\Models\Writer;
use App\Support\Enum\UserType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use JetBrains\PhpStorm\ArrayShape;
use Laravel\Jetstream\Features;

class UserFactory extends Factory
{
    protected $model = User::class;

    #[ArrayShape(['name' => "string", 'email' => "mixed", 'email_verified_at' => "\Illuminate\Support\Carbon", 'type' => "string", 'password' => "string", 'remember_token' => "string"])]
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'type' => Writer::class,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }
    public function admin(): UserFactory
    {
        return $this->state(fn(array $attributes) => ['type' => UserType::ADMIN]);
    }

    public function student(): UserFactory
    {
        return $this->state(fn(array $attributes) => ['type' => UserType::STUDENT]);
    }

    public function unverified(): UserFactory
    {
        return $this->state(fn(array $attributes) => ['email_verified_at' => null]);
    }

    public function writer(): UserFactory
    {
        return $this->state(fn(array $attributes) => ['type' => UserType::WRITER]);
    }

    public function withPersonalTeam()
    {
        if (!Features::hasTeamFeatures()) {
            return $this->state([]);
        }

        return $this->has(
            Team::factory()
                ->state(function (array $attributes, User $user) {
                    return ['name' => $user->name . '\'s Team', 'user_id' => $user->id, 'personal_team' => true];
                }),
            'ownedTeams'
        );
    }
}
