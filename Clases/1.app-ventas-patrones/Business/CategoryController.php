<?php 
	
	require_once 'Persistence/Category.php';


	class CategoryController{


		private $category;

		public function __construct(){
			$this->category = new Category();
		}

		public function index(){
			$data = $this->category->toList();
			require_once 'Presentation/application/header.php';
			require_once 'Presentation/views-category/category-index.php';
			require_once 'Presentation/application/footer.php';

			return $data;
		}

		public function crudCategory(){
 			require_once 'Presentation/application/header.php';
			$item=null;		
			if(isset($_REQUEST['id'])){
            	$item = $this->seeCategory($_REQUEST['id']);
        	}

        	require_once 'Presentation/views-category/category-save-edit.php';
			require_once 'Presentation/application/footer.php';
	    	
	    	return $item;
		}


		public function saveCategory(){

			$this->category->set("id",$_POST['id']);
			$this->category->set("name",$_POST['name']);
			$this->category->set("description",$_POST['description']);				
			$this->category->save();
			
			header('Location: index.php');
		}

		public function toListCategory(){
			$data=$this->category->toList();
			return $data;
		}

		public function seeCategory($id){
			$this->category->set("id",$id);
			$data=$this->category->see();
			
			return $data;
		}

		public function deleteCategory(){     
			$this->category->set("id",$_REQUEST['id']);
			$this->category->delete();
			header('Location: index.php');
		}		
	}
	
 ?>