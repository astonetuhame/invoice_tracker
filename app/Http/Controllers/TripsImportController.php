<?php

namespace App\Http\Controllers;

use App\Imports\TripImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class TripsImportController extends Controller
{
    public function showUploadForm()
    {
        return view('import');
    }

    public function upload(Request $request){
       $file = $request->file('file');

       Excel::import(new TripImport, $file);

       return back()->withStatus('Excel File uploaded successfully');
    }
}
