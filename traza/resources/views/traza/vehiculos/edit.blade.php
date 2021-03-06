@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
		<h3>
			Editar Vehículo Con Placa  :{{$vehiculo->placa}}</h3>
			@if (count($errors)> 0 )
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($vehiculo,['method'=>'PATCH','action'=>['VehiculoController@update',$vehiculo->idVehiculo]])!!}
			{{Form::token()}}
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="placa">Placa</label>
						<input type="text" name="placa" class="form-control"
 							value="{{$vehiculo->placa}}" 
						 placeholder="Placa...">

					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="costo_acarreo">Costo acarreo 
						</label>
						<input type="text" name="costo_acarreo" pattern="([0-9]){0,15}([0-9]{0,15}.[0-9]{0,15})" class="form-control" 	value="{{$vehiculo->costo_acarreo}}" 

						placeholder="Costo...">

					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="volumen_carga">Volumen de carga</label>
						<input type="text" name="volumen_carga" pattern="([0-9]){0,10}([0-9]{0,10}.[0-9]{0,10})" class="form-control" 	value="{{$vehiculo->volumen_carga}}" 

						placeholder="volumen...">

					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label>Empresa</label>
						<select name="idEmpresa" class="form-control"> 
						<option value="{{$consulta2->idEmpresa}}">{{$consulta2->nombre}}
							</option>
							@foreach ($empresas2 as $emp)
							<option value="{{$emp->idEmpresa}}">{{$emp->nombre}}
							</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label>Conductor</label>
						<select name="Choferes_idChofer" class="form-control"> 

						<option value="{{$consulta3->idChofer}}">{{$consulta3->nombre}}
							</option>
							@foreach ($choferes2 as $cho)
							<option value="{{$cho->idChofer}}">{{$cho->nombre}}
							</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label> </label>
					<div>
					<button class="btn btn-primary" type="submit">Guardar</button>
					<button  class="btn btn-danger" type="reset">Cancelar</button>
					</div>
				</div>
			</div>
			</div>
			
		</div>
	</div>
	{!!Form::close()!!}

	@stop
