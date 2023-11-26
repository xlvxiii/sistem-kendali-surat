<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SuratMasuk;
use Illuminate\Contracts\Database\Query\Builder as QueryBuilder;

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
        $user = Auth::user();
        if ($user->hasRole('admin')) {
            return redirect()->route('admin.dashboard');
        } elseif ($user->hasRole('unit pengolah')) {
            return redirect()->route('pengolah.dashboard');
        } elseif ($user->hasRole('pimpinan')) {
            return redirect()->route('pimpinan.dashboard');
        } elseif ($user->hasRole('kepala bagian')) {
            return redirect()->route('kabag.dashboard');
        } elseif ($user->hasRole('staff')) {
            return redirect()->route('staff.dashboard');
        }
        return view('home');
    }

    public function indexAdmin()
    {
        $sumSuratMasuk = SuratMasuk::all()->count();
        $sumSuratKeluar = SuratKeluar::all()->count();
        return view('dashboard.admin', ['title' => 'Dashboard', 'sumSuratMasuk' => $sumSuratMasuk, 'sumSuratKeluar' => $sumSuratKeluar]);
    }

    public function indexPengolah()
    {
        $sumSuratMasuk = SuratMasuk::all()->count();
        $sumSuratKeluar = SuratKeluar::all()->count();
        return view('dashboard.pengolah', ['title' => 'Dashboard', 'sumSuratMasuk' => $sumSuratMasuk, 'sumSuratKeluar' => $sumSuratKeluar]);
    }

    public function indexPimpinan()
    {
        $sumSuratMasuk = SuratMasuk::all()->count();
        $sumSuratMasukPending = SuratMasuk::doesntHave('DisposisiPertama')->count();
        return view('dashboard.pimpinan', ['title' => 'Dashboard', 'sumSuratMasuk' => $sumSuratMasuk, 'sumSuratMasukPending' => $sumSuratMasukPending]);
    }

    public function indexKabag()
    {
        $sumSuratMasuk = SuratMasuk::whereHas('DisposisiPertama', function (QueryBuilder $query) {$query->where('divisi_id', Auth::user()->divisi_id);})->count();
        $sumSuratMasukPending = SuratMasuk::
        whereHas('DisposisiPertama', function (QueryBuilder $query)
        {
            $query->where('divisi_id', Auth::user()->divisi_id);
        })->doesntHave('DisposisiKedua')->count();
        return view('dashboard.kabag', ['title' => 'Dashboard', 'sumSuratMasuk' => $sumSuratMasuk, 'sumSuratMasukPending' => $sumSuratMasukPending]);
    }

    public function indexStaff()
    {
        $sumSuratMasuk = SuratMasuk::whereHas('DisposisiKedua', function (QueryBuilder $query) {$query->where('user_id', Auth::user()->id);})->count();
        $sumSuratMasukPending = SuratMasuk::
        whereHas('DisposisiKedua', function (QueryBuilder $query)
        {
            $query->where('user_id', Auth::user()->id);
        })->where('status', 'Menunggu konfirmasi staff')->count();
        return view('dashboard.staff', ['title' => 'Dashboard', 'sumSuratMasuk' => $sumSuratMasuk, 'sumSuratMasukPending' => $sumSuratMasukPending]);
    }
}
