<?php

namespace App\Http\Controllers;

use App\Models\Sections;
use App\Models\Classrooms;
use App\Models\Teacher;
use App\Models\Grade;
use App\Models\TeacherSection;


use App\Http\Requests\SectionClassrom;

use DB;

use Illuminate\Http\Request;

class SectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grades = Grade::with(['sections'])->get();
        $Grades=Grade::all();
        $teachers = Teacher::all();

        return view('pages.sections.sections',compact('grades','Grades','teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SectionClassrom  $request)
    {
          $validated=$request->validated();
    
            $section=new Sections();
    
            $section->section_name =['en'=>$request->section_name_en , 'ar'=>$request->section_name];
            $section->grade_id = $request->grade_id;
            $section->class_id = $request->class_id;
            $section->status = 1;
            // dd($section);
            $section->save();

            $section->teachers()->attach($request->teacher_id);



            // $Section_id = Sections::latest()->first()->id;
  
          
            session()->flash('Add_section');
            return redirect()->route('sections.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function show(Sections $sections)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function edit(Sections $sections)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function update(SectionClassrom $request)
    {
    

      
    }

  


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sections  $sections
     * @return \Illuminate\Http\Response
     */
   public function destroy(Request $request)
    {
        $id = $request->id;
        Sections::find($id)->delete();
        session()->flash('delete_section');
        return back();
    }
}
