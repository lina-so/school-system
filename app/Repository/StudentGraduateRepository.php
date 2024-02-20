<?php

namespace App\Repository;

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

use Illuminate\Support\Facades\Storage;
use DB;
use App\Models\Nationalitie;
use Illuminate\Support\Facades\Hash;



use Illuminate\Http\Request;

class StudentGraduateRepository implements StudentGraduateRepositoryInterface{

   
     /****************************************************************************************************************************************/
    
     public function index()
     {
         $students = Student::onlyTrashed()->get();
         return view('pages.students.Graduated.index',compact('students'));
 
     }
     /****************************************************************************************************************************************/
 
     public function create()
     {
 
     $Grades = Grade::all();
     return view('pages.students.Graduated.management',compact('Grades'));
     }
 
     public function store($request)
     {
 
         $students = Student::where('Grade_id',$request->Grade_id)->where('Classroom_id',$request->Classroom_id)->where('section_id',$request->section_id)->get();
         
         if($students->count() < 1){
             return redirect()->back()->with('error_promotions', __('لاتوجد بيانات في جدول الطلاب'));
         }
 
         // update in table student
         foreach ($students as $student){
 
             $ids = explode(',',$student->id);
             student::whereIn('id', $ids)->delete();
         }
 
       
         return redirect()->route('graduated.index');
     }
 
     /****************************************************************************************************************************************/
  
 
     public function update($request)
     {
         Student::onlyTrashed()->where('id', $request->id)->first()->restore();
 
        //  toastr()->success(trans('messages.success'));
         return redirect()->back();
     }
     /****************************************************************************************************************************************/
 
 
     public function destroy($request)
     {
         Student::onlyTrashed()->where('id', $request->id)->first()->forceDelete();
         toastr()->error(trans('messages.Delete'));
         return redirect()->back();
     }
 
 
}