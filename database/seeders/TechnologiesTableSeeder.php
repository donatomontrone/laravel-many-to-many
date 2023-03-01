<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technologies = [
            ['name' => 'HTML5', 'color' => '#F7523F'],
            ['name' => 'CSS3', 'color' => '#1F72B6'],
            ['name' => 'JavaScript', 'color' => '#F7DF1E'],
            ['name' => 'PHP', 'color' => '#777BB4'],
            ['name' => 'Bootstrap', 'color' => '#6F2BF4'],
            ['name' => 'SCSS', 'color' => '#BF4080'],
            ['name' => 'VueJs 3', 'color' => '#4FC08D'],
            ['name' => 'Laravel 9', 'color' => '#F82C20'],
            ['name' => 'MySQL', 'color' => '#4479A1'],
            ['name' => 'Node.Js', 'color' => '#166E03'],
        ];

        foreach ($technologies as $technology) {
            $newTek = new Technology();
            $newTek->name = $technology['name'];
            $newTek->color = $technology['color'];
            $newTek->save();
        }
    }
}