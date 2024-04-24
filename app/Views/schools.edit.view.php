<?php $this->load_view('includes/header'); ?>
<?php $this->load_view('includes/nav'); ?>

	<div class="container-fluid p-4 shadow mx-auto" style="max-width: 1000px">
		<!-- Breadcrumbs -->
		<?php $this->load_view('includes/crumbs'); ?>

		<?php if($rows): ?>	
		<div class="card-group justify-content-center">
	
			<form method="POST" action="<?= ROOT ?>/schools/update/<?= $rows[0]->id ?>">
				<h3>Edit School</h3>
				<!-- Alert Start -->
				<?php if(isset($errors) && count($errors) > 0): ?>
					<div class="alert alert-warning alert-dismissible fade show" role="alert">
						<strong>Errors!:</strong> <br>
						<?php foreach ($errors as $key => $error): ?>
							<?= $error ."<br>" ?>
						<?php endforeach ?>
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
				<?php endif; ?>
				<!-- Alert End -->
				<input class="form-control" value="<?= input_val('school',$rows[0]->school) ?>" type="text" name="school" placeholder="School Name" autofocus><br>
				<input class="btn btn-primary float-end" type="submit" value="Update">
				<a href="<?= ROOT ?>/schools">
					<input class="btn btn-danger" type="button" value="Cancel">
				</a>
				
			</form>
		</div>
		<?php else: ?>
			<div style="text-align: center;">
				<h3>School not found!</h3>
				<div class="clearfix"></div>
				<a href="<?= ROOT ?>/schools">
					<input class="btn btn-danger" type="button" value="Back">
				</a>
			</div>
			
		<?php endif ?>
		

	</div>

<?php $this->load_view('includes/footer'); ?>
	