<?php 


	$controller = 'Product';

	// Todo esta lógica hara el papel de un FrontController
	if(!isset($_REQUEST['Controller']))//    existe la variable controller = false  !false= true
	{
	    require_once "Business/$controller"."Controller.php";
	    $controller = $controller. 'Controller';
	    $controller = new $controller;
	    $controller->index();    
	}
	else
	{

	    // Obtenemos el controlador que queremos cargar
	    $controller = $_REQUEST['Controller'];
	    $accion = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'index';
	    
	    // Instanciamos el controlador
	    require_once "Business/$controller"."Controller.php";
	    $controller = $controller.'Controller';
	    $controller = new $controller;
	    
	    // Llama la accion
	    call_user_func( array($controller, $accion));
	    //$controller->crud();  
	}

 ?>