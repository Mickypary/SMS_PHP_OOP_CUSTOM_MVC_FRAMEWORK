<form method="POST" action="" class="form mx-auto" style="width: 100%; max-width: 400px;">
	<br><h4>Remove Student</h4>

	<!-- Alert Start -->
			<?php if(count($errors) > 0): ?>
				<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<strong>Errors!:</strong> <br>
					<?php foreach ($errors as $key => $error): ?>
						<?= $error ."<br>" ?>
					<?php endforeach ?>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			<?php endif; ?>
			<!-- Alert End -->

			
	<input autofocus type="text" class="form-control" name="name" value="<?= input_val('name') ?>" placeholder="Lecturer Name">
	<br>
	<a href="<?= ROOT ?>/single_class/<?= $row->class_id ?>?tab=students">
		<button type="button" class="btn btn-danger">Cancel</button>
	</a>
	<button name="search" class="btn btn-primary float-end">Search</button>
	<div class="clearfix"></div>
</form>
<br>


<!-- Search Result panel -->
<div class="card-group justify-content-center">
	<form method="POST">
		<?php if(isset($results) && $results): ?>	
			<?php foreach ($results as $key => $row): ?>

				<?php include(views_path('user')) ?>
			
			<?php endforeach ?>	
		<?php else: ?>
			<?php if (count($_POST) > 0): ?>
				<center><hr><h4><?= 'No record found'; ?></h4></center>
			<?php endif ?>	
		<?php endif ?>
	</form>
</div>