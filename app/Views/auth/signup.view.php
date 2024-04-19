<?php $this->view('includes/header'); ?>

		<div class="container-fluid">
			<div class="p-4 mx-auto shadow rounded" style="margin-top: 50px; width: 100%; max-width: 340px;">
				<h2 class="text-center">My School</h2>
				<img src="<?= ROOT ?>/assets/logo.png" class="border border-primary d-block mx-auto rounded-circle"  style="width: 100px;">
				<h3>Add User</h3>
				<form method="POST" action="">
					<input type="text" name="firstname" class="my-2 form-control" placeholder="First Name" autofocus>
					<input type="text" name="lastname" class="my-2 form-control" placeholder="Last Name" autofocus>
					<input type="email" name="email" class="my-2 form-control" placeholder="Email" autofocus>
					<select name="gender" class="my-2 form-control">
						<option value="">--Select Gender--</option>
						<option value="male">Male</option>
						<option value="female">Female</option>					
					</select>
					<select name="rank" class="my-2 form-control">
						<option value="">--Select Rank--</option>
						<option value="student">Student</option>
						<option value="reception">Reception</option>
						<option value="super_admin">Lecturer</option>
						<option value="admin">Admin</option>
						<option value="super_admin">Super Admin</option>					
					</select>
					<input type="text" name="password" class="my-2 form-control" placeholder="Password">
					<input type="text" name="password2" class="my-2 form-control" placeholder="Retype Password">
					<button type="submit" class="btn btn-primary float-end" >Add User</button>
					<button type="button" class="btn btn-danger" >Cancel</button>
				</form>
			</div>
		</div>

<?php $this->view('includes/footer'); ?>
	