<?php

namespace App\Service;

use Illuminate\Database\Eloquent\Model;
use App\Models\Articulo;
use App\Models\Proveedor;
class Service extends Model
{
   
   public function articulos($idcategoria = ''){
   	//empty Devuelve FALSE si var existe y tiene un valor no vacío, distinto de cero. De otro modo devuelve TRUE.

   		if (empty($idcategoria)) {
   			$articulos = Articulo::join('categorias','articulos.idcategoria','=','categorias.id')
            	->select('articulos.id','articulos.codigo','articulos.nombre','categorias.nombre as nombre_categoria','articulos.precio_venta','articulos.stock','articulos.descripcion','articulos.condicion')
            	->orderBy('articulos.id', 'desc')->get();
               return $articulos;
   		}else{
   			$articulos = Articulo::join('categorias','articulos.idcategoria','=','categorias.id')
            	->select('articulos.id','articulos.codigo','articulos.nombre','categorias.nombre as nombre_categoria','articulos.precio_venta','articulos.stock','articulos.descripcion','articulos.condicion')
            	->orderBy('articulos.id', 'desc')
            	->where('categorias.id','=',$idcategoria)
            	->get();

            return $articulos;
   		}
   }

   public function proveedores(){

   }


   public function limpiarTildes(){

      $proveedores = Proveedor::join('personas','proveedores.id','=','personas.id')
            ->select('personas.id','personas.nombre')
            ->get();
      $no_permitidas = array ("á","é","í","ó","ú","Á","É","Í","Ó","Ú");
      $permitidas = array ("a","e","i","o","u","A","E","I","O","U"); 

      $dataProveedores = [];
      $i = 0;
      foreach ($proveedores as $proveedor) {   
         $nombre_sin_tilde = str_replace($no_permitidas, $permitidas , $proveedor->nombre);
         $dataProveedores[$i++]= $nombre_sin_tilde;
      }

      return $dataProveedores; 
         
   }
   public function ordenar($data){
         $arryOrdenado = sort($data,SORT_STRING | SORT_REGULAR );
         return $arryOrdenado;
   }
}
