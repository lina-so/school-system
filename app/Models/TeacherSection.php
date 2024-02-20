<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'teacher_id','section_id',
        
    ];
}
