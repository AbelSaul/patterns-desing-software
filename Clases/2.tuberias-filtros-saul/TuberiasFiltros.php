<?php 
	class TuberiasFiltros{
		function primerFiltro(){
		    $fp1=fopen("repositorio1.txt", "r");
			$fp2 = fopen("repositorio2.txt","r+");//Abre el archivo para lectura y escritura. La lectura o escritura comienza al inicio del archivo.
		    while(!feof($fp1)){
			    $linea = fgets($fp1);	
			    if ($linea != '') {
				    $recorteUno = explode(",",$linea);
				    $recorteDos = explode(" ",$recorteUno[0]);
					$apellidos = $recorteDos[0]." ".$recorteDos[1];
				    fputs($fp2,$apellidos.",");  
				    $nombres = "";
				    for ($i=2; $i < sizeof($recorteDos); $i++) { 
				    	if(!((sizeof($recorteDos)-1) == $i)){
				    		$nombres = $nombres.$recorteDos[$i]." "; 			
				    	}else{
				    		$nombres = $nombres.$recorteDos[$i];
				    	}
				    }
					fputs($fp2,$nombres.",");
				    for ($i=1; $i < sizeof($recorteUno); $i++) {
				    	if(!((sizeof($recorteUno)-1) == $i)){
				    		fputs($fp2,$recorteUno[$i].",");  			
				    	}else{
				    		fputs($fp2,$recorteUno[$i]);
				    	}  		
				    }			        		    
			    }    		    
		  } 
		  fclose($fp1);
		  fclose($fp2); 
		}



		function segundoFiltro(){

			$arrayTxt = [];
			
			$fp2 = fopen("repositorio2.txt", "r");
			$fp3=fopen("repositorio3.txt","r+");
			
			$contador=0;
			while (!feof($fp2)) {
			    $linea=fgets($fp2);
			    if ($linea != '') {
				    $arrayTxt[$contador++]=$linea;
			    }
			}

			fclose($fp2); 
			$arryOrdenado = sort($arrayTxt,SORT_STRING | SORT_REGULAR );
			
			if ($arryOrdenado) {
				$no_permitidas = array ("á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","Ñ");
				$permitidas = array ("a","e","i","o","u","A","E","I","O","U","n","N");	

			 	for ($i=0; $i < sizeof($arrayTxt); $i++) { 
			 		$texto = str_replace($no_permitidas, $permitidas , $arrayTxt[$i]);
			 		echo "Indice: ".$i." "."Valor: ".$texto."<br>";
					fputs($fp3,$texto);
			 	}
			 	
			}

			fclose($fp3);
		}


		function mostrarTercerRepositorio(){
			$arrayTxt = array();
			$fp3 = fopen("repositorio3.txt", "r");
			$contador = 0;
			while (!feof($fp3)) {
			    $linea=fgets($fp3);
			    $arrayTxt[$contador++]=$linea;
			}
			foreach ($arrayTxt as $clave => $valor) {
 			   echo "Personas[" . $clave . "] = " . $valor . "<br>";
			}
			fclose($fp3);
		}
	}

	$tuberia = new TuberiasFiltros();
	$tuberia->primerFiltro();
    $tuberia->segundoFiltro();
    $tuberia->mostrarTercerRepositorio();

 ?>