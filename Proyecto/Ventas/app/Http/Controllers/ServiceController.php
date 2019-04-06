<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\Service;

class ServiceController extends Controller
{
	private $servicio;
	
	public function __construct(){
		
	}
    public function articulos(Request $request){
    	$this->servicio = new Service();
    	$idcategoria = $request->idcategoria;
    	$articulos = $this->servicio->articulos($idcategoria);
    	return response()->json($articulos);
    }
}
