<!DOCTYPE html>
<html>
<head>
	<title>Codeigniter 4 CRUD Application</title>
	<link rel="stylesheet" type="text/css" href="<?php echo PUBLIC_URL.'assets/css/bootstrap.css'; ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo PUBLIC_URL.'assets/css/style.css'; ?>" />
	
	<script type="text/javascript">
		function deleteConfirm(id)	
		{
			//alert(id);
			var baseurl = '<?php echo base_url('/books/delete/'); ?>';
			if(confirm('Are you sure, you want to delete this record!'))
			{
				window.location.href = baseurl+'/'+id;
			}
		}
	</script>
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
					    <div class="nav-link">Books / View</div>
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
				<a href="<?php echo base_url().'/books/create'; ?>" class="btn btn-primary btn-sm">Add</a>
			</div>
		</div>
	</div>
	<div class="container mt-4">
		<div class="row">
			<div class="col-sm-12">
				<?php
				if(!empty($session->getFlashdata('success')))
				{ ?>
					<div class="alert alert-success">
						<?php echo $session->getFlashdata('success'); ?>
					</div>
				<?php
				}

				if(!empty($session->getFlashdata('error')))
				{ ?>
					<div class="alert alert-danger">
						<?php echo $session->getFlashdata('error'); ?>
					</div>
				<?php
				}
				?>
			</div>

			<div class="col-sm-12">
				<div class="card">
					<div class="card-header bg-purple text-white">
						<div class="card-header-title">Books</div>
					</div>
					<div class="card-body">
						<table class="table table-striped">
							<tr>
								<th>ID</th>
								<th>NAME</th>
								<th>AUTHOR</th>
								<th>ISBN NO</th>
								<th width="150">ACTION</th>
							</tr>

							<?php
							if(isset($booksArray) && !empty($booksArray))
							{ 
								$i=1;
								foreach ($booksArray as $books)
								{
									$id=$books['id'];
									?>
									<tr>
										<td><?php echo $i; ?></td>
										<td><?php echo $books['name']; ?></td>
										<td><?php echo $books['author']; ?></td>
										<td><?php echo $books['isbn_no']; ?></td>
										<td>
											<a href="<?php echo base_url('books/edit/'.$id); ?>" class="btn btn-primary btn-sm">Edit</a>
											|
											<a href="#" onclick="deleteConfirm('<?php echo $id; ?>');" class="btn btn-danger btn-sm">Delete</a>
										</td>
									</tr>
									<?php
									$i++;
								}
							}
							else
							{ ?>
								<tr>
									<td colspan="5" align="center">No Record Found!</td>
								</tr>
							<?php
							} ?>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>