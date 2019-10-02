<?php

namespace AgroSys\Exports;

use AgroSys\persona_natural;
use DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeWriting;

class pnExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */

    use Exportable;

    public function collection()
    {
        $persona_natural=DB::table('persona_natural as pn')
            ->join('tipo_persona as tp', 'pn.id_tipo_persona', '=','tp.id')
            ->join('ciudad as cv','pn.id_ciudad_vinculacion','=','cv.id')
            ->join('tipo_vinculacion as tv', 'pn.id_tipo_vinculacion', '=','tv.id')
            ->join('estado_datos as ed','pn.id_estado_datos','=','ed.id')
            ->join('estado_cliente as ecli','pn.id_estado_cliente','=','ecli.id')
            ->join('tipo_identificacion as ti', 'pn.tipo_identificacion', '=','ti.id')
            ->join('genero as g', 'pn.id_genero', '=','g.id')
            ->join('estado_civil as ec', 'pn.id_estado_civil', '=','ec.id')
            ->join('tipo_cliente as tc','pn.id_tipo_cliente','=','tc.id')
            ->join('instrumento_financiero as if', 'pn.id_instrumento_financiero', '=','if.id')
            ->join('clase_vinculacion as clv', 'pn.id_clase_vinculacion', '=','clv.id')
            // ->join('ciudad as cr','pn.id_ciudad_residencia','=','cr.id')
            // ->join('ciudad as ct','pn.id_ciudad_trabajo','=','ct.id')
            ->join('tipo_empresa as te', 'pn.id_tipo_empresa', '=','te.id')
            ->join('pn_info_financiera as pnfi','pn.id','=','pnfi.id')
            ->join('detalle_actividad as da','pnfi.id_detalle_actividad','=','da.id')
            ->join('tipo_regimen as tr','pnfi.id_tipo_regimen','=','tr.id')
            ->join('ciiu as codC','pnfi.id_codigo_CIIU','=','codC.id')
            ->join('pn_origen_fondos as pnfo','pn.id','=','pnfo.id')
            ->join('tipo_fuente_fondos as tff','pnfo.id_tipo_fuente_fondos','=','tff.id')
            ->join('entidad_bancaria as eb','pnfo.id_entidad_cuenta_bancaria_1','=','eb.id')
            ->join('tipo_cuenta_bancaria as tcb','pnfo.id_tipo_cuenta_bancaria_1','=','tcb.id')
            ->join('pn_operaciones_moneda_extranjera as pnme','pn.id','=','pnme.id')
            // ->join('ciudad as ccbme','pnme.ciudad_cuenta_bancaria_me_1','=','ccbme.id')
            ->join('tipo_moneda as tm','pnme.id_tipo_moneda_me_1','=','tm.id')
            ->join('tipo_transaccion as tt','pnme.id_tipo_transaccion','=','tt.id')
            ->join('pn_declaracion_fatca as pndf','pn.id','=','pndf.id')
            ->join('pn_declaracion_crs as pndc','pn.id','=','pndc.id')
            ->join('pn_ordenante as pnor','pn.id','=','pnor.id')
            // ->join('tipo_identificacion as tior','pnor.tipo_identificacion_ordenante_1','=','tior.id')
            ->join('calidad_ordenante as cor','pnor.id_calidad_ordenante_1','=','cor.id')
            ->select('tp.tipo_persona','pn.fecha_diligenciamiento','cv.nombre_ciudad','clv.clase_vinculacion','ed.estado_datos',
                     'pn.fecha_vinculacion','ti.sigla','pn.id','pn.nombres','pn.apellidos','pn.fecha_exp_doc',
                     'pn.lugar_exp_doc','g.genero','ec.estado_civil','tc.tipo_cliente',
                     'pn.direccion_residencia','pn.telefono','pn.celular','pn.email',
                    //  'cr.nombre_ciudad','ct.nombre_ciudad','ccbme.nombre_ciudad','tior.sigla',
                    //  'pn.empresa_trabajo','pn.cargo_desempenio','if.instrumento_financiero',
                     'tp.tipo_persona','pn.lista_clinton','pn.lista_ONU','ecli.estado_cliente','pn.persona_expuesta_publicamente')->get();
                    //  'pn.persona_expuesta_publicamente','tv.tipo_vinculacion',
                    //  'pn.direccion_oficina','pn.telefono_oficina','tc.tipo_cliente','te.tipo_empresa',
                    //  'pn.profesion','pn.vinculo_func_agrobolsa','pn.nombre_vinc_func_agrobolsa',
                    //  'pn.desc_pers_recon_public','pn.cargo_publico_reciente',
                    //  'pn.nombre_cargo_publico','pn.institucion_cargo_publico','pn.manejo_recursos_publicos',
                    //  'pnfi.activos','pnfi.pasivos','pnfi.pasivos','pnfi.patrimonio','pnfi.ingresos_mensuales',
                    //  'pnfi.egresos_mensuales','pnfi.otros_ingresos','pnfi.detalle_otros_ingresos','pnfi.otros_egresos',
                    //  'pnfi.detalle_otros_egresos','da.detalle_actividad','pnfi.explicacion_actividad','tr.tipo_regimen',
                    //  'codC.tipo','pnfi.declaracion_renta','tff.tipo_fuente_fondos','pnfo.entidad_referencia_comercial',
                    //  'pnfo.direccion_referencia_comercial','pnfo.telefono_referencia_comercial','eb.entidad_bancaria',
                    //  'pnfo.num_cuenta_bancaria_1','tcb.tipo_cuenta_bancaria','pnme.cuentas_moneda_extranjera','pnme.cuenta_compensacion',
                    //  'pnme.entidad_cuenta_bancaria_me_1','pnme.num_cuenta_bancaria_me_1','tm.tipo_moneda','tt.tipo_transaccion',
                    //  'pndf.obligaciones_tributarias_EEUU_US','pndf.obligaciones_tributarias_EEUU_US','pndf.especificacion_obligaciones_tributarias',
                    //  'pndc.obligaciones_fiscales_otros_paises','pndc.especificacion_obligaciones_fiscales','pndc.num_identificacion_fiscal_equivalente',
                    //  'pnor.nombres_ordenante_1','pnor.apellidos_ordenante_1','pnor.num_identificacion_ordenante_1',
                    //  'pnor.direccion_ordenante_1','pnor.telefono_ordenante_1','pnor.parentesco_ordenante_1',
                    //  'cor.calidad_ordenante'
                    
        return $persona_natural;
    }

    public function headings(): array
    {
        return[
            'TIPO PERSONA','FECHA DILIGENCIAMIENTO','CIUDAD VINCULACIÓN','CLASE VINCULACION','ESTADO DATOS','FECHA VINCULACIÓN',
            'T.I','N° IDENTIFICACIÓN','NOMBRES','APELLIDOS','FECHA EXPEDICIÓN','LUGAR EXPEDICIÓN','GÉNERO','ESTADO CIVIL','TIPO CLIENTE',
            'DIRECCIÓN RESIDENCIA','TELEFONO','CELULAR','EMAIL',
            'LISTA CLINTON','LISTA ONU','ESTADO CLIENTE','P.E.P','',
            '','','','','',
            '','','','','',
            '','','','','',
            '','','','','',
            '','','','','',
            '','','','','',
            '','','','','',
            '','','','','',
            '','','','','',
            '','','','','',
            '','','','','',
        ];
    }

    // public function sheets(): array
    // {
    //     $sheets = [];
    //     $sheets[] = 'n';
    //     $sheets[] = 'j';
    //     $sheets[] = 'n';
    //     $sheets[] = 'j';
    //     $sheets[] = 'n';
    //     $sheets[] = 'j';

    //     return $sheets;
    // }

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

    // public function sheets(): array
    // {
    //     $sheets = ['Naturales'];
    //     return $sheets;
    // }
}