<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $featuredProducts = Product::take(3)->get();
        return view('dashboard', compact('featuredProducts'));
    }
}