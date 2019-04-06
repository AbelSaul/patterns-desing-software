<?php 
	
	require_once 'Persistence/Category.php';
	require_once 'Persistence/Product.php';

	class ProductController{

		private $category;
		private $product;

		public function __construct(){
			$this->category = new Category();
			$this->product = new Product();
		}

		public function index(){
			$data = $this->product->toList();
			require_once 'Presentation/application/header.php';
			require_once 'Presentation/views-product/product-index.php';
			require_once 'Presentation/application/footer.php';

			return $data;
		}

		public function crudProduct(){
 			require_once 'Presentation/application/header.php';
        	$categories = $this->category->toList();
			$item=null;
			
			if(isset($_REQUEST['id'])){
            	$item = $this->seeProduct($_REQUEST['id']);
        	}

        	require_once 'Presentation/views-product/product-save-edit.php';
			require_once 'Presentation/application/footer.php';
	    	
	    	return $item;
		}


		public function saveProduct(){

			$this->product->set("id",$_POST['id']);
			$this->product->set("name",$_POST['name']);
			$this->product->set("unit_price",$_POST['unit_price']);
			$this->product->set("stock",$_POST['stock']);
			$this->product->set("image",$_POST['image']);
			$this->product->set("id_category",$_POST['id_category']);				
			$this->product->save();
			
			header('Location: index.php');
		}

		public function toListProduct(){
			$data=$this->product->toList();
			return $data;
		}

		public function seeProduct($id){
			$this->product->set("id",$id);
			$data=$this->product->see();
			
			return $data;
		}


		public function deleteProduct(){     
			$this->product->set("id",$_REQUEST['id']);
			$this->product->delete();
			header('Location: index.php');
		}		
	}
	
 ?>