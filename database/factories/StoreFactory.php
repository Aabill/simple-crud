<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Store>
 */
class StoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
		private $title;
    public function definition(): array
    {
			$name = fake()->lastName();
			if (substr($name, -1) == "s") {
				$this->title = "$name' Store";
			} else {
				$this->title = "$name's Store";
			}
      return [
        'title' =>  $this->title,
				'description' => fake()->sentence(7),
				'location' => fake()->address()
      ];
    }
}
