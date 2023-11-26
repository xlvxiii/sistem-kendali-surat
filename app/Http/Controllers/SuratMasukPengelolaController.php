<?php

namespace App\Http\Controllers;

use App\Exports\ExportSuratMasuk;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Storage;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class SuratMasukPengelolaController extends Controller
{
    public function boot(): void
    {
        parent::boot();

        Route::model('suratMasukPengelola', SuratMasuk::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //halaman surat masuk
        $data = SuratMasuk::all();
        return view('surat-masuk.pengelola.index', ['title' => 'Surat Masuk', 'data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('surat-masuk.pengelola.create', ['title' => 'Tambah Surat']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'nomor_surat' => 'required',
            'asal_surat' => 'required',
            'perihal' => 'required',
            'nomor_agenda' => 'nullable',
            'tanggal_surat' => 'required|date',
            'tanggal_diterima' => 'required|date',
            'file' => 'required|file',
            // 'jenis_disposisi_id' => 'required',
            'catatan' => 'nullable',
        ]);

        if ($request->file('file')) {
            $validatedData['file'] = $request->file('file')->store('file-surat-masuk');
        }

        $validatedData['status'] = 'Menunggu instruksi Pimpinan';

        SuratMasuk::create($validatedData);

        return redirect('/suratMasukPengelola')->with('success', 'Data baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(SuratMasuk $suratMasuk)
    {
        //
        return view('surat-masuk.pengelola.show', ['title' => 'Detail Surat', 'suratMasuk' => $suratMasuk]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SuratMasuk $suratMasuk)
    {
        //
        return view('surat-masuk.pengelola.edit', ['title' => 'Edit Surat', 'suratMasuk' => $suratMasuk]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SuratMasuk $suratMasuk)
    {
        //
        $validatedData = $request->validate([
            'nomor_surat' => 'required',
            'asal_surat' => 'required',
            'perihal' => 'required',
            'nomor_agenda' => 'nullable',
            'tanggal_surat' => 'required|date',
            'tanggal_diterima' => 'required|date',
            'file' => 'file',
            // 'jenis_disposisi_id' => 'required',
            'catatan' => 'nullable',
        ]);

        if ($request->file('file')) {
            if ($request->oldFile) {
                Storage::delete($request->oldFile);
            }
            $validatedData['file'] = $request->file('file')->store('file-surat-masuk');
        }

        SuratMasuk::where('id', $suratMasuk->id)->update($validatedData);

        return redirect('/suratMasukPengelola')->with('success', 'Data telah berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SuratMasuk $suratMasuk)
    {
        //
        if ($suratMasuk->file) {
            Storage::delete($suratMasuk->file);
        }
        SuratMasuk::destroy($suratMasuk->id);
        return redirect('/suratMasukPengelola')->with('success', 'Data has been deleted!');
    }

    public function export()
    {
        return Excel::download(new ExportSuratMasuk, 'surat-masuk.xlsx');
    }
}
