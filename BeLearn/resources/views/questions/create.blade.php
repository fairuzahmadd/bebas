@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Question for {{ $tryout->title }}</h1>

    <form action="{{ route('questions.store', $tryout->id) }}" method="POST" class="tryout-form">
        @csrf
        <div class="form-group">
            <label for="question_text">Question Text</label>
            <textarea name="question_text" id="question_text" class="form-control" placeholder="Enter the question here..." required></textarea>
        </div>

        <h3>Options</h3>
        @foreach(['A', 'B', 'C', 'D'] as $option)
        <div class="form-group">
            <label for="option_{{ strtolower($option) }}">Option {{ $option }}</label>
            <div class="input-group">
                <input type="text" name="option_{{ strtolower($option) }}" id="option_{{ strtolower($option) }}" class="form-control" placeholder="Enter option {{ $option }} here..." required>
                <div class="input-group-append">
                    <div class="form-check">
                        <input type="radio" name="correct_option" value="{{ $option }}" id="correct_option_{{ $option }}" class="form-check-input" required>
                        <label for="correct_option_{{ $option }}" class="form-check-label">Correct Answer</label>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        <button type="submit" class="btn-primary">Add Question</button>
    </form>
</div>
@endsection
