<?php

namespace App\Exports;

use App\Models\Trip;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class TripsExport implements FromCollection, ShouldAutoSize, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Trip::where('status', '=' ,'pending')->get();
    }

     //download specific columns
     public function map($truck): array
     {
         return [
             $truck->id,
             $truck->loading_date,
             $truck->truck_no,
             $truck->product,
             $truck->loading_depot,
             $truck->client,
             $truck->status
         ];
     }
     
     public function headings(): array
     {
         return [
             '#',
             'Loading Date',
             'Truck No',
             'Product',
             'Loading Depot',
             'Client',
             'Status'
 
         ];
 
     }
}
