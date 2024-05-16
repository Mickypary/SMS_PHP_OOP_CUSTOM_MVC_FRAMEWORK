<div class="card-group justify-content-center">
	<?php if (isset($test) && is_object($test)): ?>
		
	<form method="POST" action="">
		<h3>Edit A Test</h3>

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

		<input class="form-control" value="<?= input_val('test', $test->test) ?>" type="text" name="test" placeholder="Test Title" autofocus><br>
		<textarea name="description" placeholder="Add a description for this test" class="form-control mb-2"><?= input_val('description', $test->description) ?></textarea>

		<div class="mb-2">
			<input type="radio" name="disabled" value="0" <?= !$test->disabled ? 'checked' : '' ?>  > Active |
			<input type="radio" name="disabled" value="1" <?= $test->disabled ? 'checked' : '' ?>  > Disabled
		</div>
		
		<input class="btn btn-primary float-end" type="submit" value="Update">
		<a href="<?= ROOT ?>/single_class/<?= $row->class_id ?>?tab=tests">
			<input class="btn btn-danger" type="button" value="Cancel">
		</a>
		
	</form>
	<?php else: ?>
		<h4><?= 'Sorry! that test was not found'; ?></h4> &nbsp; <br>
		<a href="<?= ROOT ?>/single_class/<?= $row->class_id ?>?tab=tests">
			<input class="btn btn-danger" type="button" value="Back">
		</a>
	<?php endif ?>

</div>