<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // reset cache roles dan permission
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        //buat permission
        Permission::create(['name' => 'create surat masuk']);
        Permission::create(['name' => 'read surat masuk']);
        Permission::create(['name' => 'update surat masuk']);
        Permission::create(['name' => 'delete surat masuk']);

        Permission::create(['name' => 'create surat keluar']);
        Permission::create(['name' => 'read surat keluar']);
        Permission::create(['name' => 'update surat keluar']);
        Permission::create(['name' => 'delete surat keluar']);

        Permission::create(['name' => 'create disposisi']);
        Permission::create(['name' => 'read disposisi']);
        Permission::create(['name' => 'update disposisi']);
        Permission::create(['name' => 'delete disposisi']);

        Permission::create(['name' => 'create jenis disposisi']);
        Permission::create(['name' => 'read jenis disposisi']);
        Permission::create(['name' => 'update jenis disposisi']);
        Permission::create(['name' => 'delete jenis disposisi']);

        Permission::create(['name' => 'create user']);
        Permission::create(['name' => 'read user']);
        Permission::create(['name' => 'update user']);
        Permission::create(['name' => 'delete user']);

        //buat role
        $admin = Role::create(['name' => 'admin']);
        $unitPengolah = Role::create(['name' => 'unit pengolah']);
        $pimpinan = Role::create(['name' => 'pimpinan']);
        $kabag = Role::create(['name' => 'kepala bagian']);
        $staff = Role::create(['name' => 'staff']);

        //memberikan permission ke role
        $admin->givePermissionTo([
            'create user',
            'read user',
            'update user',
            'delete user',

            'create jenis disposisi',
            'read jenis disposisi',
            'update jenis disposisi',
            'delete jenis disposisi'
        ]);

        $unitPengolah->givePermissionTo([
            'create surat masuk',
            'read surat masuk',
            'update surat masuk',
            'delete surat masuk',

            'create surat keluar',
            'read surat keluar',
            'update surat keluar',
            'delete surat keluar'
        ]);

        $pimpinan->givePermissionTo([
            'read surat masuk',
            'create disposisi',
            'read disposisi',
            'update disposisi',
            'read jenis disposisi',

            'read user'
        ]);

        $kabag->givePermissionTo([
            'read surat masuk',
            'read disposisi',
            'update disposisi',
            'read jenis disposisi',

            'read user'
        ]);

        $staff->givePermissionTo([
            'read surat masuk',
            'read disposisi',
            'read jenis disposisi',

            'read user'
        ]);
    }
}
