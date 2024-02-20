<?php

namespace App\Http\Controllers;


use App\Models\Attendance;
use App\Models\ProcessingFee;
use App\Models\Fee_invoice;
use Illuminate\Http\Request;
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
use App\Models\Promotions;
use App\Models\StudentAccount;
use App\Models\Fee;
use Illuminate\Support\Facades\Storage;
use DB;
use App\Models\Nationalitie;
use Illuminate\Support\Facades\Hash;

class AttendanceController extends Controller
{
    
    public function index()
    {
        $Grades = Grade::with(['Sections'])->get();
        $list_Grades = Grade::all();
        $teachers = Teacher::all();
        return view('pages.Attendance.Sections',compact('Grades','list_Grades','teachers'));
    }

/**********************************************************************************************************************/
    public function show($id)
    {
        $students = Student::with('attendance')->where('section_id',$id)->get();
        return view('pages.Attendance.index',compact('students'));
    }

/**********************************************************************************************************************/

    public function create()
    {
        //
    }
/**********************************************************************************************************************/


    public function store(Request $request)
    {
        try {

            foreach ($request->attendences as $studentid => $attendence) {

                if( $attendence == 'presence' ) {
                    $attendence_status = true;
                } else if( $attendence == 'absent' ){
                    $attendence_status = false;
                }

                Attendance::create([
                    'student_id'=> $studentid,
                    'grade_id'=> $request->grade_id,
                    'classroom_id'=> $request->classroom_id,
                    'section_id'=> $request->section_id,
                    'teacher_id'=> 1,
                    'attendence_date'=> date('Y-m-d'),
                    'attendence_status'=> $attendence_status
                ]);

            }

            // toastr()->success(trans('messages.success'));
            return redirect()->back();

        }

        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
/**********************************************************************************************************************/

  
    public function edit(Attendance $attendance)
    {
        //
    }
/**********************************************************************************************************************/

  
    public function update(Request $request, Attendance $attendance)
    {
        //
    }

/**********************************************************************************************************************/


    public function destroy(Attendance $attendance)
    {
        //
    }
}
