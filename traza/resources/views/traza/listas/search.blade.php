<!-- Formulario url= donde va a direccionar el formulario se debe enviar con Get para filtrar las categorias -->


{!! Form::open(array('url'=>'traza/listas','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}
<div class="form-group">
	<div class="input-group">
		<input type="text" class="form-control" name="searchText" placeholder="Buscar por placa.." value="{{$searchText}}">
		<span class="input-group-btn">
			<button type="submit" class="btn btn-primary">Buscar</button>
		</span>
	</div>
</div>
{{Form:: close()}}