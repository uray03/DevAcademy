@if(auth()->check())
    @php
        $result = \App\Models\QuizResult::where('user_id', auth()->id())->where('course_id', $course->id)->first();
    @endphp

    @if($result && $result->score >= 80)
        <a href="{{ route('quiz.certificate', $course->id) }}"
           class="mt-4 inline-block px-4 py-2 bg-green-600 text-white rounded">
            Unduh Sertifikat
        </a>
    @endif
@endif
