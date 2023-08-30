<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //halaman data user
        $users = User::all();
        return view('users.index', ['title' => 'Data User', 'users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('users.create', ['title' => 'Tambah User', 'roles' => Role::all()->sortBy('name')]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'name' => 'required',
            'role' => 'required',
            'email' => 'required',
            'password' => [
                'required', Password::min(8)
                ->letters()
                ->numbers()
                ->mixedCase()
            ]
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        $role = Role::where('id', $validatedData['role'])->first();

        unset($validatedData['role']);
        $newUser = User::create($validatedData);

        $newUser->assignRole($role->name);

        return redirect('/users')->with('success', 'User baru telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
        User::destroy($user->id);
        return redirect('/users')->with('success', 'Data berhasil dihapus!');
    }
}
