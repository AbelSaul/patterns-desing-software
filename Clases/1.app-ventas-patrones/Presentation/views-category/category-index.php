<div class="container panel panel-default">
	<div class="panel-heading">
		List of category
	</div>
	<div class="panel-body">
		<a href="?Controller=Category&action=crudCategory" class="btn btn-info">New Category</a>
	</div>

	<table class="table table-hover">
		<tr><th>Id</th><th>Name</th><th>Descripcion</th></tr>
		<?php foreach($data as $item): ?>
		<tr>
			<td><?php echo $item['id'] ?></td>
			<td><?php echo $item['name'] ?></td>
			<td><?php echo $item['description'] ?></td>
			<td>
	
			<td>
				<a href="?Controller=Category&action=crudCategory&id=<?php echo $item['id']; ?>" class="btn btn-info btn-xs">
						<span class="glyphicon glyphicon-edit" title="Edit"></span>
				</a>
				
				<a href="?Controller=Category&action=deleteCategory&id=<?php echo $item['id']; ?>" class="btn btn-danger btn-xs">
						<span class="glyphicon glyphicon-trash" title="Delete"></span>
				</a>				
			</td>
			
		</tr>
		<?php endforeach; ?>
	</table>
</div>
