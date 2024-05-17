<div class="card-group justify-content-center">
	<form method="POST" action="">
		<h3>Add A Test</h3>
		<!-- Alert Start -->
		<?php if(isset($_SESSION['errors']) && count($_SESSION['errors']) > 0): ?>
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<strong>Errors!:</strong> <br>
				<?php foreach ($_SESSION['errors'] as $key => $error): ?>
					<?= $error ."<br>" ?>
					<?php unset($_SESSION['errors']) ?>
				<?php endforeach ?>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		<?php endif; ?>
		<!-- Alert End -->
		<input class="form-control" value="<?= input_val('test') ?>" type="text" name="test" placeholder="Test Title" autofocus><br>
		<textarea name="description" placeholder="Add a description for this test" class="form-control"><?= input_val('description') ?></textarea>
		<br>
		<input class="btn btn-primary float-end" type="submit" value="Add">
		<a href="<?= ROOT ?>/single_class/<?= $row->class_id ?>?tab=tests">
			<input class="btn btn-danger" type="button" value="Cancel">
		</a>
		
	</form>
</div>