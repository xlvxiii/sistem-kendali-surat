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
        if($user->hasRole('admin'))
        {
            return redirect()->route('admin.dashboard');
        }
        else if ($user->hasRole('unit pengolah'))
        {
            return redirect()->route('pengolah.dashboard');
        }
        else if ($user->hasRole('pimpinan'))
        {
            return redirect()->route('pimpinan.dashboard');
        }
        else if ($user->hasRole('kepala bagian'))
        {
            return redirect()->route('kabag.dashboard');
        }
        else if ($user->hasRole('staff'))
        {
            return redirect()->route('staff.dashboard');
        }
        return view('home');
    }

    public function indexAdmin()
    {
        return view('admin.dashboard');
    }

    public function indexPengolah()
    {
        return view('pengolah.dashboard');
    }

    public function indexPimpinan()
    {
        return view('pimpinan.dashboard');
    }

    public function indexKabag()
    {
        return view('kabag.dashboard');
    }

    public function indexStaff()
    {
        return view('staff.dashboard');
    }
}
