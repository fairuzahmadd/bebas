@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/tryout.css') }}">
<div class="container">
    <h1>{{ $tryout->title }}</h1>
    <p>{{ $tryout->description }}</p>

    <h2>Questions</h2>

    @if($tryout->questions->isEmpty())
        <p>No questions have been added yet. Start by adding one!</p>
    @else
        <div class="question-list">
            @foreach($tryout->questions as $question)
            <div class="question-card">
                <div class="question-content">
                    <h3>{{ $loop->iteration }}. {{ $question->question_text }}</h3>
                    <ul class="options">
                        <li @if($question->correct_option === 'A') class="correct" @endif>
                            A. {{ $question->option_a }}
                        </li>
                        <li @if($question->correct_option === 'B') class="correct" @endif>
                            B. {{ $question->option_b }}
                        </li>
                        <li @if($question->correct_option === 'C') class="correct" @endif>
                            C. {{ $question->option_c }}
                        </li>
                        <li @if($question->correct_option === 'D') class="correct" @endif>
                            D. {{ $question->option_d }}
                        </li>
                    </ul>
                </div>
                <div class="question-actions">
                    <a href="{{ route('questions.edit', [$tryout->id, $question->id]) }}" class="btn-edit">Edit</a>
                    <form action="{{ route('questions.destroy', [$tryout->id, $question->id]) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete">Delete</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    @endif

    <a href="{{ route('questions.create', $tryout->id) }}" class="btn-add">Add New Question</a>
    <a href="{{ route('answers.results', $tryout->id) }}" class="btn-primary">View Results</a>
        </div>
    </div>



</div>
@endsection
