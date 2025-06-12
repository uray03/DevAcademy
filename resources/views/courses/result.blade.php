@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="text-2xl font-bold mb-4">Hasil Quiz: {{ $course->title }}</h1>

    <p class="mb-2">Total Soal: {{ $totalQuestions }}</p>
    <p class="mb-2">Jawaban Benar: {{ $score }}</p>
    <p class="mb-4">Nilai: {{ number_format($percentage, 2) }}%</p>

    @if ($score >= 8)
        <div class="p-4 bg-green-100 border border-green-400 rounded">
            <p class="font-semibold text-green-800">Selamat! Kamu mendapatkan sertifikat! 🎉</p>
            <a href="#" class="text-blue-600 underline mt-2 inline-block">Unduh Sertifikat</a>
        </div>
    @else
        <div class="p-4 bg-red-100 border border-red-400 rounded">
            <p class="font-semibold text-red-800">Belum memenuhi syarat untuk sertifikat. Coba lagi ya!</p>
        </div>
    @endif
</div>
@endsection
