<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::query()->delete();

        $types = Type::all();
        $technologies = Technology::all();

        $projectsNames = [
            'Progetto 1',
            'Progetto 2',
            'Progetto 3',
            'Progetto 4',
        ];

        foreach ( $projectsNames as $name ) {
            $project = Project::create([
                'type_id' => collect([1,2,3])->random(),
                'name' => $name,
                'image_path' => fake()->imageUrl,
                'description' => fake()->realText
            ]);
        }
    }
}
