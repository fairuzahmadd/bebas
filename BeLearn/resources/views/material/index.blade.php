@extends('layouts.app')

@section('content')

<!-- Button Tambah Materi Section -->
<div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
    <a href="{{ route('material.create') }}" class="btn btn-primary d-flex gap-2">
        <span class="material-symbols-rounded fs-6">add</span>
        Tambah Materi
    </a>
</div>

<!-- Main Content Section -->
<div class="container">
    <div class="row">
        <!-- Sidebar Section -->
        <div class="col-2">
            <div class="card">
                <div class="card-header">Materi Belajar</div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <a href="{{ route('material.index') }}">All</a>
                    </li>

                    @foreach ($classes as $class)
                        <li class="list-group-item">
                            <a href="#" class="text-decoration-none" data-bs-toggle="collapse" data-bs-target="#subject-collapse-{{ $class }}" aria-expanded="false" aria-controls="subject-collapse-{{ $class }}">
                                Kelas {{ $class }}
                            </a>
                            <!-- Dropdown mata pelajaran -->
                            <div class="collapse" id="subject-collapse-{{ $class }}">
                                <ul class="list-group mt-2">
                                    @foreach ($subjects as $subject)
                                        <li class="list-group-item">
                                            <a href="{{ route('material.filterClassAndSubject', ['kelas' => $class, 'mata_pelajaran' => $subject]) }}" class="text-decoration-none">{{ $subject }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- Main Section -->
        <div class="col-md-10">
            <div class="card">
                <div class="card-header mb-3">
                    Materi @isset($kelas) untuk Kelas {{ $kelas }} @endisset @isset($mata_pelajaran) - Mata Pelajaran {{ $mata_pelajaran }} @endisset
                </div>
                @forelse ($materials as $material)
                    <div class="col-md-11 mb-3 mx-auto">
                        <div class="card">
                            <div class="card-header">
                                Kelas {{$material->kelas}} - Bab {{ $material->bab }} - {{ $material->mata_pelajaran }}
                            </div>
                            <div class="card-body">
                                <h5>{{ $material->nama_video }}</h5>
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
                                      height="400" 
                                      src="https://www.youtube.com/embed/{{ $video_id }}" 
                                      frameborder="0" 
                                      allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
                                      allowfullscreen>
                                  </iframe>
                              @else
                                  <p>Video tidak valid.</p>
                              @endif
                            </div>
                            <div class="card-footer d-flex justify-content-between">
                                <!-- Edit Button -->
                                <a href="{{ route('material.show', $material->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                <!-- Bookmark Button -->
                                <form action="{{ route('bookmark.store') }}" method="POST" class="d-inline">
                                    @csrf
                                    <input type="hidden" name="material_id" value="{{ $material->id }}">
                                    <button type="submit" class="btn btn-outline-primary btn-sm">Bookmark</button>
                                </form>

                                <!-- Delete Button -->
                                <form action="{{ route('material.destroy', $material->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this material?');" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center">Belum ada materi untuk kelas ini.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>

@endsection
