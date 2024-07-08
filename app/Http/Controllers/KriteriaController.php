<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria;

class KriteriaController extends Controller
{
    public function index()
    {
        $data = Kriteria::all(); 
        return view('kriteria.index', compact('data')); 
    }

    public function create()
    {
        return view('kriteria.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'kode_kriteria' => 'required|string|max:255',
            'nama_kriteria' => 'required|string|max:255',
            'bobot' => 'required|numeric',
            'jenis' => 'required|in:Benefit,Cost',
        ]);

  
        Kriteria::create([
            'kode_kriteria' => $request->kode_kriteria,
            'nama_kriteria' => $request->nama_kriteria,
            'bobot' => $request->bobot,
            'jenis' => $request->jenis,
        ]);

        
        return redirect()->route('admin.kriteria.index')->with('success', 'Kriteria berhasil ditambahkan');
    }
}
