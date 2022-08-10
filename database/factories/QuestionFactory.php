<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Category;
use App\Models\Question;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use Cviebrock\EloquentSluggable\Services\SlugService;

class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence(15);
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'body' => $this->faker->text(200),
            'category_id' => function(){
                return Category::all()->random();
            },
            'user_id' => function(){
                return User::all()->random();
            },
        ];
    }
}
