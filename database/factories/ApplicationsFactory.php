<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Applications>
 */
class ApplicationsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => 2,
            'job_id' => 1,
            'father_name' => fake()->name(),
            'mother_name' => fake()->name(),
            'category' => 'OBC',
            'educational_details' => fake()->text(),
            'disability' => 'none',
            'marriage_status'=>'single',
        ];
    }
}
