@extends ('layouts.app')
@section ('contenido')  
  <div class="container-fluid">
    <h2 >Edición Persona Natural</h2>

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
{{-- <form method="POST" action="{{ route('persona_natural.update',$persona_natural->num_identificacion) }}"> --}}
<form method="POST" action="{{url('persona_natural',$persona_natural->id) }}">
  {{-- <input type="hidden" name="_TOKEN" value="{{csrf_token()}}"> --}}
  {{-- <input type="hidden" name="_method" value="PUT"> --}}
  @method('PUT')
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

        <!-- 0 -->
        <div class="row">
          <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
            <div class="form-group">
                <label for="id_estado_cliente">Estado</label>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="id_estado_cliente"  value="1" required
                        <?php if($persona_natural->id_estado_cliente == 1) echo 'checked'?>>
                        <label class="form-check-label" for="id_estado_cliente">Activo</label>
                      </div>
                    </div>
  
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="id_estado_cliente"  value="2"
                        <?php if($persona_natural->id_estado_cliente == 2) echo 'checked'?>>
                        <label class="form-check-label" for="id_estado_cliente">Inactivo</label>
                      </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
        <!-- 0 -->

        <!-- 1 -->
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                <div class="form-group">
                  <label for="tipo_identificacion">T.I</label>
                  <select name="tipo_identificacion" class="form-control" readonly>
                    @foreach($tipos_identificaciones as $tip_ident)
                        {{-- @if($tip_ident == "1") --}}
                        <option <?php if($tip_ident->id==$persona_natural->tipo_identificacion) echo 'selected'?> value="{{$tip_ident->id}}">{{$tip_ident->sigla}}</option>
                        {{-- @else
                        <option value="{{$tip_ident->id}}">{{$tip_ident->sigla}}</option>
                        
                        @else--}}
                    {{-- <option value="{{$tip_ident->id}}">{{$tip_ident->sigla}}</option> 
                        @endif --}}
                    @endforeach
                  </select>
              </div>
            </div>
            
            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
              <div class="form-group">
                  <label for="num_identificacion">Número Identificación</label>
                  <input type="Integer" class="form-control" name="num_identificacion" required value="{{$persona_natural->id}}" readonly>
              </div>     
            </div>
            
            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                  <div class="form-group">
                      <label for="lugar_exp_doc">Lugar Expedición</label>
                      <select name="lugar_exp_doc" class="form-control" required readonly>
                        @foreach($ciudades as $ciu)
                          <option <?php if($ciu->id==$persona_natural->lugar_exp_doc) echo 'selected'?> value="{{$ciu->id}}">{{$ciu->nombre_ciudad}}</option>
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
                          <input class="form-control datetimepicker" name="fecha_exp_doc"  type="text" required value="{{$persona_natural->fecha_exp_doc}}" readonly>
                      </div>
                </div>     
            </div>
    
            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                <div class="form-group">
                  <label for="id_genero">Género</label>
                    <select name="id_genero" class="form-control" required readonly>
                      @foreach($generos as $gen)
                      <option <?php if($gen->id==$persona_natural->id_genero) echo 'selected'?> value="{{$gen->id}}">{{$gen->genero}}</option>
                      @endforeach
                    </select>
                </div>
            </div>
            
            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                <div class="form-group">
                  <label for="id_estado_civil">Estado Civil</label>
                  <select name="id_estado_civil" class="form-control" required>
                    @foreach($estados_civiles as $item)
                      <option <?php if($item->id==$persona_natural->id_estado_civil) echo 'selected'?> 
                        value="{{$item->id}}">{{$item->estado_civil}}</option>
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
                <input type="text" class="form-control" name="nombres" required value="{{$persona_natural->nombres}}" readonly>
                </div>     
            </div>
        
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="form-group">
                    <label for="apellidos">Apellidos</label>
                    <input type="text" class="form-control" name="apellidos" required value="{{$persona_natural->apellidos}}" readonly> 
                </div>     
            </div>
        
            <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
              <div class="form-group">
                  <label for="direccion_residencia">Dirección</label>
                  <input type="text" class="form-control" name="direccion_residencia" required value="{{$persona_natural->direccion_residencia}}" >
              </div>     
            </div>
        
            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                <div class="form-group">
                    <label for="telefono">Teléfono</label>
                    <input type="text" class="form-control" name="telefono" value="{{$persona_natural->telefono}}" >
                </div>     
            </div>
        </div>
       <!-- 2 -->

       <!-- 3 -->
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                <div class="form-group">
                    <label for="celular">Celular</label>
                <input type="text" class="form-control" name="celular" required value="{{$persona_natural->celular}}">
                </div>     
            </div>
        
            <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="text" class="form-control" name="email" required value="{{$persona_natural->email}}">
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
                      <option <?php if($tp_clie->id==$persona_natural->id_tipo_cliente) echo 'selected'?>
                        value="{{$tp_clie->id}}">{{$tp_clie->tipo_cliente}}</option>
                    @endforeach
                  </select>
              </div>
            </div>
      
            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                <div class="form-group">
                  <label for="id_instrumento_financiero">Instrum. Financiero</label>
                    <select name="id_instrumento_financiero" class="form-control" required>
                      @foreach($instrumentos_financieros as $in_fin)
                        <option <?php if($in_fin->id==$persona_natural->id_instrumento_financiero) echo 'selected'?>
                          value="{{$in_fin->id}}">{{$in_fin->instrumento_financiero}}</option>
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
                    <input class="form-control datetimepicker" name="fecha_vinculacion"  type="text" required 
                    value="{{$persona_natural->fecha_vinculacion}}" readonly>
                  </div>
                </div>     
            </div>
          
            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                <div class="form-group">
                  <label for="id_ciudad_vinculacion">Ciudad Vinculación</label>
                  <select name="id_ciudad_vinculacion" class="form-control" required readonly>
                    @foreach($ciudades as $ciu)
                      <option <?php if($ciu->id==$persona_natural->id_ciudad_vinculacion) echo 'selected'?>
                        value="{{$ciu->id}}">{{$ciu->nombre_ciudad}}</option>
                    @endforeach
                  </select>
                </div>
            </div>
        
            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                <div class="form-group">
                  <label for="tipo_vinculacion">Tipo Vinculación</label>
                  <select name="id_tipo_vinculacion" class="form-control" required>
                    @foreach($tipos_vinculaciones as $tip_vinc)
                      <option <?php if($tip_vinc->id==$persona_natural->id_tipo_vinculacion) echo 'selected'?>
                        value="{{$tip_vinc->id}}">{{$tip_vinc->tipo_vinculacion}}</option>
                    @endforeach
                  </select>
                </div>
                </div>
            
                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                <div class="form-group">
                  <label for="id_clase_vinculacion">Clase Vinculación</label>
                  <select name="id_clase_vinculacion" class="form-control" required>
                    @foreach($clases_vinculaciones as $cl_vinc)
                      <option <?php if($cl_vinc->id == $persona_natural->id_clase_vinculacion) echo 'selected'?>
                        value="{{$cl_vinc->id}}" >{{$cl_vinc->clase_vinculacion}}</option>
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
                <input type="text" class="form-control" name="empresa_trabajo" value="{{$persona_natural->empresa_trabajo}}">
                </div>     
            </div>
            <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                <div class="form-group">
                  <label for="direccion_oficina">Dirección</label>
                  <input type="text" class="form-control" name="direccion_oficina" value="{{$persona_natural->direccion_oficina}}">
                </div>     
              </div>
            
    
            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                <div class="form-group">
                  <label for="id_ciudad_trabajo">Ciudad</label>
                  <select name="id_ciudad_trabajo" class="form-control">
                    @foreach($ciudades as $ciu)
                      <option <?php if($ciu->id == $persona_natural->id_ciudad_trabajo) echo 'selected'?>
                        value="{{$ciu->id}}">{{$ciu->nombre_ciudad}}</option>
                    @endforeach
                  </select>
                </div>
            </div>
      
            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                <div class="form-group">
                    <label for="telefono_oficina">Teléfono</label>
                <input type="text" class="form-control" name="telefono_oficina" value="{{$persona_natural->telefono_oficina}}">
                </div>     
            </div>
      
        </div>
        <!-- 4 -->

        <!-- 5 -->
        <div class="row">
            
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="form-group">
                    <label for="cargo_desempenio">Cargo</label>
                <input type="text" class="form-control" name="cargo_desempenio" value="{{$persona_natural->cargo_desempenio}}">
                </div>     
            </div>

            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                <div class="form-group">
                  <label for="id_tipo_empresa">Tipo Empresa</label>
                  <select name="id_tipo_empresa" class="form-control">
                    @foreach($tipos_empresas as $tp_emp)
                      <option <?php if($tp_emp->id == $persona_natural->id_tipo_empresa) echo 'selected'?>
                        value="{{$tp_emp->id}}">{{$tp_emp->tipo_empresa}}</option>
                    @endforeach
                  </select>
                </div>
            </div>
    
            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                <div class="form-group">
                    <label for="tipo_empresa">Cuál?</label>
                <input type="text" class="form-control" name="tipo_empresa" >
                </div>     
            </div>
    
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="form-group">
                    <label for="id_ocupacion">Ocupación/Oficio/Profesión</label>
                    <select name="id_ocupacion" class="form-control">
                      @foreach($ocupaciones as $ocu)
                        <option <?php if($ocu->id == $persona_natural->id_ocupacion) echo 'selected'?>
                          value="{{$ocu->id}}">{{$ocu->ocupacion}}</option>
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
                          <input class="form-check-input" type="radio" name="vinculo_func_agrobolsa"  value="1" required
                          <?php if($persona_natural->vinculo_func_agrobolsa == 1) echo 'checked'?>>
                          <label class="form-check-label" for="vinculo_func_agrobolsa">Si</label>
                        </div>
                      </div>
    
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="vinculo_func_agrobolsa"  value="0"
                          <?php if($persona_natural->vinculo_func_agrobolsa == 0) echo 'checked'?>>
                          <label class="form-check-label" for="vinculo_func_agrobolsa">No</label>
                        </div>
                      </div>
                  </div>
              </div>     
            </div>
    
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
              <div class="form-group">
                  <label for="nombre_vinc_func_agrobolsa">Nombre del Funcionario</label>
              <input type="text" class="form-control" name="nombre_vinc_func_agrobolsa" value="{{$persona_natural->nombre_vinc_func_agrobolsa}}">
              </div>     
            </div>
    
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
              <div class="form-group">
                  <label for="persona_expuesta_publicamente">Persona Reconocida Públicamente?</label>
                  <div class="row">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="persona_expuesta_publicamente"  value="1" required
                          <?php if($persona_natural->persona_expuesta_publicamente == 1) echo 'checked'?>>
                          <label class="form-check-label" for="persona_expuesta_publicamente">Si</label>
                        </div>
                      </div>
    
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="persona_expuesta_publicamente"  value="0"
                          <?php if($persona_natural->persona_expuesta_publicamente == 0) echo 'checked'?>>
                          <label class="form-check-label" for="persona_expuesta_publicamente">No</label>
                        </div>
                      </div>
                  </div>
              </div>     
            </div>
      
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
              <div class="form-group">
                  <label for="desc_pers_recon_public">Explique</label>
                  <input type="text" class="form-control" name="desc_pers_recon_public" value="{{$persona_natural->desc_pers_recon_public}}">
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
                          <input class="form-check-input" type="radio" name="cargo_publico_reciente"  value="1" required
                          <?php if($persona_natural->cargo_publico_reciente == 1) echo 'checked'?>>
                          <label class="form-check-label" for="cargo_publico_reciente">Si</label>
                        </div>
                      </div>
  
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="cargo_publico_reciente"  value="0"
                          <?php if($persona_natural->cargo_publico_reciente == 0) echo 'checked'?>>
                          <label class="form-check-label" for="cargo_publico_reciente">No</label>
                        </div>
                      </div>
                  </div>
              </div>     
            </div>
              
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
              <div class="form-group">
                  <label for="institucion_cargo_publico">Institución</label>
              <input type="text" class="form-control" name="institucion_cargo_publico" value="{{$persona_natural->institucion_cargo_publico}}">
              </div>     
            </div>
      
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
              <div class="form-group">
                  <label for="nombre_cargo_publico">Cargo</label>
                  <input type="text" class="form-control" name="nombre_cargo_publico" value="{{$persona_natural->nombre_cargo_publico}}">
              </div>     
            </div>
      
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
              <div class="form-group">
                  <label for="manejo_recursos_publicos">Maneja Recursos Públicos?</label>
                  <div class="row">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="manejo_recursos_publicos"  value="1" required
                          <?php if($persona_natural->manejo_recursos_publicos == 1) echo 'checked'?>>
                          <label class="form-check-label" for="manejo_recursos_publicos">Si</label>
                        </div>
                      </div>
    
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="manejo_recursos_publicos"  value="0"
                          <?php if($persona_natural->manejo_recursos_publicos == 0) echo 'checked'?>>
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
          value="{{$info_financiera->activos}}">
          </div>     
        </div>

        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
          <div class="form-group">
              <label for="pasivos">Pasivos</label>
              <input type="text" class="form-control" id="pasivos" name="pasivos" value="{{$info_financiera->pasivos}}" required onchange="calcPatrimonio(this.value);" 
              >
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
              <input type="text" class="form-control" name="ingresos_mensuales" required
              value="{{$info_financiera->ingresos_mensuales}}">
          </div>     
        </div>

        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
            <div class="form-group">
                <label for="egresos_mensuales">Egresos Mensuales</label>
                <input type="text" class="form-control" name="egresos_mensuales" required
                value="{{$info_financiera->egresos_mensuales}}">
            </div>     
          </div>

          <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
              <div class="form-group">
                  <label for="otros_ingresos">Otros Ingresos</label>
                  <input type="text" class="form-control" name="otros_ingresos"
                  value="{{$info_financiera->otros_ingresos}}">
              </div>     
            </div>
      </div>

      <!-- 1 -->

      <!-- 2 -->
      <div class="row">                                       
        
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
          <div class="form-group">
              <label for="detalle_otros_ingresos">Detalles Otros Ingresos</label>
              <input type="text" class="form-control" name="detalle_otros_ingresos"
              value="{{$info_financiera->detalle_otros_ingresos}}">
          </div>     
        </div>

        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
          <div class="form-group">
              <label for="otros_egresos">Otros Egresos</label>
              <input type="text" class="form-control" name="otros_egresos"
              value="{{$info_financiera->otros_egresos}}">
          </div>     
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <div class="form-group">
                <label for="detalle_otros_egresos">Detalle Otros Egresos</label>
                <input type="text" class="form-control" name="detalle_otros_egresos"
                value="{{$info_financiera->detalle_otros_egresos}}">
            </div>     
          </div>

          <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
              <div class="form-group">
                <label for="id_detalle_actividad">Detalle Actividad</label>
                <select name="id_detalle_actividad" class="form-control" required>
                  @foreach($detalles_actividades as $dt_act)
                    <option <?php if($dt_act->id == $info_financiera->id_detalle_actividad) echo 'selected'?> 
                      value="{{$dt_act->id}}">{{$dt_act->detalle_actividad}}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                <div class="form-group">
                  <label for="id_regimen">Tipo Régimen</label>
                  <select name="id_tipo_regimen" class="form-control" required>
                    @foreach($tipos_regimenes as $tp_reg)
                      <option <?php if($tp_reg->id == $info_financiera->id_tipo_regimen) echo 'selected'?>
                        value="{{$tp_reg->id}}">{{$tp_reg->tipo_regimen}}</option>
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
              <input type="text" class="form-control" name="id_codigo_CIIU" value="{{$info_financiera->id_codigo_CIIU}}" required onblur="searchCiiu(this.value)"
              >
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
                          <input class="form-check-input" type="radio" name="declaracion_renta"  value="1" required
                          <?php if($info_financiera->declaracion_renta == 1) echo 'checked'?>>
                          <label class="form-check-label" for="declaracion_renta">Si</label>
                        </div>
                      </div>
  
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="declaracion_renta"  value="0"
                          <?php if($info_financiera->declaracion_renta == 0) echo 'checked'?>>
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
                    <option <?php if($tp_fon->id == $origen_fondos->id_tipo_fuente_fondos) echo 'selected'?>
                    value="{{$tp_fon->id}}" >{{$tp_fon->tipo_fuente_fondos}}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                <div class="form-group">
                    <label for="entidad_referencia_comercial">Entidad Referencia Comercial</label>
                    <input type="text" class="form-control" name="entidad_referencia_comercial" required
                     value="{{$origen_fondos->entidad_referencia_comercial}}">
                </div>     
            </div>
            <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                <div class="form-group">
                    <label for="direccion_referencia_comercial">Dirección</label>
                    <input type="text" class="form-control" name="direccion_referencia_comercial" required
                    value="{{$origen_fondos->direccion_referencia_comercial}}">
                </div>     
              </div>
        
              <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                  <div class="form-group">
                      <label for="telefono_referencia_comercial">Teléfono </label>
                      <input type="text" class="form-control" name="telefono_referencia_comercial" required
                      value="{{$origen_fondos->telefono_referencia_comercial}}">
                  </div>     
              </div>
        
      </div>

      <!-- 4 -->

      <!-- 5 -->
      <div class="row">
        
        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
          <div class="form-group">
              <label for="id_entidad_cuenta_bancaria_1">Entidad Bancaria</label>
              <select name="id_entidad_cuenta_bancaria_1" class="form-control" required>
                @foreach ($entidades_bancarias as $et_banc)
                  <option <?php if( $et_banc->id == $origen_fondos->id_entidad_cuenta_bancaria_1) echo 'selected'?>
                  value="{{$et_banc->id}}">{{$et_banc->entidad_bancaria}}</option>
                @endforeach
              </select>
          </div>     
        </div>

        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
            <div class="form-group">
                <label for="num_cuenta_bancaria_1">N° Cuenta Bancaria</label>
                <input type="text" class="form-control" name="num_cuenta_bancaria_1" required
                value="{{$origen_fondos->num_cuenta_bancaria_1}}">
            </div>     
        </div>

        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
            <div class="form-group">
                <label for="id_tipo_cuenta_bancaria_1">Tipo Cuenta Bancaria</label>
                <select name="id_tipo_cuenta_bancaria_1" class="form-control" required>
                  @foreach ($tipos_cuentas_bancarias as $tp_cb)
                <option <?php if( $tp_cb->id == $origen_fondos->id_tipo_cuenta_bancaria_1) echo 'selected'?>
                  value="{{$tp_cb->id}}">{{$tp_cb->tipo_cuenta_bancaria}}</option>
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
                      <input class="form-check-input" type="radio" name="cuentas_moneda_extranjera"  value="1" required
                      <?php if($oper_me->cuentas_moneda_extranjera == 1) echo 'checked'?>>
                      <label class="form-check-label" for="cuentas_moneda_extranjera">Si</label>
                    </div>
                  </div>

                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="cuentas_moneda_extranjera"  value="0"
                      <?php if($oper_me->cuentas_moneda_extranjera == 0) echo 'checked'?>>
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
                      <input class="form-check-input" type="radio" name="cuenta_compensacion"  value="1" required
                      <?php if($oper_me->cuenta_compensacion == 1) echo 'checked'?>>
                      <label class="form-check-label" for="cuenta_compensacion">Si</label>
                    </div>
                  </div>

                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="cuenta_compensacion"  value="0"
                      <?php if($oper_me->cuenta_compensacion == 0) echo 'checked'?>>
                      <label class="form-check-label" for="cuenta_compensacion">No</label>
                    </div>
                  </div>
              </div>
            </div>     
        </div>
        <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
          <div class="form-group">
              <label for="entidad_cuenta_bancaria_me_1">Entidad Bancaria Moneda Extranjera</label>
              <input type="text" class="form-control" name="entidad_cuenta_bancaria_me_1"
              value="{{$oper_me->entidad_cuenta_bancaria_me_1}}">
            </div>     
        </div>
        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
          <div class="form-group">
              <label for="num_cuenta_bancaria_me_1">N° Cuenta Bancaria</label>
              <input type="text" class="form-control" name="num_cuenta_bancaria_me_1"
              value="{{$oper_me->num_cuenta_bancaria_me_1}}">
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
                  <option <?php if($tip_mon->id == $oper_me->id_tipo_moneda_me_1) echo 'selected'?>
                  value="{{$tip_mon->id}}">{{$tip_mon->tipo_moneda}}</option>
                @endforeach 
              </select>
            </div>     
        </div>

        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
          <div class="form-group">
              <label for="id_tipo_transaccion">Tipo de Transacción</label>
                <select name="id_tipo_transaccion" class="form-control">
                  @foreach ($tipos_transacciones as $tip_tran)
                <option <?php if($tip_tran->id == $oper_me->id_tipo_transaccion) echo 'selected'?>
                  value="{{$tip_tran->id}}">{{$tip_tran->tipo_transaccion}}</option>
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
                      <input class="form-check-input" type="radio" name="obligaciones_tributarias_EEUU_US"  value="1" required 
                      <?php if($decl_facta->obligaciones_tributarias_EEUU_US == 1) echo'checked'?>>
                      <label class="form-check-label" for="obligaciones_tributarias_EEUU_US">Si</label>
                    </div>
                  </div>

                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="obligaciones_tributarias_EEUU_US"  value="0"
                      <?php if($decl_facta->obligaciones_tributarias_EEUU_US == 0) echo'checked'?>>
                      <label class="form-check-label" for="obligaciones_tributarias_EEUU_US">No</label>
                    </div>
                  </div>
              </div>
          </div>     
        </div>

        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
          <div class="form-group">
              <label for="especificacion_obligaciones_tributarias">Especificación</label>
              <input type="text" class="form-control" name="especificacion_obligaciones_tributarias"
              value="{{$decl_facta->especificacion_obligaciones_tributarias}}"/>
          </div>     
        </div>

        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
          <div class="form-group">
              <label for="num_TIN_equivalente">N° TIN</label>
              <input type="text" class="form-control" name="num_TIN_equivalente"
              value="{{$decl_facta->num_TIN_equivalente}}">
          </div>     
        </div>

        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
          <div class="form-group">
              <label for="obligaciones_fiscales_otros_paises">Obligaciones Fiscales en Otros Paises?</label>
              <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="obligaciones_fiscales_otros_paises"  value="1" required
                      <?php if($decl_facta->obligaciones_fiscales_otros_paises == 1) echo 'checked'?>>
                      <label class="form-check-label" for="obligaciones_fiscales_otros_paises">Si</label>
                    </div>
                  </div>

                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="obligaciones_fiscales_otros_paises"  value="0"
                      <?php if($decl_facta->obligaciones_fiscales_otros_paises == 0) echo 'checked'?>>
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
              <input type="text" class="form-control" name="especificacion_obligaciones_fiscales"
              value="{{$decl_crs->especificacion_obligaciones_fiscales}}">
          </div>     
        </div>

        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
          <div class="form-group">
              <label for="id_pais_obligaciones_fiscales">País</label>
              <input type="text" class="form-control" name="id_pais_obligaciones_fiscales"
              value="{{$decl_crs->id_pais_obligaciones_fiscales}}">
          </div>     
        </div>

        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
          <div class="form-group">
              <label for="num_identificacion_fiscal_equivalente">N° Ident. Fiscal</label>
              <input type="text" class="form-control" name="num_identificacion_fiscal_equivalente"
              value="{{$decl_crs->num_identificacion_fiscal_equivalente}}">
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
                <input type="text" class="form-control" name="nombres_ordenante_1" required
                value="{{$ordenantes->nombres_ordenante_1}}">
            </div>     
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
          <div class="form-group">
              <label for="apellidos_ordenante_1">Apellidos</label>
              <input type="text" class="form-control" name="apellidos_ordenante_1" required
              value="{{$ordenantes->apellidos_ordenante_1}}">
          </div>     
        </div>
        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
          <div class="form-group">
              <label for="tipo_identificacion_ordenante_1">Tipo Identificación</label>
              <select name="tipo_identificacion_ordenante_1" class="form-control" required>
                @foreach ($tipos_identificaciones as $tip_iden)
              <option <?php if($tip_iden->id == $ordenantes->tipo_identificacion_ordenante_1) echo 'selected'?>
                value="{{$tip_iden->id}}">{{$tip_iden->sigla}}</option>
                @endforeach
              </select>
          </div>     
        </div>

        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
          <div class="form-group">
              <label for="num_identificacion_ordenante_1">Número Identificación</label>
              <input type="text" class="form-control" name="num_identificacion_ordenante_1" required
              value="{{$ordenantes->num_identificacion_ordenante_1}}">
          </div>     
        </div>
        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
            <div class="form-group">
                <label for="telefono_ordenante_1">Teléfono</label>
                <input type="text" class="form-control" name="telefono_ordenante_1" required
                value="{{$ordenantes->telefono_ordenante_1}}">
            </div>     
        </div>
      </div>
      <!-- 1 -->

      <!-- 2 -->
      <div class="row">
        <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
          <div class="form-group">
            <label for="direccion_ordenante_1">Dirección</label>
              <input type="text" class="form-control" name="direccion_ordenante_1" required
              value="{{$ordenantes->direccion_ordenante_1}}">
          </div>     
        </div>

        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
          <div class="form-group">
              <label for="parentesco_ordenante_1">Parentesco</label>
              <input type="text" class="form-control" name="parentesco_ordenante_1" required
              value="{{$ordenantes->parentesco_ordenante_1}}">
          </div>     
        </div>
        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
          <div class="form-group">
              <label for="id_calidad_ordenante_1">Calidad</label>
              <select name="id_calidad_ordenante_1" class="form-control" required>
                @foreach ($calidad_ordenantes as $cal_orden)
                    <option <?php if($cal_orden->id) echo 'selected'?>
                    value="{{$cal_orden->id}}">{{$cal_orden->calidad_ordenante}}</option>
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
          {{-- <a href="{{route('persona_natural.update') }}"> --}}
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


