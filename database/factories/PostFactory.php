<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text(),
            'body' => $this->faker->text(500),
            'is_published' => $this->faker->boolean(70),
            // 'user_id' => User::inRandomOrder()->first()->id
        ];
    }

    public function published()
    {
        return $this->state(function (array $attributes) {
            return [
                'is_published' => true,
            ];
        });
    }
}
