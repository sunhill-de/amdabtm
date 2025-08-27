<?php

namespace App\Http\Controllers;

use Modules\Untappd\Import_Untapped;

class ImportController extends Controller
{

    public function index()
    {
        $importer = new Import_Untapped();
        $importer->import('/home/klausi/Import Files/Untappd.csv');
        return view('import.index');
    }
}