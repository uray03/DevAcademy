@extends('layouts.app')

@section('content')
<style>
  :root {
    --primary-color: #111827;
    --primary-hover: #2563eb;
    --text-color: #6b7280;
    --card-radius: 0.75rem;
    --card-shadow: rgba(0,0,0,0.05);
    --transition-speed: 0.3s;
  }

  html {
    scroll-behavior: smooth;
  }

  .hero {
    max-width: 720px;
    margin: auto;
    padding-top: 8rem;
    padding-bottom: 6rem;
    text-align: center;
    color: var(--primary-color);
  }

  .hero h1 {
    font-size: 3.5rem;
    font-weight: 700;
    margin-bottom: 1rem;
  }

  .hero p {
    color: var(--text-color);
    font-size: 1.25rem;
    margin-bottom: 3rem;
  }

  .btn-group {
    display: flex;
    justify-content: center;
    gap: 1.5rem;
    flex-wrap: wrap;
  }

  .btn {
    font-weight: 700;
    font-size: 1.125rem;
    padding: 0.75rem 2.5rem;
    border-radius: var(--card-radius);
    cursor: pointer;
    border: none;
    transition: background-color var(--transition-speed), transform var(--transition-speed);
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
  }

  .btn-primary {
    background-color: var(--primary-color);
    color: white;
  }

  .btn-primary:hover {
    background-color: var(--primary-hover);
    transform: scale(1.05);
  }

  .features {
    max-width: 1200px;
    margin: auto;
    padding: 4rem 1.5rem;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 2rem;
  }

  .feature-card {
    background: white;
    border-radius: var(--card-radius);
    box-shadow: 0 2px 10px var(--card-shadow);
    padding: 2rem 1.5rem;
    text-align: center;
    transition: transform var(--transition-speed), box-shadow var(--transition-speed);
    text-decoration: none;
    color: inherit;
  }

  .feature-card:hover {
    box-shadow: 0 8px 20px var(--primary-hover);
    transform: translateY(-6px);
  }

  .feature-icon {
    font-size: 3.5rem;
    margin-bottom: 1rem;
  }

  .feature-title {
    font-size: 1.25rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
  }

  .feature-desc {
    font-size: 1rem;
    color: var(--text-color);
  }

  .section-detail {
    max-width: 800px;
    margin: 0 auto;
    padding: 4rem 1.5rem;
    border-top: 1px solid #e5e7eb;
    text-align: center;
  }

  .section-detail h2 {
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 1rem;
    color: var(--primary-color);
  }

  .section-detail p {
    font-size: 1.125rem;
    color: var(--text-color);
    line-height: 1.6;
  }

  @media (max-width: 640px) {
    .hero h1 {
      font-size: 2.5rem;
    }
  }
</style>

<section class="hero" aria-label="Hero section">
  <h1>Belajar Koding, Bangun Karier Anda</h1>
  <p>Kembangkan keterampilan Anda melalui kursus profesional, tantangan proyek nyata, serta mentoring dari para ahli terkemuka.</p>
  <div class="btn-group">
    <a href="{{ route('register') }}" class="btn btn-primary">Mulai Sekarang</a>
  </div>
</section>

<section class="features" aria-label="Keunggulan platform">
  <a href="#detail-kursus" class="feature-card">
    <div class="feature-icon">📚</div>
    <div class="feature-title">Kursus Profesional</div>
  </a>

  <a href="#detail-proyek" class="feature-card">
    <div class="feature-icon">🛠️</div>
    <div class="feature-title">Tantangan Proyek</div>
  </a>

  <a href="#detail-mentoring" class="feature-card">
    <div class="feature-icon">👥</div>
    <div class="feature-title">Mentoring Ahli</div>
  </a>

  <a href="#detail-sertifikat" class="feature-card">
    <div class="feature-icon">🎓</div>
    <div class="feature-title">Sertifikat Terakreditasi</div>
  </a>
</section>

<section id="detail-kursus" class="section-detail">
  <h2>📚 Kursus Profesional</h2>
  <p>Kami menyediakan kursus profesional dengan materi komprehensif dan relevan. Dirancang oleh pakar industri, kursus ini akan membekalimu dengan keterampilan yang dicari perusahaan dan startup teknologi.</p>
</section>

<section id="detail-proyek" class="section-detail">
  <h2>🛠️ Tantangan Proyek</h2>
  <p>Uji kemampuanmu dalam proyek nyata: dari membangun aplikasi web, mengintegrasi API, hingga debugging dalam skenario realistis. Semua proyek akan memperkuat portofoliomu dan menunjukkan keahlianmu di dunia kerja.</p>
</section>

<section id="detail-mentoring" class="section-detail">
  <h2>👥 Mentoring Ahli</h2>
  <p>Dapatkan kesempatan untuk berdiskusi dengan mentor berpengalaman. Konsultasikan masalah coding, minta review proyek, dan dapatkan tips karier langsung dari profesional di industri teknologi.</p>
</section>

<section id="detail-sertifikat" class="section-detail">
  <h2>🎓 Sertifikat Terakreditasi</h2>
  <p>Sertifikat dari kursus ini bisa ditampilkan di LinkedIn dan resume. Validasi keahlianmu dan buka peluang karier dengan pengakuan resmi dari platform pembelajaran terpercaya.</p>
</section>



@endsection


