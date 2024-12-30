@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Results for {{ $tryout->title }}</h1>
    <p>Ini adalah hasil dari Latihan Tryout</p>

    <div class="results-summary">
        <p><strong>Total Questions:</strong> {{ $totalQuestions }}</p>
        <p><strong>Correct Answers:</strong> {{ $correctAnswersCount }}</p>
        <p><strong>Score:</strong> {{ number_format($scorePercentage, 2) }}%</p>
    </div>

    <a href="{{ route('tryouts.show', $tryout->id) }}" class="btn btn-primary">Back to Tryout</a>
</div>
@endsection
