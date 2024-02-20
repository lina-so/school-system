<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Sections extends Model
{
    use HasFactory,HasTranslations;

    public $translatable = ["section_name"];
    protected $fillable = [
        'section_name',
        'grade_id',
        'class_id',
        
    ];


  public function class(){
        return $this->belongsTo('App\Models\Classrooms' , 'class_id');
    }

    public function teachers()
    {
        // return $this->belongsToMany('App\Models\Teacher','teacher_sections');
        
        return $this->belongsToMany(Teacher::class,'teacher_sections');
    }
}
