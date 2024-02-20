<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;
use App\Http\Requests\StoreGrades;
use App\Models\Classrooms;


class GradeController extends Controller
{
    

    public function index()
    {
        $grades=Grade::all();
        return view('pages.grades.grade_list',compact('grades'));
    }


    public function create()
    {
        
    }

  
     
    public function store(StoreGrades $request)
    {
        if(Grade::where('Name->ar',$request->Name)->orWhere('Name->en',$request->Name)->exists()){
            return back()->withErrors(trans('massage.exists'));
        }
        try{

            $validated=$request->validated();

            $grade = new  Grade();
            
            $grade->Name =['en'=>$request->Name_en , 'ar'=>$request->Name];
            $grade->Notes = $request->Notes;
            $grade->save();
    
    
            session()->flash('Add_grade');
            return redirect()->route('grade.index');
    
        }
        catch(\Exception $e){
            return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
        }
     
    }

    public function show(Grade $grade)
    {
        //
    }

    public function edit(Grade $grade)
    {
        //
    }

  
    public function update(StoreGrades $request)
    {
        if(Grade::where('Name->ar',$request->Name)->orWhere('Name->en',$request->Name)->exists()){
            return back()->withErrors(trans('massage.exists'));
        }
        try{

            $validated=$request->validated();

            $grade =  Grade::findorfail($request->id);
            
            $grade->Name =['en'=>$request->Name_en , 'ar'=>$request->Name];
            $grade->Notes = $request->Notes;
            $grade->update();
    
    
            session()->flash('update_grade');
            return redirect()->route('grade.index');
    
        }
        catch(\Exception $e){
            return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
        }
     
    }

   
    public function destroy(Request $request)
    {
        $grade =  Grade::findorfail($request->id);
       $grade->delete();
          session()->flash('update_grade');
            return redirect()->route('grade.index');

    }
}
