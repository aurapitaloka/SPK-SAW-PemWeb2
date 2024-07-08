<?php

namespace App\Http\Controllers;

use App\Models\AlternatifKriteria;
use Illuminate\Http\Request;

class PerhitunganController extends Controller
{
    public function index()
    {
        $data = AlternatifKriteria::all();
        return view('perhitungan.index', compact('data'));
    }

    public function calculate()
    {
        $data = AlternatifKriteria::all();

        // Menghitung nilai maksimum dan minimum
        $maxFasilitas = $data->max('fasilitas');
        $maxKeamanan = $data->max('keamanan');
        $maxKebersihan = $data->max('kebersihan');
        $maxRating = $data->max('rating');
        $minHarga = $data->min('harga');

        // Melakukan normalisasi
        foreach ($data as $item) {
            $item->normalized_harga = $minHarga / $item->harga;
            $item->normalized_fasilitas = $item->fasilitas / $maxFasilitas;
            $item->normalized_keamanan = $item->keamanan / $maxKeamanan;
            $item->normalized_kebersihan = $item->kebersihan / $maxKebersihan;
            $item->normalized_rating = $item->rating / $maxRating;
        }

        return view('perhitungan.calculate', compact('data'));
    }

    public function ranking()
    {
        $data = AlternatifKriteria::all();

        // Menghitung nilai maksimum dan minimum
        $maxFasilitas = $data->max('fasilitas');
        $maxKeamanan = $data->max('keamanan');
        $maxKebersihan = $data->max('kebersihan');
        $maxRating = $data->max('rating');
        $minHarga = $data->min('harga');

        // Melakukan normalisasi dan perhitungan skor
        foreach ($data as $item) {
            $item->normalized_harga = $minHarga / $item->harga;
            $item->normalized_fasilitas = $item->fasilitas / $maxFasilitas;
            $item->normalized_keamanan = $item->keamanan / $maxKeamanan;
            $item->normalized_kebersihan = $item->kebersihan / $maxKebersihan;
            $item->normalized_rating = $item->rating / $maxRating;

            // Menghitung skor total dengan bobot (contoh bobot bisa disesuaikan)
            $item->total_score = (
                $item->normalized_harga * 0.3 +
                $item->normalized_fasilitas * 0.2 +
                $item->normalized_keamanan * 0.2 +
                $item->normalized_kebersihan * 0.2 +
                $item->normalized_rating * 0.1
            );
        }

        // Mengurutkan data berdasarkan skor total
        $sortedData = $data->sortByDesc('total_score');

        return view('perhitungan.ranking', compact('sortedData'));
    }
}
