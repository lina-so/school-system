<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Spatie\Translatable\HasTranslations;


class ParentAttachments extends Model
{ 
    use HasFactory;

    protected $fillable = [
        'file_name',
        'parent_id',
        
    ];
}
