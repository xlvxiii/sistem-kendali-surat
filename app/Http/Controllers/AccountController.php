<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rule;

class AccountController extends Controller
{
    public function boot(): void
    {
        parent::boot();

        Route::model('account', User::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        return view('account.edit', ['title' => 'Edit Akun', 'user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
        // branch if melakukan cek apakah form yang disubmit adalah form untuk mengupdate data user atau mengubah password user
        if ($request->formName == "update-form") {
            $rules = [
                'name' => 'required',
            ];

            // code block ini dieksekusi jika user mengubah email
            if ($request->email != $user->email) {
                $rules['email'] = 'required|unique:users,email';
            }

            $validatedData = $request->validate($rules);
            User::where('id', $user->id)->update($validatedData);

            return redirect('/account/' . $user->id . '/edit')->with('success', 'User data has been updated!');
        } elseif ($request->formName == "change-password-form") {
            $validatedData = $request->validate([
                'password' => [
                    'required', 'confirmed', Password::min(8)
                        ->letters()
                        ->numbers()
                        ->mixedCase()
                ],
                'password_confirmation' => Rule::requiredIf($request->password != null)
            ]);

            $newPassword = Hash::make($validatedData['password']);
            $userToUpdate = User::find($user->id);
            $userToUpdate->password = $newPassword;
            if ($userToUpdate->save()) {
                return redirect('/account/' . $user->id . '/edit')->with('success', 'User password has been updated!');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
