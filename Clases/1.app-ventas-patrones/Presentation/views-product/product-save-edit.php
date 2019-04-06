	<div class="container">
	<form method="POST" action="?Controller=Product&action=saveProduct" class="form-horizontal">
	<h1>Product Registration</h1>
		
		<input type="hidden" name="id" value="<?php  if(isset($item['id']))echo $item['id']; ?>">

		<div class="form-group">
			<label for="name" class="col-lg-2 control-label" >Name</label>
			<div class="col-lg-10">
				<input type="text" class="form-control" name="name" id="name" value="<?php if(isset($item['name'])) echo $item["name"]; ?>" placeholder="Name">
			</div>

		</div>

		<div class="form-group">
			<label for="unit_price" class="col-lg-2 control-label">Unit Price</label>
			<div class="col-lg-10">
				<input type="number" class="form-control" name="unit_price" id="unit_price" value="<?php if(isset($item['unit_price']))echo $item['unit_price']; ?>" placeholder="Precio Unitario">
			</div>
		</div>

		<div class="form-group">
			<label for="stock" class="col-lg-2 control-label">Stock</label>
			<div class="col-lg-10">
				<input type="number" class="form-control" name="stock" id="stock" value="<?php if(isset($item['stock']))echo $item['stock']; ?>" placeholder="Stock">
			</div>
		</div>

		<div class="form-group">
			<label for="image" class="col-lg-2 control-label">Image</label>
			<div class="col-lg-10">
				<input type="text" class="form-control" name="image" id="image" value="<?php if(isset($item['image']))echo $item['image']; ?>" placeholder="Image">
			</div>
		</div>
	
		<div class="form-group">
			<label for="id_category" class="col-lg-2 control-label">Category</label>
			<div class="col-lg-10">
				<select class="form-control" name="id_category" id="id_category" value="<?php if(isset($item['id_category']))echo $item['id_category'];?>">
				
						<?php foreach($categories as $category): ?>
							<?php if($item['id_category'] === $category['id'] ){ ?>
								<option value="<?php echo $category['id']; ?>" selected><?php echo $category['name']; ?>
								</option>
							<?php }else{ ?>
										<option value="<?php echo $category['id']; ?>">
											<?php echo $category['name']; ?>
										</option>
								  <?php }  ?>	
						<?php endforeach; ?>
				</select>
			</div>
		</div>
		<div class="form-group">
			<div class="col-lg-offset-2 col-lg-10">
				<button type="submit" class="btn btn-success" value="Save"><span class="glyphicon glyphicon-floppy-disk"></span> Save </button>
			</div>
		</div>
	</form>
</div>
