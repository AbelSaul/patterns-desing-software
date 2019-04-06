<?php 
	
	require_once 'Connection.php';

	class Product{

		private $id;
		private $name;
		private $unit_price;
		private $stock;
		private $image;
		private $id_category;
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
			$sql = "SELECT p.id, p.name, p.unit_price, p.stock, p.image, c.name as category
					FROM product p INNER JOIN category c ON p.id_category =  c.id
					WHERE p.state != 0
					ORDER BY p.id DESC
			";

			$data = $this->con->returnQueryArray($sql);
			return $data;
		}

		public function save(){
			if ($this->id != null) {
				$sql = "UPDATE product SET name = '$this->name', unit_price = '$this->unit_price', stock = '$this->stock', image = '$this->image' ,id_category = '$this->id_category'
					WHERE id = '$this->id'	
				";
			}else{
				$sql = "INSERT INTO product(name,unit_price,stock,image,id_category,state)
						VALUES ('$this->name','$this->unit_price','$this->stock','$this->image','$this->id_category',1)
				";
			}
			$this->con->simpleQuery($sql);
		}

		public function see(){
			$sql="SELECT * FROM product WHERE id='$this->id'";
			$row =$this->con->returnQuery($sql);
			//$row=mysqli_fetch_assoc($sql);//para mandarlo coomo un array directamente "como es un solo campo"
			return $row;
		}

		public function delete(){
			$sql="UPDATE product SET state='0'
				  WHERE id='$this->id'";
			$this->con->simpleQuery($sql);
		}


	}

 ?>