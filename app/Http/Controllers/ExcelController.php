<?php

namespace AgroSys\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use AgroSys\Exports\pnExport;
use AgroSys\persona_natural;

class ExcelController extends Controller
{
    public function exportExcel(){
        return (new pnExport)->download('naturales.xlsx');
    }
}
