<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil 5 produk terbaru untuk ditampilkan di home
        $latestProducts = Product::orderBy('created_at', 'desc')->take(5)->get();

        return view('home', compact('latestProducts'));
    }
}
