<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use App\Models\JenisDisposisi;
use Storage;

class SuratMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //halaman surat masuk
        $data = SuratMasuk::all();
        return view('surat-masuk.index', ['title' => 'Surat Masuk', 'data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $disposisi = JenisDisposisi::all();
        return view('surat-masuk.create', ['title' => 'Tambah Surat', 'disposisi' => $disposisi]);
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
            'jenis_disposisi_id' => 'required',
            'catatan' => 'nullable',
        ]);

        if ($request->file('file')) {
            $validatedData['file'] = $request->file('file')->store('file-surat');
        }

        SuratMasuk::create($validatedData);

        return redirect('/suratMasuk')->with('success', 'New data has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(SuratMasuk $suratMasuk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SuratMasuk $suratMasuk)
    {
        //
        $disposisi = JenisDisposisi::all();
        return view('surat-masuk.edit', ['title' => 'Edit Surat', 'suratMasuk' => $suratMasuk, 'disposisi' => $disposisi]);
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
            'jenis_disposisi_id' => 'required',
            'catatan' => 'nullable',
        ]);

        if ($request->file('file')) {
            if ($request->oldFile) {
                Storage::delete($request->oldFile);
            }
            $validatedData['file'] = $request->file('file')->store('file-surat');
        }

        SuratMasuk::where('id', $suratMasuk->id)->update($validatedData);

        return redirect('/suratMasuk')->with('success', 'Data has been updated!');
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
        return redirect('/suratMasuk')->with('success', 'Data has been deleted!');
    }
}
