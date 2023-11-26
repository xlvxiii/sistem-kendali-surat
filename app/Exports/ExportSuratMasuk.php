<?php

namespace App\Exports;

use App\Models\SuratMasuk;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class ExportSuratMasuk implements FromCollection, WithMapping, WithHeadings, WithEvents, WithColumnFormatting, WithColumnWidths
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        //
        return SuratMasuk::all();
    }

    public function headings(): array
    {
        return [
            'TANGGAL MASUK',
            'ASAL SURAT',
            'NOMOR SURAT',
            'TANGGAL SURAT',
            'PERIHAL',
            'DITUJUKAN',
        ];
    }

    public function map($suratMasuk): array
    {
        if (isset($suratMasuk->DisposisiKedua)) {
            return [
                Date::dateTimeToExcel(Carbon::parse($suratMasuk->tanggal_diterima)),
                $suratMasuk->asal_surat,
                $suratMasuk->nomor_surat,
                Date::dateTimeToExcel(Carbon::parse($suratMasuk->tanggal_surat)),
                $suratMasuk->perihal,
                $suratMasuk->DisposisiKedua->User->name,
            ];
        } else {
            return [
                Date::dateTimeToExcel(Carbon::parse($suratMasuk->tanggal_diterima)),
                $suratMasuk->asal_surat,
                $suratMasuk->nomor_surat,
                Date::dateTimeToExcel(Carbon::parse($suratMasuk->tanggal_surat)),
                $suratMasuk->perihal,
            ];
        }
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getStyle('A1:G1')->applyFromArray([
                    'font' => ['bold' => true],
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                            'color' => ['argb' => '00000000'],
                        ],
                    ],
                ]);
            }
        ];
    }

    public function columnFormats(): array
    {
        return [
            'A' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'D' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 15,
            'B' => 50,
            'C' => 30,
            'D' => 15,
            'E' => 100,
            'F' => 20,
        ];
    }
}
