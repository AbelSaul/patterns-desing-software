<div class="container panel panel-default">
	<div class="panel-heading">
		List of products
	</div>
	<div class="panel-body">
		<a href="?Controller=Product&action=crudProduct" class="btn btn-info">New Product</a>
	</div>

	<table class="table table-hover">
		<tr><th>Image</th><th>Description</th></tr>
		<?php foreach($data as $item): ?>
		<tr>
			<td><img src="<?php echo $item['image'];?>"></td>
			<td>
				<h3>Name: <?php echo $item['name'] ?></h3>
				<p>Unit Price: <?php echo $item['unit_price'] ?></p>
				<p>Stock: <?php echo $item['stock'] ?></p>
				<p>Category: <?php echo $item['category'] ?></p>
		
				<p>

					<a href="?Controller=Product&action=crudProduct&id=<?php echo $item['id']; ?>" class="btn btn-info btn-xs">
						<span class="glyphicon glyphicon-edit" title="Edit"></span>
					</a>
				
					<a href="?Controller=Product&action=deleteProduct&id=<?php echo $item['id']; ?>" class="btn btn-danger btn-xs">
						<span class="glyphicon glyphicon-trash" title="Delete"></span>
					</a>

					
				</p>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
</div>
