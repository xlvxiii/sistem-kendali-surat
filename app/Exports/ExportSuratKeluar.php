<?php

namespace App\Exports;

use App\Models\SuratKeluar;
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

class ExportSuratKeluar implements FromCollection, WithHeadings, WithMapping, WithEvents, WithColumnWidths, WithColumnFormatting
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //
        return SuratKeluar::all();
    }

    public function headings(): array
    {
        return [
            'TANGGAL KIRIM',
            'ASAL SURAT',
            'DITUJUKAN',
            'NOMOR SURAT',
            'TANGGAL SURAT',
            'PERIHAL',
        ];
    }

    public function map($suratKeluar): array
    {
        return [
            Date::dateTimeToExcel(Carbon::parse($suratKeluar->tanggal_diterima)),
            $suratKeluar->asal_surat,
            $suratKeluar->tujuan,
            $suratKeluar->nomor_surat,
            Date::dateTimeToExcel(Carbon::parse($suratKeluar->tanggal_surat)),
            $suratKeluar->perihal,
        ];
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

    public function columnWidths(): array
    {
        return [
            'A' => 15,
            'B' => 30,
            'C' => 50,
            'D' => 30,
            'E' => 15,
            'F' => 100,
        ];
    }
    
    public function columnFormats(): array
    {
        return [
            'A' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'E' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }
}
