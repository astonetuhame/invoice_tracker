<?php

namespace App\Exports;


use App\Models\Invoice;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

// class InvoiceExport implements FromCollection, ShouldAutoSize, WithMapping, WithHeadings
class InvoiceExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public function view(): View
    {
        return view('invoices.table', [
            'invoices' => Invoice::all()
        ]);
    }






    // /**
    // * @return \Illuminate\Support\Collection
    // */
    // public function collection()
    // {
    //     return Invoice::with('trips')->get();
    // }

    // //download specific columns
    // public function map($invoice): array
    // {
    //     return [
            

    //         $invoice->trips->id,
    //         $invoice->trips->loading_date,
    //         $invoice->trips->truck_no,
    //         $invoice->trips->product,
    //         $invoice->trips->loading_depot,
    //         $invoice->trips->client,

    //         $invoice->deliveryNote_no,
    //         $invoice->offloading_date,
    //         $invoice->offloading_point,
    //         $invoice->trips->status,
    //     ];
    // }
    
    // public function headings(): array
    // {
    //     return [
    //         '#',
    //         'Loading Date',
    //         'Truck No',
    //         'Product',
    //         'Loading Depot',
    //         'Client',
    //         'Delivery Note No.',
    //         'Offloading Date',
    //         'Offloading Point',
    //         'Status',
    //     ];

    // }
}
