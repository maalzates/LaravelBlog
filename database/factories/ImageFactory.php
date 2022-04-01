<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [                     // path to save images , width, height, category (no longer available), boolean (Save the image with the path *true* or not *false*,  as we wanted posts/image.jpg we contactenated posts string before 
            'url' => 'posts/' . $this->faker->image('public/storage/posts', 640, 480, null, false)
        ];
    }
}
