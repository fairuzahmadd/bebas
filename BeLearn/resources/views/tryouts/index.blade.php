<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tryouts</title>
    <link rel="stylesheet" href="{{ asset('css/tryout.css') }}">
</head>
<body>

@extends('layouts.app') <!-- Menggunakan layout utama -->

@section('content')

<div class="container">
    <!-- Tryout Section -->
    <section class="tryout-section">
        <h1>Available Tryouts</h1>
        <p>Choose a tryout below to begin</p>

        <!-- List of Tryouts -->
        <div class="subject-list">
            @foreach($tryouts as $tryout)
                <div class="subject-card">
                    <div class="subject-info">
                        <h3>{{ $tryout->title }}</h3>
                        <p>{{ $tryout->description }}</p>
                        <a href="{{ route('tryouts.show', $tryout->id) }}" class="btn-primary">Start Tryout</a>
                    </div>

                    <!-- Tombol Delete di Pojok Kanan Atas -->
                    <form action="{{ route('tryouts.destroy', $tryout->id) }}" method="POST" class="delete-form">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete">Delete Tryout</button>
                    </form>
                </div>
            @endforeach
        </div>

        <!-- Tombol Add Tryout -->
        <div class="add-tryout">
            <a href="{{ route('tryouts.create') }}" class="btn-add">Add New Tryout</a>
        </div>
    </section>

</div>

@endsection

</body>
</html>
