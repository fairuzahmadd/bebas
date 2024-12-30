@extends('layouts.app')

@section('content')
<!-- Carousel Section -->
<div id="carouselExampleCaptions" class="carousel slide mb-4" data-bs-ride="carousel" style="max-height: 400px; overflow: hidden;">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('images/slide1.png') }}" class="d-block w-100" alt="Slide 1" style="object-fit: cover; height: 400px;">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/slide2.jpg') }}" class="d-block w-100" alt="Slide 2" style="object-fit: cover; height: 400px;">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/slide3.jpg') }}" class="d-block w-100" alt="Slide 3" style="object-fit: cover; height: 400px;">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<!-- Main Content Section -->
<div class="container">
    <!-- Why BeLearn Section -->
    <h2 class="text-start mb-4">Why BeLearn?</h2>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <div class="card h-100 text-center p-3 border-1 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Talistha</h5>
                    <p class="text-muted">Ibu Rumah Tangga</p>
                    <p class="card-text">
                        "Semenjak menggunakan BeLearn untuk anak saya dia lebih suka mengakses video pembelajaran karena video yang ditampilkan sangat menarik."
                    </p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 text-center p-3 border-1 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Andre Rudolf</h5>
                    <p class="text-muted">Siswa SDN 01 Bandung</p>
                    <p class="card-text">
                        "Saya suka dengan video yang ditampilkan oleh web ini karena saya jadi gampang buat cek pelajaran di sekolah."
                    </p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 text-center p-3 border-1 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Muhammad Taufik Hidayat</h5>
                    <p class="text-muted">Guru Matematika SDIT As-Syifa Jakarta</p>
                    <p class="card-text">
                        "Materi yang ada pada BeLearn ini sudah sesuai dengan materi materi yang di ajarkan di kelas dan BeLearn membantu siswa juga latihan soal."
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Video Example Section -->
    <div class="container my-5">
        <h2 class="text-start mb-4">Materials</h2>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @if ($materials->isEmpty())
                <p class="text-center">Tidak ada materi yang tersedia.</p>
            @else
                @foreach ($materials as $material)
                    <div class="col">
                        <div class="card h-100 text-center p-3 border-1 shadow-sm">
                            <div class="card-body">
                                @php
                                    if (str_contains($material->video_url, 'youtu.be')) {
                                        $video_id = last(explode('/', $material->video_url));
                                    } elseif (str_contains($material->video_url, 'youtube.com')) {
                                        parse_str(parse_url($material->video_url, PHP_URL_QUERY), $params);
                                        $video_id = $params['v'] ?? null;
                                    } else {
                                        $video_id = null;
                                    }
                                @endphp
                
                                @if ($video_id)
                                    <iframe 
                                        width="100%" 
                                        height="150" 
                                        src="https://www.youtube.com/embed/{{ $video_id }}" 
                                        frameborder="0" 
                                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
                                        allowfullscreen>
                                    </iframe>
                                @else
                                    <p>Video tidak valid.</p>
                                @endif
                
                                <h5 class="card-title mt-3">{{ $material->nama_video }}</h5>
                                <p class="text-muted">Kelas {{ $material->kelas }} - Bab {{ $material->bab }}</p>
                                <p class="text-primary">{{ $material->mata_pelajaran }}</p>
                
                                <!-- Bookmark Button -->
                                <form action="{{ route('bookmark.store') }}" method="POST" class="mt-2">
                                    @csrf
                                    <input type="hidden" name="material_id" value="{{ $material->id }}">
                                    <button type="submit" class="btn btn-outline-primary btn-sm">Bookmark</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
@endsection
