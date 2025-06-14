@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 pt-32 pb-24">
    {{-- Hero --}}
    <div class="bg-indigo-50 rounded-xl p-10 text-center mb-12 shadow-sm">
        <h1 class="text-4xl font-extrabold text-indigo-700">Selamat Datang di DevAcademy 🚀</h1>
        <p class="mt-4 text-gray-700 text-lg">Kuasai skill baru, kembangkan potensimu, dan raih impianmu bersama kami!</p>
    </div>

    {{-- Course List --}}
    <h2 class="text-2xl font-bold text-gray-900 mb-6">📚 Daftar Kursus Tersedia</h2>

    @if ($courses->isEmpty())
        <div class="text-center text-gray-500 text-lg">
            Belum ada kursus yang tersedia.
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($courses as $course)
                <a href="{{ route('courses.show', $course->id) }}" class="bg-white border rounded-2xl shadow-md hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                    <div class="p-6">
                        {{-- Icon kursus (bisa diganti pakai <img src="..."> kalau mau pakai gambar ilustrasi) --}}
                        <div class="text-indigo-600 mb-3">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" stroke-width="1.5"
                                 viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M12 6v6h4m6 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $course->title }}</h3>
                        <p class="text-gray-600 text-sm mb-4">{{ Str::limit($course->description, 90) }}</p>
                        <span class="text-sm text-indigo-600 font-semibold">Lihat Detail →</span>
                    </div>
                </a>
            @endforeach
        </div>
    @endif
</div>
@endsection
