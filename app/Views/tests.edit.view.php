<?php $this->load_view('includes/header'); ?>
<?php $this->load_view('includes/nav'); ?>

<div class="container-fluid p-4 shadow mx-auto" style="max-width: 1000px">


	<div class="card-group justify-content-center">
		<?php if (isset($row) && is_object($row)): ?>
			
		<form method="POST" action="<?= ROOT ?>/tests/update/<?= $row->id ?>">
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

			<input class="form-control" value="<?= input_val('test', $row->test) ?>" type="text" name="test" placeholder="Test Title" autofocus><br>
			<textarea name="description" placeholder="Add a description for this test" class="form-control mb-2"><?= input_val('description', $row->description) ?></textarea>

			<div class="mb-2">
				<input type="radio" name="disabled" value="0" <?= !$row->disabled ? 'checked' : '' ?>  > Active |
				<input type="radio" name="disabled" value="1" <?= $row->disabled ? 'checked' : '' ?>  > Disabled
			</div>
			
			<input class="btn btn-primary float-end" type="submit" value="Update">
			<a href="<?= ROOT ?>/tests">
				<input class="btn btn-danger" type="button" value="Cancel">
			</a>
			
		</form>
		<?php else: ?>
			<h4><?= 'Sorry! that test was not found'; ?></h4> &nbsp; <br>
			<a href="<?= ROOT ?>/tests/<?= $row->test_id ?>?tab=tests">
				<input class="btn btn-danger" type="button" value="Back">
			</a>
		<?php endif ?>

	</div>

</div>

<?php $this->load_view('includes/footer'); ?>