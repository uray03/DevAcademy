<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\QuizResult;
use Illuminate\Http\Request;
use Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class QuizController extends Controller
{
    public function submit(Request $request, $courseId)
    {
        $course = Course::with('questions.answers')->findOrFail($courseId);
        $answers = $request->input('answers', []);
        $correct = 0;

        foreach ($course->questions as $question) {
            $selected = $answers[$question->id] ?? null;
            $correctAnswer = $question->answers->where('is_correct', true)->first();
            if ($selected == $correctAnswer->id) {
                $correct++;
            }
        }

        $score = ($correct / $course->questions->count()) * 100;

        QuizResult::updateOrCreate(
            ['user_id' => Auth::id(), 'course_id' => $courseId],
            ['score' => $score]
        );

        return redirect()->route('courses.show', $courseId)->with('success', "Nilai Anda: $score");
    }

    public function downloadCertificate($courseId)
    {
        $result = QuizResult::where('user_id', Auth::id())
            ->where('course_id', $courseId)
            ->firstOrFail();

        if ($result->score < 80) {
            return redirect()->back()->with('error', 'Nilai Anda belum mencukupi untuk mendapatkan sertifikat.');
        }

        $pdf = Pdf::loadView('certificates.template', [
            'user' => Auth::user(),
            'course' => Course::findOrFail($courseId),
            'score' => $result->score
        ]);

        return $pdf->download('sertifikat-course.pdf');
    }
}

