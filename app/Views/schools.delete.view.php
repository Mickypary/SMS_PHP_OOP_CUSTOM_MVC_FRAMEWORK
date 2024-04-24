<?php $this->load_view('includes/header'); ?>
<?php $this->load_view('includes/nav'); ?>

	<div class="container-fluid p-4 shadow mx-auto" style="max-width: 1000px">
		<!-- Breadcrumbs -->
		<?php $this->load_view('includes/crumbs'); ?>

		<?php if($row): ?>	
		<div class="card-group justify-content-center">
	
			<form method="POST" action="<?= ROOT ?>/schools/delete/<?= $row[0]->id ?>">
				<h3>Are you sure you want to delete?</h3>

				<input disabled class="form-control" value="<?= input_val('school',$row[0]->school) ?>" type="text" name="school" placeholder="School Name" autofocus><br>

					<input class="btn btn-primary float-end" type="submit" name="delete" value="Delete">
		
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
	