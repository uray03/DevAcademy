@extends('layouts.app')

@section('content')
<style>
  .community-header {
    text-align: center;
    padding: 4rem 1rem 2rem;
    background: linear-gradient(90deg, #1e3a8a, #2563eb);
    color: white;
  }

  .community-header h1 {
    font-size: 3rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
  }

  .community-header p {
    font-size: 1.25rem;
    color: #dbeafe;
  }

  .community-container {
    max-width: 900px;
    margin: 2rem auto;
    padding: 0 1rem;
  }

  .search-form {
    display: flex;
    gap: 1rem;
    margin-bottom: 2rem;
  }

  .search-form input[type="text"] {
    flex: 1;
    padding: 0.75rem;
    border: 1px solid #ccc;
    border-radius: 8px;
  }

  .search-form button {
    padding: 0.75rem 1.5rem;
    background: #1e3a8a;
    color: white;
    border: none;
    border-radius: 8px;
    font-weight: bold;
    cursor: pointer;
  }

  .post-form {
    background: #f9fafb;
    padding: 2rem;
    border-radius: 12px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    margin-bottom: 2rem;
  }

  .post-form textarea,
  .post-form input[type="text"],
  .post-form input[type="file"] {
    width: 100%;
    margin-top: 1rem;
    margin-bottom: 1rem;
    padding: 0.75rem;
    border: 1px solid #ccc;
    border-radius: 8px;
  }

  .post-form button {
    background: #1e3a8a;
    color: white;
    padding: 0.75rem 1.5rem;
    border: none;
    border-radius: 8px;
    font-weight: bold;
    cursor: pointer;
  }

  .post-item {
    background: white;
    padding: 1.5rem;
    border-radius: 10px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    margin-bottom: 1.5rem;
  }

  .post-item h3 {
    font-size: 1.25rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
  }

  .post-item img {
    max-width: 100%;
    margin-top: 0.75rem;
    border-radius: 8px;
  }
</style>

<div class="community-header">
  <h1>Komunitas</h1>
  <p>Tempat diskusi seluruh DevAcademy</p>
</div>

<div class="community-container">

  {{-- Search Form --}}
  <form action="{{ route('komunitas') }}" method="GET" class="search-form">
    <input type="text" name="search" placeholder="Cari pertanyaan..." value="{{ request('search') }}">
    <button type="submit">Cari</button>
  </form>

  {{-- Post Form --}}
  <form action="{{ route('komunitas.store') }}" method="POST" enctype="multipart/form-data" class="post-form">
    @csrf
    <input type="text" name="title" placeholder="Judul pertanyaan" required>
    <textarea name="content" rows="4" placeholder="Tuliskan pertanyaan kamu di sini..." required></textarea>
    <input type="file" name="image" accept="image/*">
    <button type="submit">Kirim Pertanyaan</button>
  </form>

  {{-- List Posts --}}
  @foreach ($posts as $post)
  <div class="post-item">
    <h3>{{ $post->title }}</h3>
    <p>{{ $post->content }}</p>
    @if ($post->image)
      <img src="{{ asset('storage/' . $post->image) }}" alt="Gambar pertanyaan">
    @endif

    {{-- Komentar --}}
    <div class="comments">
      <h5>Komentar:</h5>
      @if ($post->comments && $post->comments->count())
        @foreach ($post->comments as $comment)
          <div class="comment-box">
            <p>{{ $comment->content }}</p>
          </div>
        @endforeach
      @else
        <p>Belum ada komentar.</p>
      @endif

      {{-- Form komentar --}}
      <form action="{{ route('komentar.store', $post->id) }}" method="POST">
        @csrf
        <textarea name="content" placeholder="Tulis komentar..." required></textarea>
        <button type="submit">Kirim</button>
      </form>
    </div>
  </div>
@endforeach



</div>
@endsection






