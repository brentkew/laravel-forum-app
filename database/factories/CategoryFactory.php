<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use Cviebrock\EloquentSluggable\Services\SlugService;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $catedgory = $this->faker->word();
        return [
            'name' => $catedgory,
            'slug' => Str::slug($catedgory)
        ];
    }
}
