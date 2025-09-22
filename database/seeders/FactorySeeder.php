<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FactorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::factory(5)->create();
        Task::factory(15)->create();
    }
}
