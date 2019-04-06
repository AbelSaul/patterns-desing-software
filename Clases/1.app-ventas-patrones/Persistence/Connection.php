<?php 

	class Connection{

		private $con;
		private $data=array(
			"host"=>"localhost",
			"user"=>"root",
			"password"=>"",
			"db"=>"app-ventas-patrones"
		);


		public function __construct(){
			$this->con=new \mysqli($this->data['host'],$this->data['user'],$this->data['password'],$this->data['db']) or die("Problemas al conectar");
		}

		public function simpleQuery($sql){
			$this->con->query($sql);
		}

		public function returnQuery($sql){
			$r=$this->con->query($sql);		
			$rows=mysqli_fetch_array($r,MYSQLI_ASSOC);
			return $rows;
		}

		public function returnQueryArray($sql){
			$toList=array();
			$r = $this->con->query($sql);		
			while($rows=mysqli_fetch_array($r,MYSQLI_ASSOC)){
				$toList[]=$rows;
			}

			return $toList;
		}


	}
 ?>