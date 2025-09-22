<?php

namespace Database\Factories;

use App\Models\Category;
use App\Modules\Task\Enums\PriorityEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'priority' => $this->faker->randomElement(PriorityEnum::cases())->value,
            'completed' => $this->faker->boolean(),
            'image_url' => 'https://picsum.photos/seed/task1/400/300',
            'category_id' => Category::inRandomOrder()->value('id'),
        ];
    }
}
