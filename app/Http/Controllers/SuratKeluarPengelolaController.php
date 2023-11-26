<?php

namespace App\Http\Controllers;

use App\Exports\ExportSuratKeluar;
use App\Models\SuratKeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;

class SuratKeluarPengelolaController extends Controller
{
    public function boot(): void
    {
        parent::boot();

        Route::model('suratKeluarPengelola', SuratKeluar::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = SuratKeluar::all();
        return view('surat-keluar.pengelola.index', ['title' => 'Surat Keluar', 'data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('surat-keluar.pengelola.create', ['title' => 'Tambah Surat']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'nomor_surat' => 'required',
            'tanggal_surat' => 'required|date',
            'tanggal_kirim' => 'required|date',
            'perihal' => 'required',
            'tujuan' => 'required',
            'asal_surat' => 'required',
            'file' => 'file|required',
        ]);

        if ($request->file('file')) {
            $validatedData['file'] = $request->file('file')->store('file-surat-keluar');
        }

        SuratKeluar::create($validatedData);

        return redirect('/suratKeluarPengelola')->with('success', 'Data baru telah berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(SuratKeluar $suratKeluar)
    {
        //
        return view('surat-keluar.pengelola.show', ['title' => 'Detail', 'data' => $suratKeluar]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SuratKeluar $suratKeluar)
    {
        //
        return view('surat-keluar.pengelola.edit', ['title' => 'Edit Surat', 'suratKeluar' => $suratKeluar]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SuratKeluar $suratKeluar)
    {
        //
        $validatedData = $request->validate([
            'nomor_surat' => 'required',
            'tanggal_surat' => 'required|date',
            'tanggal_kirim' => 'required|date',
            'perihal' => 'required',
            'tujuan' => 'required',
            'asal_surat' => 'required',
            'file' => 'file',
        ]);

        if ($request->file('file')) {
            if ($request->oldFile) {
                Storage::delete($request->oldFile);
            }
            $validatedData['file'] = $request->file('file')->store('file-surat-keluar');
        }

        SuratKeluar::where('id', $suratKeluar->id)->update($validatedData);

        return redirect('/suratKeluarPengelola')->with('success', 'Data telah berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SuratKeluar $suratKeluar)
    {
        //
        if ($suratKeluar->file) {
            Storage::delete($suratKeluar->file);
        }
        SuratKeluar::destroy($suratKeluar->id);
        return redirect('/suratKeluarPengelola')->with('success', 'Data telah berhasil dihapus!');
    }

    public function export()
    {
        return Excel::download(new ExportSuratKeluar, 'surat-keluar.xlsx');
    }
}
