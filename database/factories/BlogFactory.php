<?php

namespace Database\Factories;
use App\Models\Blog;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Blog::class;

    public function definition()
    {
        return [
            'title' => $this->faker->name,
            'url' => Str::slug($this->faker->name),
            'category' => $this->faker->name,
            'description' => $this->faker->text,
        ];
    }
}
