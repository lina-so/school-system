<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Grade extends Model
{
    use HasFactory,HasTranslations;

    public $translatable = ["Name"];
    protected $fillable = [
        'Name',
        // 'Notes',
        
    ];

    public function classrooms(){
        return $this->hasMany('App\Models\Classrooms' , 'grade_id');
    }

    public function sections(){
        return $this->hasMany('App\Models\Sections' , 'grade_id');
    }
}
