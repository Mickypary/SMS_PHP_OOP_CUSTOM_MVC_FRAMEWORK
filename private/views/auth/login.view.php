<?php $this->view('includes/header'); ?>

		<div class="container-fluid">
			<div class="p-4 mx-auto shadow rounded" style="margin-top: 50px; width: 100%; max-width: 340px;">
				<h2 class="text-center">My School</h2>
				<img src="<?= ROOT ?>/assets/logo.png" class="border border-primary d-block mx-auto rounded-circle"  style="width: 100px;">
				<h3>Login</h3>
				<form>
					<input type="email" name="email" class="form-control" placeholder="Email" autofocus>
					<br>
					<input type="password" name="password" class="form-control" placeholder="Password">
					<br>
					<button type="submit" class="btn btn-primary" >Login</button>
				</form>
			</div>
		</div>

<?php $this->view('includes/footer'); ?>
	