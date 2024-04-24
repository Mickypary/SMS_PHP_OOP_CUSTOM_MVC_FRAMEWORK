<?php $this->load_view('includes/header'); ?>

		<div class="container-fluid">
			<div class="p-4 mx-auto shadow rounded" style="margin-top: 50px; width: 100%; max-width: 340px;">
				<h2 class="text-center">My School</h2>
				<img src="<?= ROOT ?>/assets/logo.png" class="border border-primary d-block mx-auto rounded-circle"  style="width: 100px;">
				<h3>Login</h3>

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

				<form method="POST" action="">
					<input type="email" name="email" value="<?= input_val('email'); ?>" class="my-2 form-control" placeholder="Email" autofocus>
					<input type="password" name="password" value="<?= input_val('password'); ?>" class="my-2 form-control" placeholder="Password">
					<button type="submit" class="btn btn-primary" >Login</button>
				</form>
			</div>
		</div>

<?php $this->load_view('includes/footer'); ?>
	