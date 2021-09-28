<?php

namespace App\Exports;

use App\Models\Pengajuan;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PengajuanExport implements FromCollection, ShouldAutoSize, WithHeadings
{
    use Exportable;

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Pengajuan::all();
    }
    public function headings(): array
    {
        return [
            '#',
            'Id Pelanggan',
            'Nama Pelanggan',
            'Nomer Whatsapp',
            'Nomer Telepon',
            'Latitude',
            'Longitude',
            'Jam Kunjung',
            'kode antrian',
            'Jenis Layanan',
            'Penyebab',
            'Solusi aktual',
            'Gaul',
            'Permasalahan',
            'Status',
            'D/MM/YYYY',
        ];
    }
}
