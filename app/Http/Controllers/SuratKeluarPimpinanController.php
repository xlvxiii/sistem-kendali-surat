<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class SuratKeluarPimpinanController extends Controller
{
    public function boot(): void
    {
        parent::boot();

        Route::model('suratKeluarPengelola', SuratMasuk::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = SuratKeluar::all();
        return view('surat-keluar.pimpinan.index', ['title' => 'Surat Keluar', 'data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(SuratKeluar $suratKeluar)
    {
        //
        return view('surat-keluar.pimpinan.show', ['title' => 'Detail', 'data' => $suratKeluar]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SuratKeluar $suratKeluar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SuratKeluar $suratKeluar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SuratKeluar $suratKeluar)
    {
        //
    }
}
