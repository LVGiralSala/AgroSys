
<form method="GET" action="{{url('persona_natural')}}">
    @csrf

<div class="form-group"> 
	<div class="input-group">
		<input type="text" class="form-control" name="searchText" placeholder="Buscar..." value="<?php $searchText ?>">
<span class="input-group-btn">
	
	<button type="submit" class="btn btn-success">BUSCAR</button>
</span>

	</div>
	
</div>

</form>
<!-- form -->