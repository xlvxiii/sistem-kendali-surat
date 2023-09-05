<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rule;

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

        //$role = Role::where('name', $validatedData['role'])->first();
        $role = $validatedData['role'];

        unset($validatedData['role']);
        $newUser = User::create($validatedData);

        //$newUser->assignRole($role->name);
        $newUser->assignRole($role);

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
        $userRole = $user->getRoleNames()->first();
        $roles = Role::all()->sortBy('name');
        return view('users.edit', ['title' => 'Edit User', 'user' => $user, 'userRole' => $userRole, 'roles' => $roles]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
        $validatedData = $request->validate([
            'name' => 'required',
            'role' => 'required',
            'email' => 'required',
            'password' => [
                'confirmed', 'nullable', Password::min(8)
                    ->letters()
                    ->numbers()
                    ->mixedCase()
            ],
            'password_confirmation' => Rule::requiredIf($request->password != null)
        ]);
        
        if ($request->role != $user->getRoleNames()->first())
        {
            $user->syncRoles($request->role);
        }

        unset($validatedData['role']);
        
        if ($request->filled('password'))
        {
            $validatedData['password'] = Hash::make($validatedData['password']);
        } else {
            unset($validatedData['password']);
            unset($validatedData['password_confirmation']);
        }

        unset($validatedData['password_confirmation']);

        User::where('id', $user->id)->update($validatedData);
        
        return redirect('/users')->with('success', 'User has been updated!');

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
