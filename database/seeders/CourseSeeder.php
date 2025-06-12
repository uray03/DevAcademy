<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    public function run()
    {
        Course::create([
            'title' => 'Belajar Laravel Dasar',
            'description' => 'Pelajari Laravel dari dasar hingga membuat aplikasi web dinamis.',
            'level' => 'pemula',
        ]);

        Course::create([
            'title' => 'PHP untuk Pemula',
            'description' => 'Dasar-dasar PHP untuk membangun website.',
            'level' => 'pemula',
        ]);

        Course::create([
            'title' => 'JavaScript Lanjutan',
            'description' => 'Pelajari konsep JavaScript tingkat lanjut.',
            'level' => 'menengah',
        ]);
    }
}
