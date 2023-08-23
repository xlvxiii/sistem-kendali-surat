<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //buat user
        $newAdmin = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin',
            'password' => bcrypt('admin')
        ]);

        $newUnitPengolah = User::create([
            'name' => 'Aya',
            'email' => 'aya@gmail.com',
            'password' => bcrypt('password')
        ]);

        $newPimpinan = User::create([
            'name' => 'Juino',
            'email' => 'juino@gmail.com',
            'password' => bcrypt('password')
        ]);

        $newKabag = User::create([
            'name' => 'Yuli',
            'email' => 'yuli@gmail.com',
            'password' => bcrypt('password')
        ]);

        $newStaff = User::create([
            'name' => 'Hafidz',
            'email' => 'hafidz@gmail.com',
            'password' => bcrypt('password')
        ]);

        $newAdmin->assignRole('admin');
        $newUnitPengolah->assignRole('unit pengolah');
        $newPimpinan->assignRole('pimpinan');
        $newKabag->assignRole('kepala bagian');
        $newStaff->assignRole('staff');
    }
}
