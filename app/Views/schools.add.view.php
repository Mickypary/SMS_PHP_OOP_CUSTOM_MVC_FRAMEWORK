<?php $this->view('includes/header'); ?>
<?php $this->view('includes/nav'); ?>

	<div class="container-fluid p-4 shadow mx-auto" style="max-width: 1000px">
		<!-- Breadcrumbs -->
		<?php $this->view('includes/crumbs'); ?>

		<div class="card-group justify-content-center">
			<form method="POST" action="">
				<h3>Add New School</h3>
				<input class="form-control" value="<?= input_val('school') ?>" type="text" name="school" placeholder="School Name"><br>
				<input class="btn btn-primary" type="submit" value="Add">
			</form>
		</div>
		

	</div>

<?php $this->view('includes/footer'); ?>
	