<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material;

class HomeController extends Controller
{
    public function index()
    {
        $materials = Material::whereIn('id', [4, 6, 7])->get();; // Ambil semua data dari tabel 'materials'
        $nav = 'Materi';
        return view('home', compact('materials','nav')); // Kirim ke view
        
    }
    
    
}
