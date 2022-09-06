<?php

namespace App\Exports;

use App\Models\Certificates\Certificate;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;


class CertificateExport implements FromQuery,  WithMapping, WithHeadings
{

    public function query()
    {
        return Certificate::where('status', 1)->query();
    }

    public function headings(): array
    {
        return [
            '#',
            'Certificate No',
            'Certificate Name',
            'Test',
            'Item 1',
            'Lot 1',
            'Item 2',
            'Lot 2',
            'URL',
            'Total Views',
            'Total Downloads',
            'Created By',
            'Created At',
        ];
    }

    public function map($certificate): array
    {
        $certificate->load(['user']);
        return [
            $certificate->id,
            $certificate->certificate_no,
            $certificate->certificate_name,
            $certificate->test,
            $certificate->item_1,
            $certificate->lot_1,
            $certificate->item_2,
            $certificate->lot_2,
            route('certificate.view', $certificate->slug),
            strval($certificate->getViews()),
            strval($certificate->getDownloads()),
            $certificate->user->name,
            $certificate->created_at->format('d/m/Y')
        ];
    }
}
