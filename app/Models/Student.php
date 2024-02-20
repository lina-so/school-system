<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Foundation\Auth\User as Authenticatable;


use Illuminate\Database\Eloquent\SoftDeletes;


class Student extends Authenticatable
{
   
    use HasTranslations;
    use HasFactory, SoftDeletes;
    public $translatable = ['name'];
    protected $guarded =[];

      // علاقة بين الطلاب والانواع لجلب جنس الطالب
      public function genders()
      {
          return $this->belongsTo(Gender::class, 'gender_id');
      }

      public function grade()
      {
          return $this->belongsTo(Grade::class, 'Grade_id');
      }

         // علاقة بين الطلاب الصفوف الدراسية لجلب اسم الصف في جدول الطلاب

    public function classroom()
    {
        return $this->belongsTo(Classrooms::class, 'Classroom_id');
    }

    // علاقة بين الطلاب الاقسام الدراسية لجلب اسم القسم  في جدول الطلاب

    public function section()
    {
        return $this->belongsTo(Sections::class, 'section_id');
    }


    // // علاقة بين الطلاب والصور لجلب اسم الصور  في جدول الطلاب
    // public function images()
    // {
    //     return $this->morphMany('App\Models\Image', 'imageable');
    // }

    // علاقة بين الطلاب والجنسيات  لجلب اسم الجنسية  في جدول الجنسيات

    public function Nationality()
    {
        return $this->belongsTo(Nationalitie::class, 'nationalitie_id');
    }


    // علاقة بين الطلاب والاباء لجلب اسم الاب في جدول الاباء

    public function myparent()
    {
        return $this->belongsTo(My_Parent::class, 'parent_id');
    }

    // // علاقة بين الطلاب والصور لجلب اسم الصور  في جدول الطلاب

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

 
       // علاقة بين جدول سدادت الطلاب وجدول الطلاب لجلب اجمالي المدفوعات والمتبقي
       public function student_account()
       {
           return $this->hasMany('App\Models\StudentAccount', 'student_id');
       }
   
             // علاقة بين جدول الطلاب وجدول الحضور والغياب
       public function attendance()
       {
           return $this->hasMany('App\Models\Attendance', 'student_id');
       }
   

      
}
