@extends ('layouts.app')
@section ('contenido')  
  <div class="container-fluid">
    <h2 >Persona Jurídica</h2>

		@if (count($errors)>0)
				<div class="alert alert-danger">
					<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
					</ul>
				</div>
		@endif

<!-- form -->
<form method="POST" action="{{route('persona_juridica.store')}}">
@csrf

<!-- gral -->
<div class="container">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
      <li class="nav-item">
        <a class="nav-link active link-tab" data-toggle="tab" href="#tab1">Información General</a>
      </li>
      <li class="nav-item">
        <a class="nav-link link-tab" data-toggle="tab" href="#tab2">Información Financiera</a>
      </li>
      <li class="nav-item">
        <a class="nav-link link-tab" data-toggle="tab" href="#tab3">Declaraciones FATCA/CRS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link link-tab" data-toggle="tab" href="#tab4">Accionistas - Ordenantes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link link-tab" data-toggle="tab" href="#tab5">Portafólio - Documentos</a>
      </li>
    </ul>
    <!-- Nav tabs -->
    <!-- Tab panes -->
    <div class="tab-content">
        <!-- #tab1 -->
        <div id="tab1" class="container tab-pane active"><br>
            {{-- <h4>Información General</h4>
            <br> --}}
            
            <!-- 1 -->
            <div class="row">
                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                    <div class="form-group">
                        <label for="razon_social">Razón o Denomincación Social (completa)</label>
                        <input type="text" class="form-control" name="razon_social" required>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="form-group">
                        <label for="num_identificacion">N.I.T</label>
                        <input type="text" class="form-control" name="num_identificacion" required>
                    </div>
                </div>

                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
                    <div class="form-group">
                        <label for="dig_ver">D.V</label>
                        <input type="text" class="form-control" name="dig_ver" required>
                    </div>
                </div>

                
                
            </div>
            <!-- 1 -->

            <!-- 2 -->
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                    <div class="form-group">
                        <label for="direccion_notificacion">Dirección de Notificación</label>
                        <input type="text" class="form-control" name="direccion_notificacion" required>
                    </div>
                </div>

                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                    <div class="form-group">
                        <label for="id_depto_notificacion">Dpto. Notificación</label>
                        <select name="id_depto_notificacion" class="form-control" required>
                      @foreach($ciudades as $ciu)
                        <option value="{{$ciu->id}}" selected>{{$ciu->nombre_ciudad}}</option>
                      @endforeach
                    </select>
                    </div>
                </div>

                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                    <div class="form-group">
                        <label for="id_ciudad_notificacion">Ciudad  Notificación</label>
                        <select name="id_ciudad_notificacion" class="form-control" required>
                      @foreach($ciudades as $ciu)
                        <option value="{{$ciu->id}}" selected>{{$ciu->nombre_ciudad}}</option>
                      @endforeach
                    </select>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="form-group">
                        <label for="telefono_notificacion">Teléfono Notificación</label>
                        <input type="text" class="form-control" name="telefono_notificacion" required>
                    </div>
                </div>
            </div>
            <!-- 2 -->

            <!-- 3 -->
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                    <div class="form-group">
                        <label for="direccion_oficina_princ">Dirección Oficina Principal</label>
                        <input type="text" class="form-control" name="direccion_oficina_princ" required>
                    </div>
                </div>

                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                    <div class="form-group">
                        <label for="id_depto_ofic_princ">Dpto. Ofic. Principal</label>
                        <select name="id_depto_ofic_princ" class="form-control" required>
                      @foreach($ciudades as $ciu)
                        <option value="{{$ciu->id}}" selected>{{$ciu->nombre_ciudad}}</option>
                      @endforeach
                    </select>
                    </div>
                </div>

                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                    <div class="form-group">
                        <label for="id_ciudad_ofic_princ">Ciudad  Ofic. Principal</label>
                        <select name="id_ciudad_ofic_princ" class="form-control" required>
                      @foreach($ciudades as $ciu)
                        <option value="{{$ciu->id}}" selected>{{$ciu->nombre_ciudad}}</option>
                      @endforeach
                    </select>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="form-group">
                        <label for="telefono_oficina_princ">Teléfono Ofic. Principal</label>
                        <input type="text" class="form-control" name="telefono_oficina_princ" required>
                    </div>
                </div>
            </div>
            <!-- 3 -->

            <!-- 4 -->
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                    <div class="form-group">
                        <label for="pagina_web">Página Web</label>
                        <input type="text" class="form-control" name="pagina_web" required>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="form-group">
                            <label for="fax_oficina">Fax</label>
                            <input type="text" class="form-control" name="fax_oficina" required>
                        </div>
                    </div>

                <div class="col-lg-4 col-md- col-sm-4 col-xs-12">
                    <div class="form-group">
                        <label for="referencia">Referenciado Por:</label>
                        <input type="text" class="form-control" name="referencia" required>
                    </div>
                </div>
            </div>
            <!-- 4 -->

            {{-- <br>
            <hr class="divider">
            <br> --}}

            <!-- 5 -->
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                    <div class="form-group">
                        <label for="id_doc_contitucion">Doc. Constitución</label>
                        <select name="id_doc_contitucion" class="form-control" required>
                      @foreach($documentos_constitucion as $docs)
                        <option value="{{$docs->id}}" selected>{{$docs->documento_constitucion}}</option>
                      @endforeach
                    </select>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="form-group">
                        <label for="doc_constitucion">Otro</label>
                        <input type="text" class="form-control" name="doc_constitucion">
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="form-group">
                        <label for="num_doc_constitucion">N° Documento Constitución</label>
                        <input type="text" class="form-control" name="num_doc_constitucion" required>
                    </div>
                </div>

                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                    <div class="form-group">
                        <label for="fecha_radic_doc">Fecha Radicación</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                             <i class="fa fa-calendar"></i>
                           </div>
                         <input class="form-control datetimepicker" name="fecha_radic_doc"  type="text" required>
                       </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                    <div class="form-group">
                        <label for="id_ciudad_radc_doc">Ciudad  Ofic. Principal</label>
                        <select name="id_ciudad_radc_doc" class="form-control" required>
                      @foreach($ciudades as $ciu)
                        <option value="{{$ciu->id}}" selected>{{$ciu->nombre_ciudad}}</option>
                      @endforeach
                    </select>
                    </div>
                </div>
            </div>
            <!-- 5 -->

            <!-- 6 -->
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                    <div class="form-group">
                        <label for="id_info_trib_1">Información Tributaria</label>
                        <select name="id_info_trib_1" class="form-control" required>
                      @foreach($info_tributarias as $infotri)
                        <option value="{{$infotri->id}}" selected>{{$infotri->informacion_tributaria}}</option>
                      @endforeach
                    </select>
                    </div>
                </div>

                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                    <div class="form-group">
                        <label for="id_origen_recursos">Origen Recursos</label>
                        <select name="id_origen_recursos" class="form-control" required>
                      @foreach($origenes_recursos as $org)
                        <option value="{{$org->id}}" selected>{{$org->origen_recursos}}</option>
                      @endforeach
                    </select>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="form-group">
                        <label for="origen_recursos">Otro</label>
                        <input type="text" class="form-control" name="origen_recursos">
                    </div>
                </div>

                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                    <div class="form-group">
                        <label for="id_tipo_empresa">Tipo Empresa</label>
                        <select name="id_tipo_empresa" class="form-control" required>
                      @foreach($tipos_empresas as $tipe)
                        <option value="{{$tipe->id}}" selected>{{$tipe->tipo_empresa}}</option>
                      @endforeach
                    </select>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="form-group">
                        <label for="tipo_empresa">Otro</label>
                        <input type="text" class="form-control" name="tipo_empresa">
                    </div>
                </div>
            </div>
            <!-- 6 -->

            <!-- 7 -->
            <div class="row">
                <div class="col-lg-1 col-md-3 col-sm-3 col-xs-12">
                    <div class="form-group">
                        <label for="id_codigo_CIIU">CIIU</label>
                        <input type="text" class="form-control" name="id_codigo_CIIU" required onblur="searchCiiu(this.value)">
                    </div>     
                </div>

                <div class="col-lg-11 col-md-11 col-sm-11 col-xs-12">
                    <div class="form-group">
                        <label for="actividad_economica_principal">Actividad Económica Principal</label>
                        <input type="text" class="form-control" id="actividad_economica_principal" name="actividad_economica_principal" readonly>
                    </div>     
                </div>

                
            </div>
            <!-- 7 -->

            <!-- 8 -->
            <div class="row">
      
                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                    <div class="form-group">
                      <label for="id_instrumento_financiero">Instrum. Financiero</label>
                        <select name="id_instrumento_financiero" class="form-control" required>
                          @foreach($instrumentos_financieros as $in_fin)
                            <option value="{{$in_fin->id}}" selected>{{$in_fin->instrumento_financiero}}</option>
                          @endforeach
                        </select>
                    </div>
                  </div>
      
                  <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                      <div class="form-group ">
                        <label for="fecha_vinculacion">Fecha Vinculación</label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                          <input class="form-control datetimepicker" name="fecha_vinculacion"  type="text" required>
                        </div>
                      </div>     
                    </div>
          
                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                        <div class="form-group">
                          <label for="id_ciudad_vinculacion">Ciudad Vinculación</label>
                          <select name="id_ciudad_vinculacion" class="form-control" required>
                            @foreach($ciudades as $ciu)
                              <option value="{{$ciu->id}}" selected>{{$ciu->nombre_ciudad}}</option>
                            @endforeach
                          </select>
                      </div>
                    </div>
                
                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                    <div class="form-group">
                      <label for="id_tipo_vinculacion">Tipo Vinculación</label>
                      <select name="id_tipo_vinculacion" class="form-control" required>
                        @foreach($tipos_vinculaciones as $tip_vinc)
                          <option value="{{$tip_vinc->id}}" selected>{{$tip_vinc->tipo_vinculacion}}</option>
                        @endforeach
                      </select>
                    </div>
                    </div>
                
                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                    <div class="form-group">
                      <label for="id_clase_vinculacion">Clase Vinculación</label>
                      <select name="id_clase_vinculacion" class="form-control" required>
                        @foreach($clases_vinculaciones as $cl_vinc)
                          <option value="{{$cl_vinc->id}}" selected>{{$cl_vinc->clase_vinculacion}}</option>
                        @endforeach
                      </select>
                    </div>
                    </div>
              </div>
              <!-- 8 -->
            </div>


        <!-- aquí -->
        

        <!-- #tab5 -->
        <div id="tab5" class="container tab-pane fade"><br>
            <!-- 1 -->
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                <div class="form-group">
                  <button class="btn btn-success" type="submit">Guardar</button>
                  {{-- <button class="btn btn-danger" type="reset">Cancelar</button>
                  <a href="/ordenfina/comprafin" class="btn btn-info" role="button">Salir</a> --}}
                </div>
            </div>
            <!-- 1 -->
        </div>
    </div>

</div>
<!-- gral -->

</form>
<!-- form -->

@endsection