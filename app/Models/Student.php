<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    // protected $table = 'students';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'course_code', // The unique code for the course
        'course_name', // The name of the course
        'credits',     // The number of credits for the course
        'grade',       // The grade for the course, nullable
        'category',    // The category of the course
        'repeat',      // Whether the course is a repeat (boolean)
        'user_id',     // The user ID of the student
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'repeat' => 'boolean',
    ];
}