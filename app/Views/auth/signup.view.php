<?php $this->load_view('includes/header'); ?>

	<div class="container-fluid">
		<div class="p-4 mx-auto shadow rounded" style="margin-top: 50px; width: 100%; max-width: 340px;">
			<h2 class="text-center">My School</h2>
			<img src="<?= ROOT ?>/assets/logo.png" class="border border-primary d-block mx-auto rounded-circle"  style="width: 100px;">

			<h3>Add User</h3>

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

			<form method="POST" action="">
				<input type="hidden" name="signup">
				<input type="text" name="firstname" value="<?= input_val('firstname'); ?>" class="my-2 form-control" placeholder="First Name" autofocus>
				<input type="text" name="lastname" value="<?= input_val('lastname'); ?>" class="my-2 form-control" placeholder="Last Name" autofocus>
				<input type="email" name="email" value="<?= input_val('email'); ?>" class="my-2 form-control" placeholder="Email" autofocus>
				<select name="gender" class="my-2 form-control">
					<option value="" <?= select_val('gender','') ?>>--Select Gender--</option>
					<option value="male" <?= select_val('gender','male') ?>>Male</option>
					<option value="female" <?= select_val('gender','female') ?>>Female</option>					
				</select>
				<?php if (($mode == 'students')): ?>
					<input type="hidden" name="rank" value="student">
				<?php else: ?>
				<select name="rank" class="my-2 form-control">
					<option value="" <?= select_val('rank','') ?>>--Select Rank--</option>
					<option value="student" <?= select_val('rank','student') ?> >Student</option>
					<option value="reception" <?= select_val('rank','reception') ?>>Reception</option>
					<option value="lecturer" <?= select_val('rank','lecturer') ?>>Lecturer</option>
					<option value="admin" <?= select_val('rank','admin') ?>>Admin</option>
					<?php if (Auth::getRank() == "super_admin"): ?>
						<option value="super_admin" <?= select_val('rank','super_admin') ?>>Super Admin</option>	
					<?php endif; ?>					
				</select>
				<?php endif ?>
				<input type="text" name="password" value="<?= input_val('password'); ?>" class="my-2 form-control" placeholder="Password">
				<input type="text" name="password2" value="<?= input_val('password2'); ?>" class="my-2 form-control" placeholder="Retype Password">
				<button type="submit" class="btn btn-primary float-end" >Add User</button>
				<?php if ($mode == 'users'): ?>
					<a href="<?= ROOT ?>/users">
						<button type="button" class="btn btn-danger" >Cancel</button>
					</a>
				<?php else: ?>
					<a href="<?= ROOT ?>/students">
						<button type="button" class="btn btn-danger" >Cancel</button>
					</a>
				<?php endif ?>
				
			</form>
		</div>
	</div>

<?php $this->load_view('includes/footer'); ?>
	