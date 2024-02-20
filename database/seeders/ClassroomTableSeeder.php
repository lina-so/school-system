<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Classrooms;
use App\Models\Grade;
use Illuminate\Support\Facades\DB;


class ClassroomTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
   
    public function run()
    {
        DB::table('classrooms')->delete();
        $classrooms = [
            ['en'=> 'First grade', 'ar'=> 'الصف الاول'],
            ['en'=> 'Second grade', 'ar'=> 'الصف الثاني'],
            ['en'=> 'Third grade', 'ar'=> 'الصف الثالث'],
        ];

        foreach ($classrooms as $classroom) {
            Classrooms::create([
            'class_name' => $classroom,
            'grade_id' => Grade::all()->unique()->random()->id
            ]);
        }
    }
}
