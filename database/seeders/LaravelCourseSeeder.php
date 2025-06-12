<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Material;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Answer;
use Illuminate\Database\Seeder;

class LaravelCourseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat course
        $course = Course::create([
            'title' => 'Belajar Laravel untuk Pemula',
            'description' => 'Pelajari dasar-dasar Laravel mulai dari routing hingga database seeding.',
        ]);

        // 2. Buat material
        Material::create([
            'course_id' => $course->id,
            'title' => 'Pengenalan Laravel',
            'content' => 'Laravel adalah framework PHP untuk membangun aplikasi web yang elegan.',
        ]);

        Material::create([
            'course_id' => $course->id,
            'title' => 'Routing di Laravel',
            'content' => 'Routing di Laravel memungkinkan kita menentukan URL endpoint dan aksi yang dilakukan.',
        ]);

        // 3. Buat quiz
        $quiz = Quiz::create([
            'course_id' => $course->id,
            'title' => 'Quiz Dasar Laravel',
        ]);

        // 4. Buat pertanyaan & jawaban
        $question = Question::create([
            'quiz_id' => $quiz->id,
            'question' => 'Apa itu Laravel?',
        ]);

        Answer::create([
            'question_id' => $question->id,
            'answer' => 'Framework PHP',
            'is_correct' => true,
        ]);

        Answer::create([
            'question_id' => $question->id,
            'answer' => 'Library JavaScript',
            'is_correct' => false,
        ]);

        Answer::create([
            'question_id' => $question->id,
            'answer' => 'Framework Python',
            'is_correct' => false,
        ]);
    }
}
