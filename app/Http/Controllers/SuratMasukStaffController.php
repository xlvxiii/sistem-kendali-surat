<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\JenisDisposisi;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Database\Query\Builder as QueryBuilder;

class SuratMasukStaffController extends Controller
{
    public function boot(): void
    {
        parent::boot();

        Route::model('suratMasukStaff', SuratMasuk::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = SuratMasuk::whereHas('DisposisiKedua', function (QueryBuilder $query) {$query->where('user_id', Auth::user()->id);})->get();
        return view('surat-masuk.staff.index', ['title' => 'Surat Masuk', 'data' => $data]);
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
        return view('surat-masuk.staff.show', ['title' => 'Surat Masuk', 'suratMasuk' => $suratMasuk]);
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
            'status' => 'required'
        ]);

        SuratMasuk::where('id', $suratMasuk->id)->update($validatedData);

        return redirect('/suratMasukStaff/' . $suratMasuk->id)->with('success', 'Berhasil memperbarui data!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SuratMasuk $suratMasuk)
    {
        //
    }
}
