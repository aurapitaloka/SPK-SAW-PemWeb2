<?php

namespace App\Http\Controllers;

use App\Models\AlternatifKriteria;
use App\Models\Alternatif;
use Illuminate\Http\Request;

class AlternatifKriteriaController extends Controller
{
    public function index()
    {
        $data = AlternatifKriteria::all();
        return view('alternatif_kriteria.index', compact('data'));
    }

    public function create()
    {
        $alternatifs = Alternatif::all(); // Mengambil data alternatif untuk dropdown
        return view('alternatif_kriteria.create', compact('alternatifs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_alternatif' => 'required',
            'harga' => 'required|numeric',
            'fasilitas' => 'required|numeric',
            'keamanan' => 'required|numeric',
            'kebersihan' => 'required|numeric',
            'rating' => 'required|numeric',
        ]);

        AlternatifKriteria::create($request->all());
        return redirect()->route('admin.alternatif_kriteria.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $alternatifKriteria = AlternatifKriteria::findOrFail($id);
        $alternatifs = Alternatif::all();
        return view('alternatif_kriteria.edit', compact('alternatifKriteria', 'alternatifs'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_alternatif' => 'required',
            'harga' => 'required|numeric',
            'fasilitas' => 'required|numeric',
            'keamanan' => 'required|numeric',
            'kebersihan' => 'required|numeric',
            'rating' => 'required|numeric',
        ]);

        $alternatifKriteria = AlternatifKriteria::findOrFail($id);
        $alternatifKriteria->update($request->all());
        return redirect()->route('admin.alternatif_kriteria.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function delete($id)
    {
        $alternatifKriteria = AlternatifKriteria::findOrFail($id);
        $alternatifKriteria->delete();
        return redirect()->route('admin.alternatif_kriteria.index')->with('success', 'Data berhasil dihapus.');
    }
}
