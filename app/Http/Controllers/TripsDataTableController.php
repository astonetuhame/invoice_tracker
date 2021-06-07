<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\TripsDataTable;

class TripsDataTableController extends Controller
{
    public function show(TripsDataTable $dataTable){

        //     // dd($dataTable);
             return $dataTable->render('trips');
     
         }
}
