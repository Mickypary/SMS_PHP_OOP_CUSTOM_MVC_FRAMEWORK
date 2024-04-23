<?php $this->view('includes/header'); ?>
<?php $this->view('includes/nav'); ?>

	<div class="container-fluid p-4 shadow mx-auto" style="max-width: 1000px">
		<!-- Breadcrumbs -->
		<?php $this->view('includes/crumbs'); ?>

		<div class="card-group justify-content-center">
			<form>
				<input class="form-control" type="text" name="school"><br>
				<input class="btn btn-primary" type="submit" value="Add">
			</form>
		</div>
		

	</div>

<?php $this->view('includes/footer'); ?>
	