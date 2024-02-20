<?php

namespace App\Http\Controllers;

use App\Models\Classrooms;
use App\Models\Grade;
use App\Http\Requests\StoreClassromm;
use DB;


use Illuminate\Http\Request;

class ClassroomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classrooms=Classrooms::all();
        $grades=Grade::all();

        return view('pages.classrooms.classroom_list',compact('classrooms','grades'));
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



    public function store(StoreClassromm $request)
    {
        
        try{

            $validated=$request->validated();

            $classroom = new  Classrooms();
            
            $classroom->class_name =['en'=>$request->class_name_en , 'ar'=>$request->class_name];
            $classroom->grade_id = $request->grade_id;
            $classroom->save();
    
    
            session()->flash('Add_classroom');
            return redirect()->route('classroom.index');
    
        }
        catch(\Exception $e){
            return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
        }
     

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Classrooms  $classrooms
     * @return \Illuminate\Http\Response
     */
    public function show(Classrooms $classrooms)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Classrooms  $classrooms
     * @return \Illuminate\Http\Response
     */
    public function edit(Classrooms $classrooms)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Classrooms  $classrooms
     * @return \Illuminate\Http\Response
     */
    public function update(StoreClassromm $request)
    {
    
        try{

            $validated=$request->validated();

            $classroom =  Classrooms::findorfail($request->id);

            
            $classroom->class_name =['en'=>$request->class_name_en , 'ar'=>$request->class_name];
            $classroom->grade_id = $request->grade_id;
            $classroom->update();
    
    
            session()->flash('update_classroom');
            return redirect()->route('classroom.index');
    
        }
        catch(\Exception $e){
            return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
        }
     
    }


    public function filterGrade(Request $request){

        $grades = Grade::all();
        $filter = Classrooms::where('grade_id',$request->grade_id)->get();
        return view('pages.classrooms.classroom_list',compact('filter','grades'));

     
    }

    public function getproducts($id)
    {
        // $class = DB::table("classrooms")->where("grade_id", $id)->pluck('class_name')->count();

        // $realestate=DB::select('select class_name from classrooms where grade_id = ?',[$id]);

        // $section->section_name =['en'=>$request->section_name_en , 'ar'=>$request->section_name];

        // $class2;
        // for ($i=0; $i <$class ; $i++) { 
        //     $clss2=json_decode($realestate[$i]->class_name);
        //     // dD($clss2);
        // }
       
        // dd($class);

        // $class = DB::table("classrooms")->where("grade_id", $id)->pluck('id');
        $class = Classrooms::where("grade_id", $id)->pluck("class_name", "id");



        return $class;
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Classrooms  $classrooms
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        Classrooms::find($id)->delete();
        session()->flash('delete_class');
        return back();
    }
}
