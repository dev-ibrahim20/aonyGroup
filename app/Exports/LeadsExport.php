<?php

namespace App\Exports;

use App\Models\Lead;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class LeadsExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Lead::with('project')->get();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Phone',
            'Email',
            'Source',
            'Message',
            'Project',
            'Assigned To',
            'Status',
            'Priority',
            'Notes',
            'Created At',
            'Updated At'
        ];
    }

    /**
     * @param Lead $lead
     * @return array
     */
    public function map($lead): array
    {
        return [
            $lead->id,
            $lead->name,
            $lead->phone,
            $lead->email ?: 'N/A',
            ucfirst($lead->source),
            $lead->message,
            $lead->project ? $lead->project->title_en : 'N/A',
            $lead->assigned_to ?: 'N/A',
            ucfirst($lead->status),
            ucfirst($lead->priority),
            $lead->notes ?: 'N/A',
            $lead->created_at->format('Y-m-d H:i:s'),
            $lead->updated_at->format('Y-m-d H:i:s'),
        ];
    }

    /**
     * @param Worksheet $sheet
     * @return array
     */
    public function styles(Worksheet $sheet): array
    {
        return [
            // Style the first row as bold
            1 => [
                'font' => [
                    'bold' => true,
                    'color' => ['rgb' => 'FFFFFF'],
                ],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => ['rgb' => '2E86AB'],
                ],
            ],
        ];
    }
}
