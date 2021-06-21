<?php

namespace Database\Factories;

use App\Models\Pages;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class pagesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pages::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $title = $this->faker->name;

        return [
            'parent_id' => 0,
            'title' => $title,
            'slug' => Str::slug($title),
            'content' =>  $this->faker->text,
            'type' =>  'page',
            'lang' =>  'tr', 
        ];
    }
}
