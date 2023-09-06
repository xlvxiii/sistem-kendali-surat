<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JenisDisposisi;

class JenisDisposisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        JenisDisposisi::create(['jenis_disposisi' => 'setuju']);
        JenisDisposisi::create(['jenis_disposisi' => 'tolak']);
        JenisDisposisi::create(['jenis_disposisi' => 'teliti & pendapat']);
        JenisDisposisi::create(['jenis_disposisi' => 'bicarakan']);
        JenisDisposisi::create(['jenis_disposisi' => 'selesaikan']);
        JenisDisposisi::create(['jenis_disposisi' => 'laksanakan']);
        JenisDisposisi::create(['jenis_disposisi' => 'untuk perhatian']);
        JenisDisposisi::create(['jenis_disposisi' => 'jawab']);
        JenisDisposisi::create(['jenis_disposisi' => 'sesuai catatan']);
        JenisDisposisi::create(['jenis_disposisi' => 'edarkan']);
        JenisDisposisi::create(['jenis_disposisi' => 'simpan']);
        JenisDisposisi::create(['jenis_disposisi' => 'monitor']);
        JenisDisposisi::create(['jenis_disposisi' => 'hadiri / wakili']);
    }
}
