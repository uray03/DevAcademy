<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\Material;
use App\Models\Question;
use App\Models\Answer;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        $course = Course::create([
            'title' => 'Belajar Laravel untuk Pemula',
            'description' => 'Pelajari dasar-dasar Laravel mulai dari routing hingga database seeding.',
        ]);

        $material1 = Material::create([
            'course_id' => $course->id,
            'title' => 'Pengantar Laravel',
            'content' => 'Laravel adalah framework PHP yang elegan dan powerful. Digunakan untuk membangun web modern dengan sintaks yang ekspresif.',
        ]);

        $material2 = Material::create([
            'course_id' => $course->id,
            'title' => 'Dasar Routing',
            'content' => 'Routing adalah bagaimana Laravel mengarahkan request ke controller yang sesuai. Gunakan file routes/web.php untuk routing web.',
        ]);

        for ($i = 1; $i <= 10; $i++) {
            $question = Question::create([
                'course_id' => $course->id,
                'question' => "Contoh pertanyaan kuis nomor $i untuk Laravel?",
            ]);

            // Jawaban acak: A, B, C, D
            foreach (['A', 'B', 'C', 'D'] as $key => $option) {
                Answer::create([
                    'question_id' => $question->id,
                    'answer' => "Pilihan $option dari soal $i",
                    'is_correct' => $option === 'A', // Semua jawaban A dianggap benar
                ]);
            }
        }
    }
}
