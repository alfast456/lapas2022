<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tentang;
use App\Models\dasaruu;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function kunjungan()
    {
        return view('kunjungan');
    }

    public function visi()
    {
        $visi = tentang::all();
        return view('informasi1', compact('visi'));
    }

    public function dasaruu()
    {
        $dasaruu = dasaruu::all();
        return view('informasi2', compact('dasaruu'));
    }
}
