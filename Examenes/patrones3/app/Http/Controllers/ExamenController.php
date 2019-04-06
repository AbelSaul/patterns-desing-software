<?php

namespace App\Http\Controllers;

use App\User;
use App\Deuda;
use App\Alumno;
use App\Curso;
use App\Prestamo;
use App\CursoFiis;
use DB;
use Illuminate\Http\Request;

class ExamenController extends Controller
{

	public function __construct()
    {
    
        $this->middleware('auth');
    }
    
    public function promedioPonderado($alumno_codigo)
    {
        //http://localhost:8000/users/list/1?api_token=123


        $cursos = Curso::where('alumno_codigo', $alumno_codigo)->get();

        $total_credito = 0;
        $total_puntaje = 0;


        foreach ($cursos as $curso) {
            $total_credito += $curso->credito;
            $total_puntaje += $curso->puntaje;
        }         
    

        $total = $total_puntaje/$total_credito;
        $ponderado = ['ponderado' => $total];
        return response()->json($ponderado);  
    }


    public function libros($alumno_codigo){
        $libros = Prestamo::where('alumno_codigo', $alumno_codigo)
                        ->where('estado','0')
                        ->get();
        return response()->json($libros);
    }

    public function ingles($alumno_codigo){
        $cursos = Curso::where('alumno_codigo', $alumno_codigo)
                        ->where('nombre','Like','Ingles%')
                        ->get();

   
        if (count($cursos) === 0) {
             $resultado = ['resultado', 'No llevo ingles' ];
        }else{
             $resultado = ['resultado', 'Si llevo ingles'];
        }
        return response()->json($resultado);
    }


     public function carrera($alumno_codigo)
    {
        //http://localhost:8000/users/list/1?api_token=123


        $cursos = Curso::where('alumno_codigo', $alumno_codigo)->get();

        $total_credito = 0;

        foreach ($cursos as $curso) {
            $total_credito += $curso->credito;
        }         
    
        if ($total_credito < 210) {
            $resultado = ['resultado' => 'El alumno todavia no finaliza su carrera'];           
                
        }else{
            if ($total_credito === 210) {
                 $resultado = ['resultado' => 'El alumno acabo su carrera en 5 anios ']; 
            }else{
                $resultado = ['resultado' => 'El alumno excedio el total de creditos exigidos por su carrera '];
            }
              
        }
       
        return response()->json($resultado);  
    }
    
    public function deudaCFF($alumno_codigo){
        $deudas = Deuda::where('alumno_codigo', $alumno_codigo)
                    ->where('nombre','CFF')
                    ->get();

        $total_deuda = 0;
        foreach ($deudas as $deuda) {
            $total_deuda += $deuda->monto;
        }         
        
        $deuda = ['Deuda CFF' => $total_deuda];
        return response()->json($deuda);
    }


    public function deudaOBU($alumno_codigo){
        $deudas = Deuda::where('alumno_codigo', $alumno_codigo)
                ->where('nombre','OBU')
                ->get();
                    
        $total_deuda = 0;
        foreach ($deudas as $deuda) {
            $total_deuda += $deuda->monto;
        }         
        
        $deuda = ['Deuda OBU' => $total_deuda];
        return response()->json($deuda);
    }

    public function deudaFIIS($alumno_codigo){
        $deudas = Deuda::where('alumno_codigo', $alumno_codigo)
                ->where('nombre','FIIS')
                ->get();
                    
        $total_deuda = 0;
        foreach ($deudas as $deuda) {
            $total_deuda += $deuda->monto;
        }         
        
        $deuda = ['Deuda FIIS' => $total_deuda];
        return response()->json($deuda);
    }

    public function deudaUNAS($alumno_codigo){
        $deudas = Deuda::where('alumno_codigo', $alumno_codigo)
                ->where('nombre','UNAS')
                ->get();
                    
        $total_deuda = 0;
        foreach ($deudas as $deuda) {
            $total_deuda += $deuda->monto;
        }         
        
        $deuda = ['Deuda UNAS' => $total_deuda];
        return response()->json($deuda);
    }

    public function cursosFiis($alumno_codigo){
        $cursos_fiis = CursoFiis::all();
        $cursos = Curso::where('alumno_codigo', $alumno_codigo)->get();
        $cursos_faltantes = [];

 
        foreach ($cursos_fiis as $cursofiis) {
                $band = false;
                foreach ($cursos as $curso) {
                    if ($cursofiis->nombre === $curso->nombre) {
                        $band = true;
                    }else{
                        $band = false;
                    }
                }
                if(!$band){    
                    array_push($cursos_faltantes,$cursofiis->nombre);
                }
        }   



        return response()->json($cursos_faltantes);
    }

}