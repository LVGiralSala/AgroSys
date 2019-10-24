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
            <!-- 1 -->
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="form-group">
                        <label for="razon_social">Razón o Denomincación Social (completa)</label>
                        <input type="text" class="form-control" name="razon_social" required>
                    </div>
                </div>

                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
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
                
            </div>
            <!-- 1 -->
        </div>

        <!-- #tab2 -->
        <div id="tab2" class="container tab-pane fade"><br>
            <!-- 1 -->
        </div>

        <!-- #tab3 -->
        <div id="tab3" class="container tab-pane fade"><br>
            <!-- 1 -->
        </div>

        <!-- #tab4 -->
        <div id="tab4" class="container tab-pane fade"><br>
            <!-- 1 -->
        </div>

        <!-- #tab5 -->
        <div id="tab5" class="container tab-pane fade"><br>
            <!-- 1 -->
        </div>
    </div>

</div>
<!-- gral -->

</form>
<!-- form -->

@endsection