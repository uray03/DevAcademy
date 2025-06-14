@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="mb-4">
        <h2 class="fw-bold">{{ $course->title }}</h2>
        <p class="text-muted">{{ $course->description }}</p>
    </div>

    <div class="mb-5">
        <h4>Quiz</h4>
        @if($questions->isNotEmpty())
            <ul class="list-group">
                @foreach($questions as $q)
                    <li class="list-group-item">
                        {{ $loop->iteration }}. {{ $q->question_text }}
                    </li>
                @endforeach
            </ul>
        @else
            <p class="text-muted">Belum ada soal tersedia untuk kursus ini.</p>
        @endif
    </div>
</div>
@endsection
