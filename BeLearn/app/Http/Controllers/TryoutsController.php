<?php

namespace App\Http\Controllers;

use App\Models\Tryout;
use App\Models\Question;
use Illuminate\Http\Request;

class TryoutsController extends Controller
{
    // Menampilkan semua Tryout
    public function index()
    {
        $tryouts = Tryout::all();
        return view('tryouts.index', compact('tryouts'));
        
    }

    // Menampilkan detail Tryout dan soal-soalnya
    public function show($tryoutId)
    {
        $tryout = Tryout::with('questions')->findOrFail($tryoutId);
        return view('tryouts.show', compact('tryout'));
        $tryout = Tryout::findOrFail($id);  // Menampilkan tryout berdasarkan ID
        return view('tryout_detail', compact('tryout'));
    }

    // Menampilkan form untuk membuat Tryout baru
    public function create()
    {
        return view('tryouts.create');
    }

    // Menyimpan Tryout baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'start_time' => 'required|date',
            'end_time' => 'required|date',
            'status' => 'required|in:active,inactive',
        ]);

        Tryout::create($request->all());

        return redirect()->route('tryouts.index')->with('success', 'Tryout created successfully.');
    }

    // Menampilkan form untuk mengedit Tryout
    public function edit($id)
    {
        $tryout = Tryout::findOrFail($id);
        return view('tryouts.edit', compact('tryout'));
    }

    // Memperbarui Tryout
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string',
            'start_time' => 'required|date',
            'end_time' => 'required|date',
            'status' => 'required|in:active,inactive',
        ]);

        $tryout = Tryout::findOrFail($id);
        $tryout->update($request->all());

        return redirect()->route('tryouts.index')->with('success', 'Tryout updated successfully.');
    }

    // Menghapus Tryout
    public function destroy($id)
    {
        $tryout = Tryout::findOrFail($id);
        $tryout->delete();

        return redirect()->route('tryouts.index')->with('success', 'Tryout deleted successfully.');
    }
}
