<?php

namespace App\Exports;

use App\Models\Daily;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Shared\Date;



class ExportDailyTransaction implements FromQuery, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function query()
    {
        return Daily::with('appointment')->orderBy('created_at', 'asc');
    }

    public function headings(): array
    {
        return [

            'Client',
            'Patient',
            'Product',
            'Service',
            'Amount',
            'Date and Time',
        ];
    }
    public function map($daily): array
    {
        $product_sub = 0;
        $service_sub = 0;
        $total_product = 0;
        $total_service = 0;
        $overall_total = 0;
        foreach ($daily->appointment->products as $product) {

            $product_sub = ($product_sub + $product->product->price) * $product->quantity;
            $total_product += $product_sub;
            $total_service += $daily->appointment->service->price;
        }


        return [
            $daily->appointment->owner->name,
            $daily->appointment->pet->pet_name,
            $product_sub,
            $daily->appointment->service->price,
            $daily->amount,
           $daily->created_at,
        ];
    }

}
