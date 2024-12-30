<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMaterialRequest; 
use App\Http\Requests\UpdateMaterialRequest;
use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materials = Material::all();
        $classes = Material::distinct()->pluck('kelas')->sort();
        $subjects = Material::distinct()->pluck('mata_pelajaran')->sort(); // Ambil semua mata pelajaran
        $nav = 'Materi';
    
        return view('material.index', compact('materials', 'classes', 'subjects', 'nav'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $nav = 'Tambah Materi';
        return view('material.create', compact('nav'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMaterialRequest $request)
    {
        $validateData = $request->validate([
            'kelas' => 'required|integer|min:1',
            'mata_pelajaran' => 'required|string|max:255',
            'bab' => 'required|integer|min:1',
            'nama_video' => 'required|string|max:255',
            'video_url' => 'required|url'
        ]);

        Material::create($request->validated());

        return redirect()->route('material.index')->with('success','Video Berhasil Ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Material $material)
    {
        $nav = 'Video - ' . $material->nama_video;
        return view('material.show', compact('material', 'nav'));
    }    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $nav = 'Edit Video - '. $video->nama_video;
        return view('video.edit', compact('video','nav'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Material $material)
    {
        $validatedData = $request->validate([
            'kelas' => 'required|integer|min:1',
            'mata_pelajaran' => 'required|string|max:255',
            'bab' => 'required|integer|min:1',
            'nama_video' => 'required|string|max:255',
            'video_url' => 'required|url',
        ]);
    
        $material->update($validatedData);
    
        return redirect()->route('material.index')->with('success', 'Video Berhasil Diperbarui.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Material $material)
    {
        $material->delete();
    
        return redirect()->route('material.index')->with('success', 'Material berhasil dihapus.');
    }
    

    public function filterByClass($kelas)
    {
        $materials = Material::where('kelas', $kelas)->get();
        $classes = Material::distinct()->pluck('kelas')->sort();
        $nav = 'Materi Kelas ' . $kelas;

        return view('material.index', compact('materials', 'classes', 'nav', 'kelas'));
    }

    public function filterByClassAndSubject($kelas, $mata_pelajaran)
    {
        // Filter berdasarkan kelas dan mata pelajaran
        $materials = Material::where('kelas', $kelas)->where('mata_pelajaran', $mata_pelajaran)->get();
        $classes = Material::distinct()->pluck('kelas')->sort();
        $subjects = Material::distinct()->pluck('mata_pelajaran')->sort(); // Ambil semua mata pelajaran
        $nav = 'Materi Kelas ' . $kelas . ' - Mata Pelajaran ' . $mata_pelajaran;
    
        return view('material.index', compact('materials', 'classes', 'subjects', 'nav', 'kelas', 'mata_pelajaran'));
    }
    
    
}
