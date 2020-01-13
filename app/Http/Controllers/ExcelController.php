<?php

namespace AgroSys\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use AgroSys\Exports\pnExport;
use AgroSys\Exports\pjExport;
use AgroSys\persona_natural;
use AgroSys\persona_juridica;

class ExcelController extends Controller
{
    public function exportExcelPn(){
        return (new pnExport)->download('naturales.xlsx');
    }

    public function exportExcelPj(){
        return (new pjExport)->download('juridicos.xlsx');
    }
}
