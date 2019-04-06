<div class="container">
	<form method="POST" action="?Controller=Category&action=saveCategory" class="form-horizontal">
	<h1>Register Category</h1>
		
		<input type="hidden" name="id" value="<?php  if(isset($item['id']))echo $item['id']; ?>">
		<div class="form-group">
			<label for="name" class="col-lg-2 control-label" >Name</label>
			<div class="col-lg-10">
				<input type="text" class="form-control" name="name" id="name" value="<?php if(isset($item['name'])) echo $item["name"]; ?>" placeholder="name">
			</div>

		</div>
		<div class="form-group">
			<label for="description" class="col-lg-2 control-label">Description</label>
			<div class="col-lg-10">
				<input type="text" class="form-control" name="description" id="description" value="<?php if(isset($item['description']))echo $item['description']; ?>" placeholder="description">
			</div>
		</div>

		<div class="form-group">
			<div class="col-lg-offset-2 col-lg-10">
				<button type="submit" class="btn btn-success" value="Save"><span class="glyphicon glyphicon-floppy-disk"></span> Save </button>
			</div>
		</div>
	</form>
</div>

