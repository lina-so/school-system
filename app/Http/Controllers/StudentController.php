<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\Gender;
use App\Models\Specializations;
use App\Models\Grade;
use App\Models\Sections;
use App\Models\Classrooms;
use App\Models\Type_Blood;
use App\Models\My_Parent;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use DB;
use App\Models\Nationalitie;
use Illuminate\Support\Facades\Hash;



use Illuminate\Http\Request;
use App\Repository\StudentRepositoryInterface;

class StudentController extends Controller
{
    protected $student;
    public function __construct(StudentRepositoryInterface $student)
    {
        $this->student=$student;
    }
    /****************************************************************************************************************************************/
    
    public function index()
    {
        // $students = Student::all();
        $students = $this->student->getAllStudents();
        return view('pages.students.student_list',compact('students'));

    }

    /****************************************************************************************************************************************/

    public function create()
    {
        return $this->student->createStudent();

    }
    /****************************************************************************************************************************************/


    public function Get_classrooms($id){
 
        return $this->student->Get_classrooms($id);

    }
    /****************************************************************************************************************************************/


    //Get Sections
    public function Get_Sections($id){

        return $this->student->Get_Sections($id);

    }

    /****************************************************************************************************************************************/

    public function store(Request $request)
    {
      return $this->student->store($request);

    }

    /****************************************************************************************************************************************/

    public function show($id)
    {
      return $this->student->show($id);

    }

     /****************************************************************************************************************************************/

    public function edit($id)
    {
        return $this->student->edit($id);

    }

    /****************************************************************************************************************************************/
 
    public function update(Request $request)
    {
        return $this->student->update($request);



    }

    /****************************************************************************************************************************************/


    public function Upload_attachment(Request $request)
    {
      return $this->student->Upload_attachment($request);
       
    }


    /****************************************************************************************************************************************/


    public function Download_attachment($studentsname, $filename)
    {
        return $this->student->Download_attachment($studentsname,$filename);

    }


    /****************************************************************************************************************************************/
    public function destroy(Request $request)
    {
        //method 1
        // Student::destroy($request->id);

        //method 2

        return $this->student->destroy($request);

    }
    /****************************************************************************************************************************************/


    public function Delete_attachment(Request $request)
    {
        return $this->student->Delete_attachment($request);

    }
}
