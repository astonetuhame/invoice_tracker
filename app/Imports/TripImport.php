<?php

namespace App\Imports;

use App\Models\Trip;
use Maatwebsite\Excel\Concerns\ToModel;

class TripImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Trip([
            'loading_date' => \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[0])),
            'truck_no' => $row[1],
            'product' => $row[2],
            'loading_depot' => $row[3],
            'client' => $row[4],
        ]);
    }
}
