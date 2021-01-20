<!DOCTYPE html>
<html>
<head>
	<title>Codeigniter 4 CRUD Application</title>
	<link rel="stylesheet" type="text/css" href="<?php echo PUBLIC_URL.'assets/css/bootstrap.css'; ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo PUBLIC_URL.'assets/css/style.css'; ?>" />
</head>
<body>
	
	<div class="container-fluid bg-purple shadow-sm">
		<div class="container pb-2 pt-2">
			<div class="text-white">
				<a href="<?php echo base_url(); ?>" class="text-white">
					<h4>Codeigniter 4 CRUD Application</h4>
				</a>
			</div>
		</div>
	</div>
	<div class="bg-white shadow-sm">
		<div class="container pt-2">
			<div class="row">
				<div class="col-sm-10">
			      	<nav class="nav nav-underline">
					    <div class="nav-link">Books / Edit</div>
					</nav>
			    </div>
			    <div class="col-sm-2 pt-2">
			      <p style="text-align: right;"><a href="https://www.youtube.com/watch?v=wt64by5QuvM" target="_blank">Tutorial Link</a></p>
			    </div>
			</div>
		</div>
	</div>
	<div class="container mt-4">
		<div class="row">
			<div class="col-sm-12 text-right">
				<a href="<?php echo base_url().'/books'; ?>" class="btn btn-primary btn-sm">Back</a>
			</div>
		</div>
	</div>
	<div class="container mt-4">
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-header bg-purple text-white">
						<div class="card-header-title">Edit Book</div>
					</div>
					<div class="card-body">
						<form name="createForm" id="createForm" method="POST" action="<?php echo base_url('/books/edit/'.$book['id']); ?>">
							<div class="form-group">
								<label>Name</label>
								<input type="text" placeholder="Name" name="name" id="name" class="form-control <?php echo (isset($validation) && $validation->hasError('name')) ? 'is-invalid' : ''; ?>" value="<?php echo set_value('name',$book['name']); ?>" />

								<?php
								// print_r($validation);
								if(isset($validation) && $validation->hasError('name'))
								{
									echo "<p class='invalid-feedback'>".$validation->getError('name')."</p>";
								}
								?>
							</div>
							<div class="form-group">
								<label>Author</label>
								<input type="text" placeholder="Author" name="author" id="author" class="form-control <?php echo (isset($validation) && $validation->hasError('author')) ? 'is-invalid' : ''; ?>" value="<?php echo set_value('author',$book['author']); ?>" />

								<?php
								// print_r($validation);
								if(isset($validation) && $validation->hasError('author'))
								{
									echo "<p class='invalid-feedback'>".$validation->getError('author')."</p>";
								}
								?>
							</div>
							<div class="form-group">
								<label>ISBN No</label>
								<input type="text" placeholder="ISBN No" name="isbn_no" id="isbn_no" class="form-control" value="<?php echo set_value('isbn_no',$book['isbn_no']); ?>" />
							</div>

							<input type="submit" name="submit" id="submit" class="btn btn-primary" value="Submit" />
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>