@extends('layouts.app')

@section('content')
<div class="container py-6">
    <h1 class="text-3xl font-bold mb-6">Daftar Kursus</h1>

    {{-- Tampilkan pesan sukses jika ada --}}
    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @forelse($courses as $course)
    <div>
        <h2>{{ $course->title }}</h2>
        <p>{{ $course->description }}</p>
        <a href="{{ route('courses.show', $course->id) }}">Lihat</a>
    </div>
@empty
    <p>Belum ada kursus yang tersedia.</p>
@endforelse

    </div>
</div>
@endsection
