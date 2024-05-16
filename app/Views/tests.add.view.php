<?php $this->load_view('includes/header'); ?>
<?php $this->load_view('includes/nav'); ?>

<div class="container-fluid p-4 shadow mx-auto" style="max-width: 1000px">


	<div class="card-group justify-content-center">
			
		<form method="POST" action="<?= ROOT ?>/tests/add">
			<h3>Add Test</h3>

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

			<input class="form-control" value="<?= input_val('test') ?>" type="text" name="test" placeholder="Test Title" autofocus><br>
			<textarea name="description" placeholder="Add a description for this test" class="form-control mb-2"></textarea>

			<div class="mb-2">
				<input type="radio" name="disabled" value="0"  > Active |
				<input type="radio" name="disabled" value="1"  > Disabled
			</div>
			
			<input class="btn btn-primary float-end" type="submit" value="Add">
			<a href="<?= ROOT ?>/tests">
				<input class="btn btn-danger" type="button" value="Cancel">
			</a>
			
		</form>

	</div>

</div>

<?php $this->load_view('includes/footer'); ?>