<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\TodosModal;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TodosModal>
 */
class TodosModalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = TodosModal::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'status' => $this->faker->boolean,
        ];
    }
}
