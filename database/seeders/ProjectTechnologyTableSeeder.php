<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProjectTechnologyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //
        $projects = Project::all();

        $techologies = Technology::all()->pluck('id');

        foreach ($projects as $project) {
            $project->technologies()->attach($faker->randomElements($techologies, 2));
        }
    }
}