@extends ('layouts.app')
@section ('contenido')  

{{-- <div class="container">
<div class="row"> --}}
  {{-- <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
    <h3 class="aligncenter">Listado de Personas Naturales<a href="natural/create"><button class="btn btn-success" style="background-color: #5FA665">Nuevo</button></a></h3>

        @include('orden.financiera.search')

  </div> --}}
  {{-- @include('persona.natural.search') --}}
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
          <div class="form-group">
            <a href="{{route('pdto_create') }}"><button class="btn btn-success" >Nuevo</button></a>
          </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
          <div class="form-group">
              
            <a href="{{route('pn.excel')}}"><button class="btn btn-success" ><i class="fas fa-download"></i>     Exportar</button></a>
          </div>
        </div>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

          <table class="table table-bordered table-condensed table-hover table-sm" cellspacing="0" style="table-layout: fixed; width:100%; word-break: break-word; font-size: 12px">
           <thead>
            <th style="width: 22px">ID</th>
            <th style="width: 60px">Nombre Producto</th>
            <th style="width: 39px">Acción</th>
           </thead> 
            @foreach ($productos as $item) 
                   <tr>
                     <td>{{ $item->id }}</td>
                     <td>{{ $item->nombre_producto }}</td>
                     <td> 
                      <a href="{{URL::action('ProductoController@edit',$item->id)}}"><button class="btn-success" style="background-color: #5FA665">Editar</button></a>
                     </td>
                   </tr>
            @endforeach 
          </table>
            
        </div>
        {{-- {{$personas_naturales->render()}} --}}
        
    {{-- </div>
  </div> --}}
            
  
@endsection