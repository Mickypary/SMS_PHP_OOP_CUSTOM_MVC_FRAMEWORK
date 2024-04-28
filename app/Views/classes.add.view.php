<?php $this->load_view('includes/header'); ?>
<?php $this->load_view('includes/nav'); ?>

	<div class="container-fluid p-4 shadow mx-auto" style="max-width: 1000px">
		<!-- Breadcrumbs -->
		<?php $this->load_view('includes/crumbs',['crumbs' => $crumbs]); ?>

		<div class="card-group justify-content-center">
			<form method="POST" action="">
				<h3>Add New Class</h3>
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
				<input class="form-control" value="<?= input_val('class') ?>" type="text" name="class" placeholder="Class Name" autofocus><br>
				<input class="btn btn-primary float-end" type="submit" value="Add">
				<a href="<?= ROOT ?>/classes">
					<input class="btn btn-danger" type="button" value="Cancel">
				</a>
				
			</form>
		</div>
		

	</div>

<?php $this->load_view('includes/footer'); ?>
	