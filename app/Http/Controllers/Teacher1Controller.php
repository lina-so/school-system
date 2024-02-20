<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\Gender;
use App\Models\Specializations;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use App\Repository\TeacherRepositoryInterface;


class Teacher1Controller extends Controller
{
    protected $Teacher;
    public function __construct(TeacherRepositoryInterface $Teacher)
    {
        $this->Teacher=$Teacher;
    }
/***************************************************************************************************************************************/

    public function index()
    {
        $teachers  = $this->Teacher->getAllTeachers();
        // $teachers = Teacher::all();
        $genders = Gender::all();
        $Specializations =Specializations::all();

        return view('pages.teachers.teachers',compact('teachers','genders','Specializations'));
    }
/***************************************************************************************************************************************/


    public function create()
    {
        $specializations =$this->Teacher->getSpecializations();
        $genders = $this->Teacher->getGender();
        return view('pages.teachers.add_teachers',compact('genders','specializations'));
    }
/***************************************************************************************************************************************/

    public function store(Request $request)
    {
        return $this->Teacher->storeTeachers($request);

    }
/***************************************************************************************************************************************/

    public function show(Teacher $teacher)
    {
        //
    }

/***************************************************************************************************************************************/

    public function edit($id)
    {
        $Teachers =$this->Teacher->editTeachers($id);
        $specializations =$this->Teacher->getSpecializations();
        $genders = $this->Teacher->getGender();
        return view('pages.teachers.edit_teacher',compact('Teachers','genders','specializations'));
    }
/***************************************************************************************************************************************/

    public function update(Request $request)
    {
        return $this->Teacher->updateTeachers($request);
     
    }

 /***************************************************************************************************************************************/

    public function destroy(Request $request)
    {
        return $this->Teacher->deleteTeacher($request);
    }
}
