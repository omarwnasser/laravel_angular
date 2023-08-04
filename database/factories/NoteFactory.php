<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class NoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        return [
           'user_id' => User::all()->random()->id,
           'title' => $this->faker->unique()->sentence(),
           'body' => $this->faker->text(),
           'howCanSee' => $this->faker->randomElement('all','none','youKnow') 

        ];
    }
}
