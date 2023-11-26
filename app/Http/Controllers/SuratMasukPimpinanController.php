<?php

namespace App\Http\Controllers;

use App\Models\DisposisiPertama;
use App\Models\Divisi;
use App\Models\JenisDisposisi;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class SuratMasukPimpinanController extends Controller
{
    public function boot(): void
    {
        parent::boot();

        Route::model('suratMasukPimpinan', SuratMasuk::class);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = SuratMasuk::all();
        return view('surat-masuk.pimpinan.index', ['title' => 'Surat Masuk', 'data' => $data]);
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
    public function show(SuratMasuk $suratMasuk)
    {
        //
        $divisis = Divisi::all();
        $jenis_disposisis = JenisDisposisi::all();
        return view('surat-masuk.pimpinan.show', ['title' => 'Surat Masuk', 'suratMasuk' => $suratMasuk, 'divisis' => $divisis, 'jenis_disposisis' => $jenis_disposisis]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SuratMasuk $suratMasuk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SuratMasuk $suratMasuk)
    {
        //
        $validatedData = $request->validate([
            'surat_masuk_id' => 'required',
            'divisi_id' => 'required',
            'jenis_disposisi' => 'required',
            'catatan' => 'nullable',
        ]);

        $status = ['status' => 'Menunggu instruksi kepala bagian'];

        SuratMasuk::where('id', $suratMasuk->id)->update($status);
        DisposisiPertama::create($validatedData);

        if (Route::currentRouteName() == 'updatePending') {
            return redirect('/suratMasukPimpinan/pending/' . $suratMasuk->id)->with('success', 'Instruksi berhasil ditambahkan!');
        } else {
            return redirect('/suratMasukPimpinan/' . $suratMasuk->id)->with('success', 'Instruksi berhasil ditambahkan!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SuratMasuk $suratMasuk)
    {
        //
    }

    public function pending()
    {
        $data = SuratMasuk::doesntHave('DisposisiPertama')->get();
        return view('surat-masuk.pimpinan.index', ['title' => 'Surat Masuk', 'data' => $data]);
    }

    public function showPending(SuratMasuk $suratMasuk)
    {
        $divisis = Divisi::all();
        $jenis_disposisis = JenisDisposisi::all();
        return view('surat-masuk.pimpinan.show-pending', ['title' => 'Surat Masuk', 'suratMasuk' => $suratMasuk, 'divisis' => $divisis, 'jenis_disposisis' => $jenis_disposisis]);
    }
}
