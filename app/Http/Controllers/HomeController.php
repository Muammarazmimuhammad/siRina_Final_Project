<?php

// Contoh jika kamu pakai HomeController
namespace App\Http\Controllers;

use App\Models\Ruangan;

class HomeController extends Controller
{
    public function index()
    {
        
        $gedung = Ruangan::select('gedung')->distinct()->pluck('gedung');

        return view('welcome', compact('gedung')); // ✅ kirim $gedung ke view
    }

    public function ruangan()
    {
        return view('ruangan');
    }
}
