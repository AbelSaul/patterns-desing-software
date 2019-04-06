<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Catalago</title>
	 <link rel="stylesheet" href="Presentation/assets/css/bootstrap.min.css" />
     <link rel="stylesheet" href="Presentation/assets/css/bootstrap-theme.min.css" />
     <link rel="stylesheet" href="Presentation/assets/css/style.css" />

</head>
<body>		
<header class="navbar navbar-default">
		<nav class="container ">    
			<ul class="nav navbar-nav navbar-right">
				<li>
					<a href="#">Inicio</a>
				</li>
				<li>
					
					<a href="?Controller=Product&action=index">Product</a>
					</li>
				<li>
					<a href="?Controller=Product&action=crudProduct">New Product</a>
				</li> 
				<li>
					<a href="?Controller=Category&action=index">Category</a>
				</li> 
				<li>
					<a href="?Controller=Category&action=crudCategory">New Category</a>
				</li> 
			</ul>
		</nav>
</header>