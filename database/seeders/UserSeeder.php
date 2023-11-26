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
            'name' => 'Gilbert Kertzmann',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin')
        ]);

        $newAdmin->assignRole('admin');

        $newUnitPengolah = User::create([
            'name' => 'Harvey Nienow',
            'email' => 'pengelola@example.com',
            'password' => bcrypt('Password1'),
            'divisi_id' => 1
        ]);

        $newUnitPengolah->assignRole('unit pengolah');

        $newPimpinan = User::create([
            'name' => 'Ellis Hirthe',
            'email' => 'pimpinan@example.com',
            'password' => bcrypt('Password1')
        ]);

        $newPimpinan->assignRole('pimpinan');

        $newKabag = User::create([
            'name' => 'Jackie Aufderhar',
            'email' => 'kabagopr@example.com',
            'password' => bcrypt('Password1'),
            'divisi_id' => 2,
        ]);

        $newKabag->assignRole('kepala bagian');

        $newKabag = User::create([
            'name' => 'Eduardo Hintz',
            'email' => 'kabagks@example.com',
            'password' => bcrypt('Password1'),
            'divisi_id' => 3,
        ]);

        $newKabag->assignRole('kepala bagian');

        $newKabag = User::create([
            'name' => 'Alvin Parisian',
            'email' => 'kabagbs@example.com',
            'password' => bcrypt('Password1'),
            'divisi_id' => 1,
        ]);

        $newKabag->assignRole('kepala bagian');

        $newStaff = User::create([
            'name' => 'Tracy Gorczany',
            'email' => 'staffopr@example.com',
            'password' => bcrypt('Password1'),
            'divisi_id' => 2,
        ]);

        $newStaff->assignRole('staff');

        $newStaff = User::create([
            'name' => 'Sylvester Gleichner',
            'email' => 'staffks@example.com',
            'password' => bcrypt('Password1'),
            'divisi_id' => 3,
        ]);

        $newStaff->assignRole('staff');

        $newStaff = User::create([
            'name' => 'Victor Osinski',
            'email' => 'staffbs@example.com',
            'password' => bcrypt('Password1'),
            'divisi_id' => 1,
        ]);

        $newStaff->assignRole('staff');
    }
}
