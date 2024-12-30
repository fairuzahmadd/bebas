@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Material</div>
                <div class="card-body">
                    <form action="{{ route('material.update', $material->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="kelas" class="form-label">Kelas</label>
                            <select class="form-select" name="kelas" id="kelas" required>
                                <option value="" disabled selected>Pilih Kelas</option>
                                <option value="1" {{ $material->kelas == 1 ? 'selected' : '' }}>Kelas 1</option>
                                <option value="2" {{ $material->kelas == 2 ? 'selected' : '' }}>Kelas 2</option>
                                <option value="3" {{ $material->kelas == 3 ? 'selected' : '' }}>Kelas 3</option>
                                <option value="4" {{ $material->kelas == 4 ? 'selected' : '' }}>Kelas 4</option>
                                <option value="5" {{ $material->kelas == 5 ? 'selected' : '' }}>Kelas 5</option>
                                <option value="6" {{ $material->kelas == 6 ? 'selected' : '' }}>Kelas 6</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="mata_pelajaran" class="form-label">Mata Pelajaran</label>
                            <select class="form-select" name="mata_pelajaran" id="mata_pelajaran" required>
                                <option value="" disabled selected>Pilih Mata Pelajaran</option>
                                <option value="Matematika" {{ $material->mata_pelajaran == 'Matematika' ? 'selected' : '' }}>Matematika</option>
                                <option value="IPA" {{ $material->mata_pelajaran == 'IPA' ? 'selected' : '' }}>IPA</option>
                                <option value="IPS" {{ $material->mata_pelajaran == 'IPS' ? 'selected' : '' }}>IPS</option>
                                <option value="Bahasa Indonesia" {{ $material->mata_pelajaran == 'Bahasa Indonesia' ? 'selected' : '' }}>Bahasa Indonesia</option>
                                <option value="Bahasa Inggris" {{ $material->mata_pelajaran == 'Bahasa Inggris' ? 'selected' : '' }}>Bahasa Inggris</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="bab" class="form-label">Bab</label>
                            <select class="form-select" name="bab" id="bab" required>
                                <option value="" disabled selected>Pilih Bab</option>
                                <option value="1" {{ $material->bab == 1 ? 'selected' : '' }}>Bab 1</option>
                                <option value="2" {{ $material->bab == 2 ? 'selected' : '' }}>Bab 2</option>
                                <option value="3" {{ $material->bab == 3 ? 'selected' : '' }}>Bab 3</option>
                                <option value="4" {{ $material->bab == 4 ? 'selected' : '' }}>Bab 4</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="nama_video" class="form-label">Nama Video</label>
                            <input type="text" name="nama_video" id="nama_video" class="form-control" value="{{ $material->nama_video }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="video_url" class="form-label">URL Video</label>
                            <input type="url" name="video_url" id="video_url" class="form-control" value="{{ $material->video_url }}" required>
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                        <a href="{{ route('material.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
