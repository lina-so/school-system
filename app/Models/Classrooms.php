<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Classrooms extends Model
{

    use HasFactory,HasTranslations;

    public $translatable = ["class_name"];
    protected $fillable = [
        'class_name',
        'grade_id',
        
    ];

    public function Grade(){
        return $this->belongsTo('App\Models\Grade' , 'grade_id');
    }
}
