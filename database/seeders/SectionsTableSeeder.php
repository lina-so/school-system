<?php

namespace Database\Seeders;

use App\Models\Classrooms;
use App\Models\Grade;
use App\Models\Sections;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sections')->delete();

        $Sections = [
            ['en' => 'a', 'ar' => 'ا'],
            ['en' => 'b', 'ar' => 'ب'],
            ['en' => 'c', 'ar' => 'ت'],
        ];

        foreach ($Sections as $section) {
            Sections::create([
                'section_name' => $section,
                'status' => 1,
                'grade_id' => Grade::all()->unique()->random()->id,
                'class_id' => Classrooms::all()->unique()->random()->id
            ]);
        }
    }
}