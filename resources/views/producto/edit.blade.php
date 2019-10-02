@extends ('layouts.app')
@section ('contenido')  
  <div class="container-fluid">
        <h2 >Edición Producto</h2>

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
<form method="POST" action="{{ route('pdto_update',$producto) }}">
  {{-- <input type="hidden" name="_TOKEN" value="{{csrf_token()}}"> --}}
  {{-- <input type="hidden" name="_method" value="PUT"> --}}
  @method('PUT')
@csrf

<div class="container">

	<div class="row">
		
		<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
		  <div class="form-group">
			  <label for="id">Id</label>
			  <input type="Integer" class="form-control" name="id" required value="{{$producto->id}}" readonly>
		  </div>     
		</div>

		<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
			<div class="form-group">
				<label for="nombre_producto">Nombre Producto</label>
				<input type="Integer" class="form-control" name="nombre_producto" required value="{{$producto->nombre_producto}}">
			</div>     
		  </div>
	</div>

	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<div class="form-group">
			  {{-- <a href="{{route('persona_natural.update') }}"> --}}
			  <button class="btn btn-success" type="submit">Guardar</button>
			  {{-- <button class="btn btn-danger" type="reset">Cancelar</button>
			  <a href="/ordenfina/comprafin" class="btn btn-info" role="button">Salir</a> --}}
			</div>
		  </div>
	</div>
</div>

</form>
<!-- form -->
    
@endsection