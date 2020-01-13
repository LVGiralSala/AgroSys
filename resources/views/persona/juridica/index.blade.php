@extends ('layouts.app')
@section ('contenido')  

  
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
          <div class="form-group">
            <a href="{{url('persona_juridica/create') }}"><button class="btn btn-success" >Nuevo</button></a>
          </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
          <div class="form-group">
              
            <a href="{{route('pj.excel')}}"><button class="btn btn-success" ><i class="fas fa-download"></i>     Exportar</button></a>
          </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
              {{-- @include('persona.juridica.search') --}}
        </div>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

          <table class="table table-bordered table-condensed table-hover table-sm" cellspacing="0" style="table-layout: fixed; width:100%; word-break: break-word; font-size: 12px">
           <thead>
            <th style="width: 71px">Identificación</th>
            <th style="width: 181px">Razón Social</th>
            <th style="width: 170px">Página Web</th>
            <th style="width: 105px">Actividad Económica</th>
            <th style="width: 39px">Acción</th>
           </thead> 
           
            @foreach ($personas_juridicas as $item) 
                   <tr>
                     <td>{{ $item->id }} - {{ $item->dig_ver}}</td>
                     <td>{{ $item->razon_social }}</td>
                     <td>{{ $item->pagina_web }}</td> 
                     <td>{{ $item->id_codigo_CIIU }}</td>
                     <td> 
                      <a href="{{URL::action('PersonaJuridicaController@edit',$item->id)}}"><button class="btn-success" style="background-color: #447161; border:0">Editar</button></a>
                     </td>
                   </tr>
            @endforeach 
          </table>
            
        </div>
        {{-- {{$personas_naturales->render()}} --}}
        
    {{-- </div>
  </div> --}}
            
  
@endsection