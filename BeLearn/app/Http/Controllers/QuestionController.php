<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Tryout;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    // Menampilkan form untuk menambahkan soal
    public function create($tryoutId)
    {
        $tryout = Tryout::findOrFail($tryoutId);
        return view('questions.create', compact('tryout'));
    }

    // Menyimpan soal baru
    public function store(Request $request, $tryoutId)
    {
        $request->validate([
            'question_text' => 'required|string',
            'option_a' => 'required|string',
            'option_b' => 'required|string',
            'option_c' => 'required|string',
            'option_d' => 'required|string',
            'correct_option' => 'required|in:A,B,C,D',
        ]);

        Question::create([
            'tryout_id' => $tryoutId,
            'question_text' => $request->question_text,
            'option_a' => $request->option_a,
            'option_b' => $request->option_b,
            'option_c' => $request->option_c,
            'option_d' => $request->option_d,
            'correct_option' => $request->correct_option,
        ]);

        return redirect()->route('tryouts.show', $tryoutId)->with('success', 'Question added successfully.');
    }

    // Menampilkan form untuk mengedit soal
    public function edit($tryoutId, $questionId)
    {
    $tryout = Tryout::findOrFail($tryoutId); // Cari tryout berdasarkan ID
    $question = Question::findOrFail($questionId); // Cari question berdasarkan ID
    return view('questions.edit', compact('tryout', 'question')); // Pastikan kedua variabel tersedia
    }

    // Memperbarui soal
    public function update(Request $request, $tryoutId, $questionId)
    {
        $request->validate([
            'question_text' => 'required|string',
            'option_a' => 'required|string',
            'option_b' => 'required|string',
            'option_c' => 'required|string',
            'option_d' => 'required|string',
            'correct_option' => 'required|in:A,B,C,D',
        ]);

        $question = Question::where('tryout_id', $tryoutId)->findOrFail($questionId);
        $question->update($request->all());

        return redirect()->route('tryouts.show', $tryoutId)->with('success', 'Question updated successfully.');
    }

    // Menghapus soal
    public function destroy($tryoutId, $id)
    {
        $question = Question::where('tryout_id', $tryoutId)->findOrFail($id);
        $question->delete();

        return redirect()->route('tryouts.show', $tryoutId)->with('success', 'Question deleted successfully.');
    }

    

}
