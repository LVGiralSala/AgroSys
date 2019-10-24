@extends ('layouts.app')
@section ('contenido')  
  <div class="container-fluid">
    <h2 >Persona Natural</h2>

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
<form method="POST" action="{{route('persona_natural.store')}}">
@csrf

<!-- gral -->
  <div class="container">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
      <li class="nav-item">
        <a class="nav-link active link-tab" data-toggle="tab" href="#tab1">Información Titular</a>
      </li>
      <li class="nav-item">
        <a class="nav-link link-tab" data-toggle="tab" href="#tab2">Información Financiera</a>
      </li>
      <li class="nav-item">
        <a class="nav-link link-tab" data-toggle="tab" href="#tab3">Declaraciones FATCA/CRS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link link-tab" data-toggle="tab" href="#tab4">Ordenantes - Apoderados</a>
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
        <!-- 1 -->
        <div class="row">
          <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
              <div class="form-group">
                <label for="tipo_identificacion">T.I</label>
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
              <label for="id_genero">Género</label>
                <select name="id_genero" class="form-control" required>
                  @foreach($generos as $gen)
                    <option value="{{$gen->id}}" selected>{{$gen->genero}}</option>
                  @endforeach
                </select>
            </div>
          </div>
      
          <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
              <div class="form-group">
                <label for="id_estado_civil">Estado Civil</label>
                <select name="id_estado_civil" class="form-control" required>
                  @foreach($estados_civiles as $item)
                    <option value="{{$item->id}}" selected>{{$item->estado_civil}}</option>
                  @endforeach
                </select>
            </div>
          </div>
        </div>
        <!-- 1 -->

        <!-- 2 -->
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
      
          <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
            <div class="form-group">
                <label for="direccion_residencia">Dirección</label>
                <input type="text" class="form-control" name="direccion_residencia" required>
            </div>     
          </div>
    
          <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
              <div class="form-group">
                  <label for="telefono">Teléfono</label>
                  <input type="text" class="form-control" name="telefono">
              </div>     
          </div>
        </div>
        <!-- 2 -->

        <!-- 3 -->
        <div class="row">
          <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
              <div class="form-group">
                  <label for="celular">Celular</label>
                  <input type="text" class="form-control" name="celular" required>
              </div>     
          </div>
      
          <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
              <div class="form-group">
                  <label for="email">E-mail</label>
                  <input type="text" class="form-control" name="email" required>
              </div>     
          </div>
        </div>
        <!-- 3 -->
        <!-- 8 -->
        <div class="row">
          <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
            <div class="form-group">
              <label for="id_tipo_cliente">Tipo cliente</label>
                <select name="id_tipo_cliente" class="form-control" required>
                  @foreach($tipos_clientes as $tp_clie)
                    <option value="{{$tp_clie->id}}" selected>{{$tp_clie->tipo_cliente}}</option>
                  @endforeach
                </select>
            </div>
          </div>

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
                <label for="tipo_vinculacion">Tipo Vinculación</label>
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
        
        <br>
        <hr class="divider">
        <br>

        <!-- 4 -->
        <div class="row">
          <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
            <div class="form-group">
                <label for="empresa_trabajo">Empresa</label>
                <input type="text" class="form-control" name="empresa_trabajo">
            </div>     
          </div>
          <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
              <div class="form-group">
                <label for="direccion_oficina">Dirección</label>
                <input type="text" class="form-control" name="direccion_oficina">
              </div>     
            </div>
          

          <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
            <div class="form-group">
              <label for="id_ciudad_trabajo">Ciudad</label>
              <select name="id_ciudad_trabajo" class="form-control">
                @foreach($ciudades as $ciu)
                  <option value="{{$ciu->id}}" selected>{{$ciu->nombre_ciudad}}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
              <div class="form-group">
                  <label for="telefono_oficina">Teléfono</label>
                  <input type="text" class="form-control" name="telefono_oficina">
              </div>     
            </div>

        </div>
        <!-- 4 -->

        <!-- 5 -->
        <div class="row">
            
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="form-group">
                    <label for="cargo_desempenio">Cargo</label>
                    <input type="text" class="form-control" name="cargo_desempenio">
                </div>     
              </div>

          <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
            <div class="form-group">
              <label for="id_tipo_empresa">Tipo Empresa</label>
              <select name="id_tipo_empresa" class="form-control">
                @foreach($tipos_empresas as $tp_emp)
                  <option value="{{$tp_emp->id}}" selected>{{$tp_emp->tipo_empresa}}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
            <div class="form-group">
                <label for="tipo_empresa">Cuál?</label>
                <input type="text" class="form-control" name="tipo_empresa">
            </div>     
          </div>

          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <div class="form-group">
                <label for="id_ocupacion">Ocupación/Oficio/Profesión</label>
                <select name="id_ocupacion" class="form-control">
                  @foreach($ocupaciones as $ocu)
                    <option value="{{$ocu->id}}" selected>{{$ocu->ocupacion}}</option>
                  @endforeach
                </select>
            </div>     
          </div>

        </div>
        <!-- 5 -->

        <br>
        <hr class="divider">
        <br>

        <!-- 6 -->
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
                <label for="desc_pers_recon_public">Explique</label>
                <input type="text" class="form-control" name="desc_pers_recon_public">
            </div>     
          </div>
          
        </div>
        <!-- 6 -->

        <!-- 7 -->
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
        <!-- 7 -->

        
        <br>
        <br>
        
      </div>
      <!-- #tab1 -->

      <!-- #tab2 -->
      <div id="tab2" class="container tab-pane fade"><br>
        <!-- 1 -->
        <div class="row">
          <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
            <div class="form-group">
                <label for="activos">Activos</label>
                <input type="text" class="form-control" id="activos" name="activos" required
                       >
                       {{-- onchange="calcPatrimonio(this.value);" --}}
            </div>     
          </div>

          <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
            <div class="form-group">
                <label for="pasivos">Pasivos</label>
                <input type="text" class="form-control" id="pasivos" name="pasivos" required onchange="calcPatrimonio(this.value);">
            </div>     
          </div>

          <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
            <div class="form-group">
                <label for="patrimonio">Patrimonio</label>
                <input type="text" class="form-control" id="patrimonio" name="patrimonio" readonly>
            </div>     
          </div>

          <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
            <div class="form-group">
                <label for="ingresos_mensuales">Ingresos Menusales</label>
                <input type="text" class="form-control" name="ingresos_mensuales" required>
            </div>     
          </div>

          <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
              <div class="form-group">
                  <label for="egresos_mensuales">Egresos Mensuales</label>
                  <input type="text" class="form-control" name="egresos_mensuales" required>
              </div>     
            </div>

            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                <div class="form-group">
                    <label for="otros_ingresos">Otros Ingresos</label>
                    <input type="text" class="form-control" name="otros_ingresos">
                </div>     
              </div>
        </div>

        <!-- 1 -->

        <!-- 2 -->
        <div class="row">
          
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <div class="form-group">
                <label for="detalle_otros_ingresos">Detalles Otros Ingresos</label>
                <input type="text" class="form-control" name="detalle_otros_ingresos">
            </div>     
          </div>

          <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
            <div class="form-group">
                <label for="otros_egresos">Otros Egresos</label>
                <input type="text" class="form-control" name="otros_egresos">
            </div>     
          </div>
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
              <div class="form-group">
                  <label for="detalle_otros_egresos">Detalle Otros Egresos</label>
                  <input type="text" class="form-control" name="detalle_otros_egresos">
              </div>     
            </div>

            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                <div class="form-group">
                  <label for="id_detalle_actividad">Detalle Actividad</label>
                  <select name="id_detalle_actividad" class="form-control" required>
                    @foreach($detalles_actividades as $dt_act)
                      <option value="{{$dt_act->id}}" selected>{{$dt_act->detalle_actividad}}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                  <div class="form-group">
                    <label for="id_regimen">Tipo Régimen</label>
                    <select name="id_tipo_regimen" class="form-control" required>
                      @foreach($tipos_regimenes as $tp_reg)
                        <option value="{{$tp_reg->id}}" selected>{{$tp_reg->tipo_regimen}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
        </div>

        <!-- 2 -->

        <!-- 3 -->
        <div class="row">
          
          <div class="col-lg-1 col-md-3 col-sm-3 col-xs-12">
            <div class="form-group">
                <label for="id_codigo_CIIU">CIIU</label>
                <input type="text" class="form-control" name="id_codigo_CIIU" required onblur="searchCiiu(this.value)">
            </div>     
          </div>

          <div class="col-lg-6 col-md-3 col-sm-3 col-xs-12">
            <div class="form-group">
                <label for="actividad_economica_principal">Actividad Económica Principal</label>
                <input type="text" class="form-control" id="actividad_economica_principal" name="actividad_economica_principal" readonly>
            </div>     
          </div>

            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="form-group">
                    <label for="declaracion_renta">Declara Renta?</label>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="declaracion_renta"  value="1" required>
                            <label class="form-check-label" for="declaracion_renta">Si</label>
                          </div>
                        </div>
    
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="declaracion_renta"  value="0">
                            <label class="form-check-label" for="declaracion_renta">No</label>
                          </div>
                        </div>
                    </div>
                </div>     
            </div>

            

            
        </div>

        <!-- 3 -->

        <br>
        <hr class="divider">
        <br>

        <!-- 4 -->
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                <div class="form-group">
                  <label for="id_tipo_fuente_fondos">Fuente de Fondos</label>
                  <select name="id_tipo_fuente_fondos" class="form-control" required>
                    @foreach($tipos_fuentes_fondos as $tp_fon)
                      <option value="{{$tp_fon->id}}" selected>{{$tp_fon->tipo_fuente_fondos}}</option>
                    @endforeach
                  </select>
                </div>
              </div>

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

        <!-- 4 -->

        <!-- 5 -->
        <div class="row">
          
          <div class="col-lg-5 col-md-3 col-sm-3 col-xs-12">
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
        </div>

        <!-- 5 -->

        <br>
        <hr class="divider">
        <br>

        <!-- 6 -->
        <div class="row">
          

        </div>
        <!-- 6 -->

        <!-- 7 -->
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
          <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
            <div class="form-group">
                <label for="entidad_cuenta_bancaria_me_1">Entidad Bancaria Moneda Extranjera</label>
                <input type="text" class="form-control" name="entidad_cuenta_bancaria_me_1">
              </div>     
          </div>
          <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
            <div class="form-group">
                <label for="num_cuenta_bancaria_me_1">N° Cuenta Bancaria</label>
                <input type="text" class="form-control" name="num_cuenta_bancaria_me_1">
              </div>     
          </div>
        </div>
        <!-- 7 -->
        
        <!-- 8 -->
        <div class="row">
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

          <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
            <div class="form-group">
                <label for="id_tipo_moneda_me_1">Tipo Moneda</label>
                <select name="id_tipo_moneda_me_1" class="form-control">
                  @foreach ($tipos_monedas as $tip_mon)
                    <option value="{{$tip_mon->id}}" selected>{{$tip_mon->tipo_moneda}}</option>
                  @endforeach 
                </select>
              </div>     
          </div>

          <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
            <div class="form-group">
                <label for="id_tipo_transaccion">Tipo de Transacción</label>
                  <select name="id_tipo_transaccion" class="form-control">
                    @foreach ($tipos_transacciones as $tip_tran)
                  <option value="{{$tip_tran->id}}" selected>{{$tip_tran->tipo_transaccion}}</option>
                    @endforeach
                  </select>
              </div>     
          </div>
        </div>
        <!-- 8 -->

        <br>
        <br>
        <!-- 9 -->

        <!-- 9 -->

      </div> 
      <!-- #tab2 -->

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
      <!-- #tab3 -->
    
      <!-- #tab4 -->
      <div id="tab4" class="container tab-pane fade"><br>
        <!-- 1 -->
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
        <!-- 1 -->

        <!-- 2 -->
        <div class="row">
          <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
            <div class="form-group">
              <label for="direccion_ordenante_1">Dirección</label>
                <input type="text" class="form-control" name="direccion_ordenante_1" required>
            </div>     
          </div>

          <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
            <div class="form-group">
                <label for="parentesco_ordenante_1">Parentesco</label>
                <input type="text" class="form-control" name="parentesco_ordenante_1" required>
            </div>     
          </div>
          <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
            <div class="form-group">
                <label for="id_calidad_ordenante_1">Calidad</label>
                <select name="id_calidad_ordenante_1" class="form-control" required>
                  @foreach ($calidad_ordenantes as $cal_orden)
                      <option value="{{$cal_orden->id}}" selected>{{$cal_orden->calidad_ordenante}}</option>
                  @endforeach
                </select>
            </div>     
          </div>
          
        </div>
        <!-- 2 -->

        <!-- 3 -->
        {{-- <div class="row">
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
              <div class="form-group">
                  <label for="fecha_exp_doc">Fecha Expedición</label>
                  <input type="text" class="form-control" name="fecha_exp_doc">
              </div>     
          </div>
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <div class="form-group">
                <label for="fecha_exp_doc">Fecha Expedición</label>
                <input type="text" class="form-control" name="fecha_exp_doc">
            </div>     
          </div>
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <div class="form-group">
                <label for="fecha_exp_doc">Fecha Expedición</label>
                <input type="text" class="form-control" name="fecha_exp_doc">
            </div>     
          </div>
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <div class="form-group">
                <label for="fecha_exp_doc">Fecha Expedición</label>
                <input type="text" class="form-control" name="fecha_exp_doc">
            </div>     
          </div>
        </div> --}}
        <!-- 3 -->

      </div>
      <!-- #tab4 -->

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

        <!-- 2 -->
        <!-- 2 -->

      </div>
      <!-- #tab15 -->

    </div>
  </div>
<!-- gral -->

</form>
<!-- form -->

@endsection


