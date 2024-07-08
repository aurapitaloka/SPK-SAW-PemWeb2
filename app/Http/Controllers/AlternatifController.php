<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alternatif; 

class AlternatifController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = Alternatif::all(); 
        return view('alternatif.index', compact('data'));
    }

    public function create()
    {
        return view('alternatif.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kode' => 'required|string|max:255',
            'kontak' => 'required|string|max:255',
        ]);
       
        Alternatif::create([
            'nama' => $request->nama,
            'kode' => $request->kode,
            'kontak' => $request->kontak,
        ]);

        return redirect()->route('admin.alternatif.index')->with('success', 'Alternatif berhasil ditambahkan');
    }
    public function edit($id)
{
    $alternatif = Alternatif::findOrFail($id);

    return view('alternatif.edit', compact('alternatif'));
}

}
