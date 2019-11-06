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
                        <label for="doc_constitucion">Teléfono Ofic. Principal</label>
                        <input type="text" class="form-control" name="doc_constitucion" required>
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
                        <input type="text" class="form-control" name="doc_constitucion" required>
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
                        <input type="text" class="form-control" name="fecha_radic_doc" required>
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
                        <input type="text" class="form-control" name="origen_recursos" required>
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
                        <input type="text" class="form-control" name="tipo_empresa" required>
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

            <br>
            <hr class="divider">
            <h4>Representante Legal</h4>
            <br>

            <!-- 8 -->
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                    <div class="form-group">
                        <label for="tipo_identificacion">T. Identificación</label>
                        <select name="tipo_identificacion" class="form-control" required>
                        @foreach($tipos_identificaciones as $tip_ident)
                            {{-- @if($tip_ident == "1") --}}
                            <option value="{{$tip_ident->id}}" selected>{{$tip_ident->sigla}}</option>
                            {{-- @else
                            <option value="{{$tip_ident->id}}">{{$tip_ident->sigla}}</option>
                            
                            @else--}}
                        {{-- <option value="{{$tip_ident->id}}">{{$tip_ident->sigla}}</option> 
                            @endif --}}
                        @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                    <div class="form-group">
                        <label for="num_identificacion">N° Identificación</label>
                        <input type="text" class="form-control" name="num_identificacion" required>
                    </div>     
                </div>

                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                    <div class="form-group">
                        <label for="lugar_exp_doc">Lugar Expedición</label>
                        <select name="lugar_exp_doc" class="form-control" required>
                            @foreach($ciudades as $ciu)
                            <option value="{{$ciu->id}}" selected>{{$ciu->nombre_ciudad}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
        
                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                    <div class="form-group">
                        <label for="fecha_exp_doc">Fecha Expedición</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                            </div>
                            <input class="form-control datetimepicker" name="fecha_exp_doc"  type="text" required>
                        </div>
                    </div>     
                </div>

                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                    <div class="form-group">
                        <label for="fecha_nacimiento">Fecha Nacimiento</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                            </div>
                            <input class="form-control datetimepicker" name="fecha_nacimiento"  type="text" required>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                    <div class="form-group">
                        <label for="lugar_nacimiento">Lugar Nacimiento</label>
                        <select name="lugar_nacimiento" class="form-control" required>
                            @foreach($ciudades as $ciu)
                            <option value="{{$ciu->id}}" selected>{{$ciu->nombre_ciudad}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <!-- 8 -->

            <!-- 9 -->
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="form-group">
                        <label for="nombres">Nombres</label>
                        <input type="text" class="form-control" name="nombres" required>
                    </div>     
                </div>
      
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="form-group">
                        <label for="apellidos">Apellidos</label>
                        <input type="text" class="form-control" name="apellidos" required>
                    </div>     
                </div>

                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                    <div class="form-group">
                            <label for="ciudad_residencia">Ciudad Residencia</label>
                            <select name="ciudad_residencia" class="form-control" required>
                                @foreach($ciudades as $ciu)
                                <option value="{{$ciu->id}}" selected>{{$ciu->nombre_ciudad}}</option>
                                @endforeach
                            </select>
                    </div>     
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="form-group">
                        <label for="direccion_residencia">Dirección Residencia</label>
                        <input type="text" class="form-control" name="direccion_residencia" required>
                    </div>     
                </div>
                
            </div>
            <!-- 9 -->

            <!-- 10 -->
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                    <div class="form-group">
                        <label for="telefono">Teléfono Residencia</label>
                        <input type="text" class="form-control" name="telefono" required>
                    </div>
                </div>

                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                    <div class="form-group">
                        <label for="celular">Celular</label>
                        <input type="text" class="form-control" name="celular" required>
                    </div>
                </div>

                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="text" class="form-control" name="email" required>
                    </div>
                </div>

                

            </div>
            <!-- 10 -->

            <!-- 11 -->
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="form-group">
                        <label for="vinculo_func_agrobolsa">Tiene algún vinculo con un funcionario de AGROBOLSA S.A?</label>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="vinculo_func_agrobolsa"  value="1" required>
                                <label class="form-check-label" for="vinculo_func_agrobolsa">Si</label>
                            </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="vinculo_func_agrobolsa"  value="0">
                                <label class="form-check-label" for="vinculo_func_agrobolsa">No</label>
                            </div>
                            </div>
                        </div>
                    </div>     
                </div>

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="form-group">
                        <label for="nombre_vinc_func_agrobolsa">Nombre del Funcionario</label>
                        <input type="text" class="form-control" name="nombre_vinc_func_agrobolsa">
                    </div>     
                </div>

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="form-group">
                        <label for="persona_expuesta_publicamente">Persona Reconocida Públicamente?</label>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="persona_expuesta_publicamente"  value="1" required>
                                <label class="form-check-label" for="persona_expuesta_publicamente">Si</label>
                            </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="persona_expuesta_publicamente"  value="0">
                                <label class="form-check-label" for="persona_expuesta_publicamente">No</label>
                            </div>
                            </div>
                        </div>
                    </div>     
                </div>

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="form-group">
                        <label for="desc_pers_recon_public">Especifique</label>
                        <input type="text" class="form-control" name="desc_pers_recon_public">
                    </div>     
                </div>

            </div>
            <!-- 11 -->

            <!-- 12 -->
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="form-group">
                        <label for="cargo_publico_reciente">Cargo Público?</label>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="cargo_publico_reciente"  value="1" required>
                                <label class="form-check-label" for="cargo_publico_reciente">Si</label>
                            </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="cargo_publico_reciente"  value="0">
                                <label class="form-check-label" for="cargo_publico_reciente">No</label>
                            </div>
                            </div>
                        </div>
                    </div>     
                </div>
        
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="form-group">
                        <label for="institucion_cargo_publico">Institución</label>
                        <input type="text" class="form-control" name="institucion_cargo_publico">
                    </div>     
                </div>

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="form-group">
                        <label for="nombre_cargo_publico">Cargo</label>
                        <input type="text" class="form-control" name="nombre_cargo_publico">
                    </div>     
                </div>

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="form-group">
                        <label for="manejo_recursos_publicos">Maneja Recursos Públicos?</label>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="manejo_recursos_publicos"  value="1" required>
                                <label class="form-check-label" for="manejo_recursos_publicos">Si</label>
                            </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="manejo_recursos_publicos"  value="0">
                                <label class="form-check-label" for="manejo_recursos_publicos">No</label>
                            </div>
                            </div>
                        </div>
                    </div>     
                </div>
            </div>
            <!-- 12 -->
            <br>
            <br>

        </div>

        <!-- #tab2 -->
        <div id="tab2" class="container tab-pane fade"><br>

            <!-- 1 -->
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                    <div class="form-group ">
                        <label for="fecha_corte">Fecha de Corte</label>
                          <div class="input-group">
                             <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                          <input class="form-control datetimepicker" name="fecha_corte"  type="text" required>
                        </div>
                    </div>     
                </div>

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="form-group">
                        <label for="activos">Activos</label>
                        <input type="text" class="form-control" id="activos" name="activos" required>
                               {{-- onchange="calcPatrimonio(this.value);" --}}
                    </div>     
                </div>
        
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="form-group">
                        <label for="pasivos">Pasivos</label>
                        <input type="text" class="form-control" id="pasivos" name="pasivos" required onchange="calcPatrimonio(this.value);">
                    </div>     
                </div>
        
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="form-group">
                        <label for="patrimonio">Patrimonio</label>
                        <input type="text" class="form-control" id="patrimonio" name="patrimonio" readonly>
                    </div>     
                </div>
        
                
            </div>
            <!-- 1 -->

            <!-- 2 -->
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="form-group">
                        <label for="ingr_operac_mensuales">Ingr. Operacionales Menusales</label>
                        <input type="text" class="form-control" name="ingr_operac_mensuales" required>
                    </div>     
                </div>

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="form-group">
                        <label for="ingr_no_operac_mensuales">Ingr. No Operacionales Menusales</label>
                        <input type="text" class="form-control" name="ingr_no_operac_mensuales" required>
                    </div>     
                </div>

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="form-group">
                        <label for="egre_operac_mensuales">Egre. Operacionales Menusales</label>
                        <input type="text" class="form-control" name="egre_operac_mensuales" required>
                    </div>     
                </div>

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="form-group">
                        <label for="egre_no_operac_mensuales">Egre. No Operacionales Menusales</label>
                        <input type="text" class="form-control" name="egre_no_operac_mensuales" required>
                    </div>     
                </div>
            </div>
            <!-- 2 -->

            <!-- 3 -->
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="form-group">
                        <label for="util_perd_operacional">Utilidad/Pérdida Operacional</label>
                        <input type="text" class="form-control" name="util_perd_operacional" required>
                    </div>     
                </div>

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="form-group">
                        <label for="util_perd_neta">Utilidad/Pérdida Neta</label>
                        <input type="text" class="form-control" name="util_perd_neta" required>
                    </div>     
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="descrip_ingr_egre_no_operacionales">Descripción de Ingresos y Egresos No Operacionales</label>
                        <textarea style="height: 38px; min-height:38px" type="text" class="form-control" name="descrip_ingr_egre_no_operacionales" required></textarea>
                    </div>     
                </div>
                
            </div>
            <!-- 3 -->

            <br>
            <hr class="divider">
            <br>

            <!-- 4 -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                    <label for="detalle_actividad_negocio">Fuente de Fondos</label>
                    <textarea style="height:38px; min-height:38px;" type="text" class="form-control" name="detalle_actividad_negocio" required></textarea>
                    </div>
                </div>
                
            </div>
            <!-- 4 -->

            <!-- 5 -->
            <div class="row">
                <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                    <div class="form-group">
                        <label for="entidad_referencia_comercial">Entidad Referencia Comercial</label>
                        <input type="text" class="form-control" name="entidad_referencia_comercial" required>
                    </div>     
                </div>

                <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                  <div class="form-group">
                      <label for="direccion_referencia_comercial">Dirección</label>
                      <input type="text" class="form-control" name="direccion_referencia_comercial" required>
                  </div>     
                </div>
          
                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                    <div class="form-group">
                        <label for="telefono_referencia_comercial">Teléfono </label>
                        <input type="text" class="form-control" name="telefono_referencia_comercial" required>
                    </div>     
                </div>
          
            </div>
            <!-- 5 -->

            <!-- 6 -->
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                  <div class="form-group">
                      <label for="cuentas_moneda_extranjera">Cuentas en moneda extranjera?</label>
                      <div class="row">
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="cuentas_moneda_extranjera"  value="1" required>
                              <label class="form-check-label" for="cuentas_moneda_extranjera">Si</label>
                            </div>
                          </div>
      
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="cuentas_moneda_extranjera"  value="0">
                              <label class="form-check-label" for="cuentas_moneda_extranjera">No</label>
                            </div>
                          </div>
                      </div>
                    </div>     
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                  <div class="form-group">
                      <label for="cuenta_compensacion">Cuenta compensación?</label>
                      <div class="row">
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="cuenta_compensacion"  value="1" required>
                              <label class="form-check-label" for="cuenta_compensacion">Si</label>
                            </div>
                          </div>
      
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="cuenta_compensacion"  value="0">
                              <label class="form-check-label" for="cuenta_compensacion">No</label>
                            </div>
                          </div>
                      </div>
                    </div>     
                </div>
          
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="form-group">
                        <label for="id_entidad_cuenta_bancaria_1">Entidad Bancaria</label>
                        <select name="id_entidad_cuenta_bancaria_1" class="form-control" required>
                            @foreach ($entidades_bancarias as $et_banc)
                            <option value="{{$et_banc->id}}" selected>{{$et_banc->entidad_bancaria}}</option>
                            @endforeach
                        </select>
                    </div>     
                </div>
        
                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                    <div class="form-group">
                        <label for="num_cuenta_bancaria_1">N° Cuenta Bancaria</label>
                        <input type="text" class="form-control" name="num_cuenta_bancaria_1" required>
                    </div>     
                </div>
        
                
            </div>
            <!-- 6 -->

            <!-- 7 -->
            <div class="row">

                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                    <div class="form-group">
                        <label for="id_tipo_cuenta_bancaria_1">Tipo Cuenta Bancaria</label>
                        <select name="id_tipo_cuenta_bancaria_1" class="form-control" required>
                          @foreach ($tipos_cuentas_bancarias as $tp_cb)
                        <option value="{{$tp_cb->id}}" selected>{{$tp_cb->tipo_cuenta_bancaria}}</option>
                          @endforeach
                        </select>
                    </div>     
                </div>

                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                    <div class="form-group">
                        <label for="ciudad_cuenta_bancaria_me_1">Ciudad Cuenta ME</label>
                        <input type="text" class="form-control" name="ciudad_cuenta_bancaria_me_1">
                    </div>     
                </div>

                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                    <div class="form-group">
                        <label for="pais_cuenta_bancaria_me_1">País Cuenta ME</label>
                        <input type="text" class="form-control" name="pais_cuenta_bancaria_me_1">
                    </div>     
                </div>
                
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                    <div class="form-group">
                        <label for="id_tipo_moneda_me_1">Tipo Moneda</label>
                        <select name="id_tipo_moneda_me_1" class="form-control">
                        @foreach ($tipos_monedas as $tip_mon)
                            <option value="{{$tip_mon->id}}" selected>{{$tip_mon->tipo_moneda}}</option>
                        @endforeach 
                        </select>
                    </div>     
                </div>

                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                    <div class="form-group">
                        <label for="id_tipo_transaccion_1">Tipo de Transacción</label>
                        <select name="id_tipo_transaccion_1" class="form-control">
                            @foreach ($tipos_transacciones as $tip_tran)
                        <option value="{{$tip_tran->id}}" selected>{{$tip_tran->tipo_transaccion}}</option>
                            @endforeach
                        </select>
                    </div>     
                </div>

                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                    <div class="form-group">
                        <label for="tipo_transaccion">Cuál</label>
                        <input type="text" class="form-control" name="tipo_transaccion">
                    </div>     
                </div>
            </div>
            <!-- 7 -->
            <br>

        </div>

        <!-- #tab3 -->
        <div id="tab3" class="container tab-pane fade"><br>
            <!-- 1 -->
            <div class="row">
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="form-group">
                    <label for="obligaciones_tributarias_EEUU_US">Obligaciones tributarias EE.UU - US PERSON?</label>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="obligaciones_tributarias_EEUU_US"  value="1" required>
                            <label class="form-check-label" for="obligaciones_tributarias_EEUU_US">Si</label>
                          </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="obligaciones_tributarias_EEUU_US"  value="0">
                            <label class="form-check-label" for="obligaciones_tributarias_EEUU_US">No</label>
                          </div>
                        </div>
                    </div>
                </div>     
              </div>

              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="form-group">
                    <label for="especificacion_obligaciones_tributarias">Especificación</label>
                    <input type="text" class="form-control" name="especificacion_obligaciones_tributarias">
                </div>     
              </div>

              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="form-group">
                    <label for="num_TIN_equivalente">N° TIN</label>
                    <input type="text" class="form-control" name="num_TIN_equivalente">
                </div>     
              </div>

              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="form-group">
                    <label for="obligaciones_fiscales_otros_paises">Obligaciones Fiscales en Otros Paises?</label>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="obligaciones_fiscales_otros_paises"  value="1" required>
                            <label class="form-check-label" for="obligaciones_fiscales_otros_paises">Si</label>
                          </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="obligaciones_fiscales_otros_paises"  value="0">
                            <label class="form-check-label" for="obligaciones_fiscales_otros_paises">No</label>
                          </div>
                        </div>
                    </div>
                </div>     
              </div>

            </div>
            <!-- 1 -->

            <!--2 -->
            <div class="row">
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="form-group">
                    <label for="especificacion_obligaciones_fiscales">Especificación</label>
                    <input type="text" class="form-control" name="especificacion_obligaciones_fiscales">
                </div>     
              </div>

              <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                <div class="form-group">
                    <label for="id_pais_obligaciones_fiscales">País</label>
                    <input type="text" class="form-control" name="id_pais_obligaciones_fiscales">
                </div>     
              </div>

              <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                <div class="form-group">
                    <label for="num_identificacion_fiscal_equivalente">N° Ident. Fiscal</label>
                    <input type="text" class="form-control" name="num_identificacion_fiscal_equivalente">
                </div>     
              </div>

            </div>
            <!--2 -->
        </div>

        <!-- #tab4 -->
        <div id="tab4" class="container tab-pane fade"><br>
            <br>
            <hr class="divider">
            <h4>Accionistas</h4>
            <br>

            <!-- 1 -->
            <div class="row">
                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                    <div class="form-group">
                        <label for="tipo_identificacion_accionista_1">Tipo Identificación</label>
                        <select name="tipo_identificacion_accionista_1" class="form-control" required>
                        @foreach ($tipos_identificaciones as $tip_iden)
                        <option value="{{$tip_iden->id}}" selected>{{$tip_iden->sigla}}</option>
                        @endforeach
                        </select>
                    </div>     
                </div>

                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                    <div class="form-group">
                        <label for="num_identificacion_accionista_1">Número Identificación</label>
                        <input type="text" class="form-control" name="num_identificacion_accionista_1" required>
                    </div>     
                </div>

                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                    <div class="form-group">
                        <label for="nombre_completo_accionista_1">Razón Social/Nombre Completo</label>
                        <input type="text" class="form-control" name="nombre_completo_accionista_1" required>
                    </div>     
                </div>

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="form-group">
                        <label for="admin_recursos_publicos_accionista_1">Maneja Recursos Públicos?</label>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="admin_recursos_publicos_accionista_1"  value="1" required>
                                <label class="form-check-label" for="admin_recursos_publicos_accionista_1">Si</label>
                            </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="admin_recursos_publicos_accionista_1"  value="0">
                                <label class="form-check-label" for="admin_recursos_publicos_accionista_1">No</label>
                            </div>
                            </div>
                        </div>
                    </div>     
                </div>

            </div>
            <!-- 1 -->

            <!-- 2 -->
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="form-group">
                        <label for="ejerce_poder_publico_accionista_1">Ejerce Algún Grado de Poder Público?</label>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ejerce_poder_publico_accionista_1"  value="1" required>
                                <label class="form-check-label" for="ejerce_poder_publico_accionista_1">Si</label>
                            </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ejerce_poder_publico_accionista_1"  value="0">
                                <label class="form-check-label" for="ejerce_poder_publico_accionista_1">No</label>
                            </div>
                            </div>
                        </div>
                    </div>     
                </div>

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="form-group">
                        <label for="reconocimiento_publico_accionista_1">Goza de Reconocimiento Público?</label>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="reconocimiento_publico_accionista_1"  value="1" required>
                                <label class="form-check-label" for="reconocimiento_publico_accionista_1">Si</label>
                            </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="reconocimiento_publico_accionista_1"  value="0">
                                <label class="form-check-label" for="reconocimiento_publico_accionista_1">No</label>
                            </div>
                            </div>
                        </div>
                    </div>     
                </div>

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="form-group">
                        <label for="id_pais_declaracion_tributaria_accionista_1">País Obligación Tributaria</label>
                        <input type="text" class="form-control" name="id_pais_declaracion_tributaria_accionista_1" required>
                    </div>     
                </div>

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="form-group">
                        <label for="porc_participacion_accionista_1">Porcentaje de Participación</label>
                        <input type="text" class="form-control" name="porc_participacion_accionista_1" required>
                    </div>     
                </div>
            </div>
            <!-- 2 -->

            <!-- 3 -->
            {{-- <div class="row">
                
            </div> --}}
            <!-- 3 -->

            <br>
            <hr class="divider">
            <h4>Ordenantes</h4>
            <br>

            <!-- 4 -->
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="form-group">
                        <label for="nombres_ordenante_1">Nombres</label>
                        <input type="text" class="form-control" name="nombres_ordenante_1" required>
                    </div>     
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="form-group">
                        <label for="apellidos_ordenante_1">Apellidos</label>
                        <input type="text" class="form-control" name="apellidos_ordenante_1" required>
                    </div>     
                </div>
                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                    <div class="form-group">
                        <label for="tipo_identificacion_ordenante_1">Tipo Identificación</label>
                        <select name="tipo_identificacion_ordenante_1" class="form-control" required>
                        @foreach ($tipos_identificaciones as $tip_iden)
                        <option value="{{$tip_iden->id}}" selected>{{$tip_iden->sigla}}</option>
                        @endforeach
                        </select>
                    </div>     
                </div>

                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                    <div class="form-group">
                        <label for="num_identificacion_ordenante_1">Número Identificación</label>
                        <input type="text" class="form-control" name="num_identificacion_ordenante_1" required>
                    </div>     
                </div>
                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                    <div class="form-group">
                        <label for="telefono_ordenante_1">Teléfono</label>
                        <input type="text" class="form-control" name="telefono_ordenante_1" required>
                    </div>     
                </div>
            </div>
            <!-- 4 -->

            <!-- 5 -->
            <div class="row">
                <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                    <div class="form-group">
                    <label for="direccion_ordenante_1">Dirección</label>
                        <input type="text" class="form-control" name="direccion_ordenante_1" required>
                    </div>     
                </div>
            
            </div>
            <!-- 5 -->
        </div>

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