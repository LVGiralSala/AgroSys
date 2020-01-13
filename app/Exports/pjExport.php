<?php

namespace AgroSys\Exports;

use AgroSys\persona_juridica;
use DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeWriting;

class pjExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */

    use Exportable;

    public function collection()
    {
        $persona_juridica=DB::table('persona_juridica as pj')
            ->join('ciudad as cv','pj.id_ciudad_vinculacion','=','cv.id')
            ->join('tipo_vinculacion as tv', 'pj.id_tipo_vinculacion', '=','tv.id')
            ->join('estado_datos as ed','pj.id_estado_datos','=','ed.id')
            ->join('estado_cliente as ecli','pj.id_estado_cliente','=','ecli.id')
            ->join('tipo_identificacion as ti', 'pj.tipo_identificacion', '=','ti.id')
            ->join('instrumento_financiero as if', 'pj.id_instrumento_financiero', '=','if.id')
            ->join('clase_vinculacion as clv', 'pj.id_clase_vinculacion', '=','clv.id')
            ->join('documento_constitucion as dc', 'pj.id_doc_constitucion', '=','dc.id')
            // ->join('ciudad as cr','pj.id_ciudad_residencia','=','cr.id')
            // ->join('ciudad as ct','pj.id_ciudad_trabajo','=','ct.id')
            ->join('tipo_empresa as te', 'pj.id_tipo_empresa', '=','te.id')
            ->join('pj_info_financiera as pjfi','pj.id','=','pjfi.id')
            ->join('info_tributaria as it','pj.id_info_trib_1','=','it.id')
            // ->join('info_tributaria as it','pj.id_info_trib_2','=','it.id')
            // ->join('info_tributaria as it','pj.id_info_trib_3','=','it.id')
            ->join('ciiu as codC','pj.id_codigo_CIIU','=','codC.id')
            ->join('pj_origen_fondos as pjfo','pj.id','=','pjfo.id')
            ->join('entidad_bancaria as eb','pjfo.id_entidad_cuenta_bancaria_1','=','eb.id')
            // ->join('entidad_bancaria as eb','pjfo.id_entidad_cuenta_bancaria_2','=','eb.id')
            ->join('tipo_cuenta_bancaria as tcb','pjfo.id_tipo_cuenta_bancaria_1','=','tcb.id')
            ->join('pj_operaciones_moneda_extranjera as pjme','pj.id','=','pjme.id')
            // ->join('ciudad as ccbme','pnme.ciudad_cuenta_bancaria_me_1','=','ccbme.id')
            ->join('tipo_moneda as tm','pjme.id_tipo_moneda_me_1','=','tm.id')
            ->join('tipo_transaccion as tt','pjme.id_tipo_transaccion_1','=','tt.id')
            ->join('pj_declaracion_facta as pjdf','pj.id','=','pjdf.id')
            ->join('pj_declaracion_crs as pjdc','pj.id','=','pjdc.id')
            ->join('pj_ordenante as pjor','pj.id','=','pjor.id')
            // ->join('tipo_identificacion as tior','pnor.tipo_identificacion_ordenante_1','=','tior.id')
            ->join('pj_accionista as pjacc','pj.id','=','pjacc.id')
            ->select('pj.fecha_diligenciamiento','cv.nombre_ciudad','clv.clase_vinculacion','ed.estado_datos',
                     'pj.fecha_vinculacion','ti.sigla','pj.id','pj.dig_ver','pj.razon_social','dc.documento_constitucion','pj.fecha_radic_doc',
                     'pj.num_doc_constitucion',
                    'pj.lista_clinton','pj.lista_ONU','ecli.estado_cliente')->get();
                    
        return $persona_juridica;

    }

    public function headings(): array
    {
        return[
            'FECHA DILIGENCIAMIENTO','CIUDAD VINCULACIÓN','CLASE VINCULACION','ESTADO DATOS','FECHA VINCULACIÓN',
            'T.I','NIT','DV','RAZÓN SOCIAL','DOC. CONSTITUCIÓN','FECHA RADICACIÓN','NUM. DOCUMENTO CONST',
            // 'DIRECCIÓN RESIDENCIA','TELEFONO','CELULAR','EMAIL',
            'LISTA CLINTON','LISTA ONU','ESTADO CLIENTE','',
        ];
    }

    public function registerEvents():array{
        return[
            AfterSheet::class => function(AfterSheet $event){
                $cellRange = 'A1:W1';
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(12);
                $event->sheet->getDelegate()->getStyle($cellRange)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                ->getStartColor()->setARGB('74BB96');
            },
            BeforeWriting::class=>function(BeforeWriting $event){
                $event->writer->setActiveSheetIndex(0);
            }
        ];
    }
}