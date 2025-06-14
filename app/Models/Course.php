<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;


class Course extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description'];

    public function modules()
    {
        return $this->hasMany(CourseModule::class);
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'enrollments');
    }

    public function index()
    {
        $courses = Course::all();
        return view('courses.index', compact('courses'));
    }

    public function materials()
    {
        return $this->hasMany(Material::class);
    }

    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }

    public function questions(): HasManyThrough
    {
        return $this->hasManyThrough(
            \App\Models\Question::class,
            \App\Models\Quiz::class,
            'course_id', // Foreign key on quizzes table
            'quiz_id',   // Foreign key on questions table
            'id',        // Local key on courses table
            'id'         // Local key on quizzes table
    );
}
}
