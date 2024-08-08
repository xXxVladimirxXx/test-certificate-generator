<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'course_name',
        'student_name',
        'completion_date',
        'qr_code_path'
    ];
}
