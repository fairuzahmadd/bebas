@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('material.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="kelas" class="form-label">Kelas</label>
                        <select class="form-select" name="kelas" id="kelas">
                            <option value="">Pilih Kelas</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                        </select>
                        @error('kelas')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="mata_pelajaran" class="form-label">Mata Pelajaran</label>
                        <select class="form-select" name="mata_pelajaran" id="mata_pelajaran">
                            <option value="">Pilih Mata Pelajaran</option>
                            <option value="Matematika">Matematika</option>
                            <option value="IPA">IPA</option>
                            <option value="IPS">IPS</option>
                            <option value="Bahasa Inggris">Bahasa Inggris</option>
                            <option value="Bahasa Indonesia">Bahasa Indonesia</option>
                        </select>
                        @error('mata_pelajaran')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="bab" class="form-label"></label>
                        <label for="bab" class="form-label">Bab</label>
                        <select class="form-select" name="bab" id="bab">
                            <option value="">Pilih Bab</option>
                            <option value=1>1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                        @error('bab')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nama_video" class="form-label">Nama Video</label>
                        <input type="text" class="form-control @error('nama_video') is-invalid @enderror" id="nama_video"
                            name="nama_video" placeholder="Masukkan Nama Video" value="{{ old('nama_video') }}">
                        @error('nama_video')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="video_url" class="form-label">Link Video</label>
                        <input type="text" class="form-control @error('video_url') is-invalid @enderror" id="video_url"
                            name="video_url" placeholder="Masukkan Link Video" value="{{ old('video_url') }}">
                        @error('video_url')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary btn btn-primary mt-3 fs-5" style="margin-top: 20px; font-size: 18px;">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection