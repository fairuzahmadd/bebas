<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Tryout</title>
    <link rel="stylesheet" href="{{ asset('css/tryout.css') }}"> <!-- Link ke file CSS -->
</head>
<body>

@extends('layouts.app') <!-- Menggunakan layout utama -->

@section('content')

<div class="container">
    <section class="tryout-section">
        <h1>Create Tryout</h1>

        <!-- Form Create Tryout -->
        <form action="{{ route('tryouts.store') }}" method="POST" class="tryout-form">
            @csrf

            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" name="title" required class="form-control"><br>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" class="form-control"></textarea><br>
            </div>

            <div class="form-group">
                <label for="start_time">Start Time:</label>
                <input type="datetime-local" name="start_time" required class="form-control"><br>
            </div>

            <div class="form-group">
                <label for="end_time">End Time:</label>
                <input type="datetime-local" name="end_time" required class="form-control"><br>
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <select name="status" class="form-control">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select><br>
            </div>

            <button type="submit" class="btn-primary">Create</button>
        </form>

        <!-- Tombol Add Tryout -->
        <div class="add-tryout">
            <a href="{{ route('tryouts.index') }}" class="btn-primary">Back to Tryouts</a>
        </div>

    </section>
</div>

@endsection

</body>
</html>
