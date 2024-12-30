<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Tryout;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    // Menampilkan hasil nilai dari tryout tertentu
    public function showResults($tryoutId)
    {
        // Cari tryout berdasarkan ID
        $tryout = Tryout::with('questions')->findOrFail($tryoutId);

        // Ambil jawaban peserta berdasarkan tryout
        $answers = Answer::whereHas('question', function ($query) use ($tryoutId) {
            $query->where('tryout_id', $tryoutId);
        })->get();

        // Hitung jumlah jawaban yang benar
        $correctAnswersCount = $answers->where('is_correct', true)->count();

        // Hitung total jumlah soal
        $totalQuestions = $tryout->questions->count();

        // Hitung skor dalam persentase
        $scorePercentage = $totalQuestions > 0 ? ($correctAnswersCount / $totalQuestions) * 100 : 0;

        // Kirim data ke view
        return view('answers.results', compact('tryout', 'correctAnswersCount', 'totalQuestions', 'scorePercentage'));
    }
}
