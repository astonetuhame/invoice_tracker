<?php

namespace App\Http\Controllers;

use App\Exports\TripsExport;
use Illuminate\Http\Request;
use App\Exports\InvoiceExport;
use Maatwebsite\Excel\Facades\Excel;

class InvoiceExportController extends Controller
{
    public function received(){

        return Excel::download(new InvoiceExport, 'invoices_received.xlsx'); 
      }

    public function pending(){

        return Excel::download(new TripsExport, 'invoices_pending.xlsx'); 
      }
}
