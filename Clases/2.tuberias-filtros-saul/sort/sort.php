<?php 

	class Sort{

		public function ordenarArray(){
			$nombres = [ 

				0 => "CARAZA",
				1 => "CASAPIA",
    			2 => "BAYLON",
    			3 => "BEDOYA",
    			4 => "CARRILLO",
    			5 => "BEDREGAL",
    			6 => "CORTEZ",
    			7 => "ROMARIO",
    			8 => "AGURTO",
    			9 => "CRISPIN",
    			10 => "DIAZ",
    			11 => "DUENAS",
    			12 => "ESPINOZA",
    			13 => "FERNANDEZ",
    			14 => "FERNANDEX",
    			15 => "FERRO",
    			16 => "CARRERA",
    			17 => "ACEVEDO",
    			18 => "ALCALA",
    			19 => "ALMORA",
    			20 => "ALOSILLA",
    			21 => "ALOCEN",
    			22 => "BAIOCCHI",
    			23 => "BEJAR",
    			24 => "BENAVIDES",
    			25 => "BOZA"

			];
			foreach ($nombres as $clave => $valor) {
 			   echo "Nombres[" . $clave . "] = " . $valor . "<br>";
			}

			echo "<br>";
			echo "<br>";

			if (sort($nombres)) {
				foreach ($nombres as $clave => $valor) {
 			   		echo "Nombres Array[" . $clave . "] = " . $valor . "<br>";
				}
			}
		}


        public function ordenarTxt(){

            $fp1 = fopen("repositorio1.txt", "r");
            $fp2 = fopen("repositorio2.txt","a+");
            $fp3 = fopen("repositorio3.txt","a+");

            while(!feof($fp1)){
                $linea = fgets($fp1);
                fputs($fp2,$linea);            
            }

            $array = [];
            $cont = 0;

            $lecturaFp2 = fopen("repositorio2.txt", "r");

            while(!feof($lecturaFp2)){
                $linea = fgets($lecturaFp2);
                $array[$cont++]=$linea;           
            }

            echo (sort($array));
            foreach ($array as $clave => $valor) {
                echo "Nombres Array Ordenado[" . $clave . "] = " . $valor . "<br>";
                fputs($fp3,$array[$clave]);     
            }   
            fclose($fp1);
            fclose($fp2); 
            fclose($fp3); 
        }

        public function ordenamientoBurbuja(){
            $fp1 = fopen("repositorio1.txt", "r");
            $fp2 = fopen("repositorio2.txt","a+");
       

            while(!feof($fp1)){
                $linea = fgets($fp1);
                fputs($fp2,$linea);            
            }

            $array = [];
            $cont = 0;

            $lecturaFp2 = fopen("repositorio2.txt", "r");

            $array = file('repositorio2.txt');

            for($i=1;$i<count($array);$i++)
            {
                for($j=0;$j<count($array)-$i;$j++)
                {
                    if($array[$j]>$array[$j+1])
                    {
                        $k=$array[$j+1];
                        $array[$j+1]=$array[$j];
                        $array[$j]=$k;
                    }
                }
            }

            foreach ($array as $clave => $valor) {
                echo "Nombres Array Ordenado[" . $clave . "] = " . $valor . "<br>";
              
            } 
            
            $fh = fopen("repositorio3.txt", "w");
            foreach( $array as $linea ) {
                fwrite( $fh, $linea );
            } 

            fclose( $fh ); 
            fclose($fp1);
            fclose($fp2); 
             
        }
	}


	$sort = new Sort();

	//$sort->ordenarArray();
    //$sort->ordenarTxt();
    $sort->ordenamientoBurbuja();
 ?>