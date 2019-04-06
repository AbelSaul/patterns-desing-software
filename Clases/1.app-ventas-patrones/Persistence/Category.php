<?php 

	require_once 'Connection.php';


	class Category{
	
		private $id;
		private $name;
		private $description;
		private $con;

		
		
		public function __construct(){
			$this->con = new Connection();
		}

		public function get($attribute){
			return $this->$attribute;
		}

		public function set($attribute,$content){
			$this->$attribute = $content;
		}

		public function toList(){
			$sql = "SELECT id, name, description
					FROM category 
					WHERE state != 0
					ORDER BY id DESC
			";

			$data = $this->con->returnQueryArray($sql);
			return $data;
		}

		public function save(){
			if ($this->id != null) {
				$sql = "UPDATE category SET name = '$this->name', description = '$this->description'
						WHERE id = '$this->id'	
				";
			}else{
				$sql = "INSERT INTO category(name,description,state)
						VALUES ('$this->name','$this->description',1)
				";
			}
			$this->con->simpleQuery($sql);
		}

		public function see(){
			$sql = "SELECT * FROM category WHERE id='$this->id'";
			$row = $this->con->returnQuery($sql);
			return $row;
		}

		public function delete(){
			$sql="UPDATE category SET state=0 
				  WHERE id='$this->id'";
			$this->con->simpleQuery($sql);
		}
	}		

 ?>