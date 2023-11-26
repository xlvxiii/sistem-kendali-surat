<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Divisi;

class DivisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Divisi::create(['nama' => 'Bisnis']);
        Divisi::create(['nama' => 'Operasional']);
        Divisi::create(['nama' => 'Klaim Subrograsi']);
    }
}
