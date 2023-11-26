<?php

namespace App\Http\Controllers;

use App\Models\DisposisiKedua;
use App\Models\JenisDisposisi;
use App\Models\User;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Contracts\Database\Query\Builder as QueryBuilder;

class SuratMasukKabagController extends Controller
{
    public function boot(): void
    {
        parent::boot();

        Route::model('suratMasukKabag', SuratMasuk::class);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = SuratMasuk::whereHas('DisposisiPertama', function (QueryBuilder $query) {$query->where('divisi_id', Auth::user()->divisi_id);})->get();
        return view('surat-masuk.kabag.index', ['title' => 'Surat Masuk', 'data' => $data]);
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
        $jenis_disposisis = JenisDisposisi::all();
        $staffs = User::whereDivisiId(Auth::user()->divisi_id)->role(['staff', 'unit pengolah'])->get();
        return view('surat-masuk.kabag.show', ['title' => 'Surat Masuk', 'suratMasuk' => $suratMasuk, 'staffs' => $staffs, 'jenis_disposisis' => $jenis_disposisis]);
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
            'user_id' => 'required',
            'catatan' => 'nullable',
        ]);

        $status = ['status' => 'Menunggu konfirmasi staff'];

        SuratMasuk::where('id', $suratMasuk->id)->update($status);
        DisposisiKedua::create($validatedData);

        return redirect('/suratMasukKabag/' . $suratMasuk->id)->with('success', 'Instruksi berhasil ditambahkan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SuratMasuk $suratMasuk)
    {
        //
    }
}
