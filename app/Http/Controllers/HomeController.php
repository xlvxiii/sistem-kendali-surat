<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('admin.dashboard', ['title' => 'Dashboard']);
    }

    public function indexPengolah()
    {
        return view('pengolah.dashboard', ['title' => 'Dashboard']);
    }

    public function indexPimpinan()
    {
        return view('pimpinan.dashboard', ['title' => 'Dashboard']);
    }

    public function indexKabag()
    {
        return view('kabag.dashboard', ['title' => 'Dashboard']);
    }

    public function indexStaff()
    {
        return view('staff.dashboard', ['title' => 'Dashboard']);
    }
}
