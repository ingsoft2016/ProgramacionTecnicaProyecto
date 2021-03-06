<?php

namespace Trazabilidad\Http\Controllers;

use Illuminate\Http\Request;
use Trazabilidad\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use
Trazabilidad\Http\Requests\VehiculoTransporteFormRequest;
use DB;
use Carbon\Carbon;
class VehiculoProduccionController extends Controller
{
	public function __construct(){
		
		
	}
	public function index(Request $request){
		if ($request){
			$query=trim($request->get('searchText'));
			if ($query!='') {
				$vehiculos1=DB::table('vehiculos_transporte as vt')
				->join('vehiculo_transporte_material as vtm','vt.idVehiculo','=','vtm.idVehiculo')
				->join('choferes as cho','cho.idChofer','=','vt.Choferes_idChofer')
				->select('vt.idVehiculo','vt.placa','vtm.fecha','vtm.observaciones','vtm.cantidadMaterial','vt.costo_acarreo','vt.cantidad_viajes','cho.nombre as nombre',DB::raw('vt.costo_acarreo as total'),db::raw(' count(*) as contador'))
                       ->where('vt.estado','=',1)
			
				->where('vt.idVehiculo','=',$query)
	->orwhere('vt.placa','=',$query)
				->orderBy('vt.placa','asc')
				->groupBy('vt.idVehiculo')
				->paginate(10000);

				$vehiculos2=DB::table('vehiculo_transporte_material as vh')
			->join('vehiculos_transporte as vt','vh.idVehiculo','=','vt.idVehiculo')
			->join('materiales as mat','vh.idMaterial','=','mat.idMaterial')
			->join('abscisas as abs','abs.idAbscisa','=','vh.id_abscisa_cargue')
			->join('abscisas as abs2','abs2.idAbscisa','=','vh.id_abscisa_descargue')
			->select('vt.placa as placa','vh.fecha','vh.numeroRecibo','vh.observaciones','mat.nombre as material','abs.nombre as abscargue','abs2.nombre as absdescargue','vh.cantidadMaterial')
			->where('vt.estado','=',1)
					->where('vt.idVehiculo','=',$query)
		
					->orwhere('vt.placa','=',$query)
->orderBy('vh.fecha','asc')
				->paginate(1000); 

				return view('traza.listas.index2',["vehiculos2"=>$vehiculos2,"vehiculos"=>$vehiculos1,"searchText"=>$query]);
			}else{
				$vehiculos=DB::table('vehiculos_transporte as vt')
				->join('vehiculo_transporte_material as vtm','vt.idVehiculo','=','vtm.idVehiculo')
				->join('choferes as cho','cho.idChofer','=','vt.Choferes_idChofer')
				->select('vt.idVehiculo','vt.placa','vtm.fecha','vtm.observaciones','vtm.cantidadMaterial','vt.costo_acarreo','vt.cantidad_viajes','cho.nombre as nombre',DB::raw('vt.costo_acarreo as total'),db::raw(' count(*) as contador'))
				->where('vt.estado','=',1)
				->where('vt.placa','LIKE','%'.$query.'%')
				->orwhere('vt.idVehiculo','LIKE','%'.$query.'%')
				->groupBy('vt.idVehiculo')
				->orderBy('vt.placa','asc')
				->paginate(10000);
				return view('traza.listas.index',["vehiculos"=>$vehiculos,"searchText"=>$query]);

			}
		}

		
		
	}


}