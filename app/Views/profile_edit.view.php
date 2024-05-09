<?php $this->load_view('includes/header'); ?>
<?php $this->load_view('includes/nav'); ?>


	<div class="container-fluid p-4 shadow mx-auto" style="max-width: 1000px">
		<center><h4>Edit Profile</h4></center>
		<!-- Breadcrumbs -->
		<?php $this->load_view('includes/crumbs',['crumbs' => $crumbs]); ?>

		<?php if ($row): ?>
			<div class="row">
				<!-- left col -->
				<div class="col-sm-4 col-md-3"> 
					<?php
					   $image = $row->profile_photo;
					   $gender = $row->gender;

					?>
						<img src="<?= get_image($image, $gender) ?>" class="border d-block mx-auto" style="width: 150px;">
						<br>
					
					<?php if (Auth::access('admin') || Auth::i_own_content($row)): ?>
					<center>
							<button class="btn btn-sm btn-primary">Browse Image</button>
					</center>
					<?php endif ?>
				</div>
				<!-- Right Col -->
				<div class="col-sm-8 col-md-9 bg-light p-2">
					<form method="POST" action="">
						<div class="p-4 mx-auto shadow rounded">
							<div class="row"> <!-- Right Col Inner Row -->
						
							
								<div class="col-sm-5 col-md-6 bg-light p-2">
									<input type="hidden" name="signup">
									<input type="text" name="firstname" value="<?= input_val('firstname',$row->firstname); ?>" class="my-2 form-control" placeholder="First Name" autofocus>
									<input type="text" name="lastname" value="<?= input_val('lastname', $row->lastname); ?>" class="my-2 form-control" placeholder="Last Name" autofocus>
									<input type="email" name="email" value="<?= input_val('email', $row->email); ?>" class="my-2 form-control" placeholder="Email" autofocus>
									<select name="gender" class="my-2 form-control">
										<option value="" <?= select_val('gender','') ?>>--Select Gender--</option>
										<option value="male" <?= $row->gender == 'male' ? 'selected' : '' ?> <?= select_val('gender','male') ?>>Male</option>
										<option value="female" <?= $row->gender == 'female' ? 'selected' : '' ?> <?= select_val('gender','female') ?>>Female</option>					
									</select>

									<select name="rank" class="my-2 form-control">
										<option value="" <?= select_val('rank','') ?>>--Select Rank--</option>
										<option value="student" <?= $row->rank == 'student' ? 'selected' : '' ?> <?= select_val('rank','student') ?> >Student</option>
										<option value="reception" <?= $row->rank == 'reception' ? 'selected' : '' ?> <?= select_val('rank','reception') ?>>Reception</option>
										<option value="lecturer" <?= $row->rank == 'lecturer' ? 'selected' : '' ?> <?= select_val('rank','lecturer') ?>>Lecturer</option>
										<option value="admin" <?= $row->rank == 'admin' ? 'selected' : '' ?> <?= select_val('rank','admin') ?>>Admin</option>
										<?php if (Auth::getRank() == "super_admin"): ?>
											<option value="super_admin" <?= $row->rank == 'super_admin' ? 'selected' : '' ?> <?= select_val('rank','super_admin') ?>>Super Admin</option>	
										<?php endif; ?>					
									</select>
									<input type="text" name="password" value="<?= input_val('password'); ?>" class="my-2 form-control" placeholder="Password">
									<input type="text" name="password2" value="<?= input_val('password2'); ?>" class="my-2 form-control" placeholder="Retype Password">
									
									</div>

									<div class="col-sm-5 col-md-6 bg-light p-2"> <!-- Start Second Inner Col -->

										<!-- <input type="hidden" name="signup">
										<input type="text" name="firstname" value="<?= input_val('firstname',$row->firstname); ?>" class="my-2 form-control" placeholder="First Name" autofocus> -->


									</div> <!-- End Second Inner Col -->

									<div>
										<!-- Save Bio -->
										<button type="submit" class="btn btn-primary float-end" >Update Bio</button>
										<!-- Back button -->
										<a href="<?=ROOT?>/profile/<?= $row->user_id ?>">
											<button type="button" class="btn btn-danger" >Back to Profile</button>
										</a>
									</div>

										

								</div>
						
							</div>

						</form>
					</div> <!-- End Right Col -->
				</div> <!-- End 1st row -->
		
		<br>

		<!-- Back button -->
		<!-- <a href="<?=ROOT?>/profile/<?= $row->user_id ?>">
			<button class="btn btn-sm btn-info text-white">Back to profile</button>
		</a>	

		<button class="btn btn-sm btn-success text-white float-end">Update Bio</button> -->

		<?php else: ?>
			<h4 style="text-align: center"><?= 'No record found'; ?></h4>
		<?php endif ?>

	</div>

<?php $this->load_view('includes/footer'); ?>
	


	<div class="p-4 mx-auto shadow rounded">

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
								<input type="text" name="firstname" value="<?= input_val('firstname',$row->firstname); ?>" class="my-2 form-control" placeholder="First Name" autofocus>
								<input type="text" name="lastname" value="<?= input_val('lastname', $row->lastname); ?>" class="my-2 form-control" placeholder="Last Name" autofocus>
								<input type="email" name="email" value="<?= input_val('email', $row->email); ?>" class="my-2 form-control" placeholder="Email" autofocus>
								<select name="gender" class="my-2 form-control">
									<option value="" <?= select_val('gender','') ?>>--Select Gender--</option>
									<option value="male" <?= $row->gender == 'male' ? 'selected' : '' ?> <?= select_val('gender','male') ?>>Male</option>
									<option value="female" <?= $row->gender == 'female' ? 'selected' : '' ?> <?= select_val('gender','female') ?>>Female</option>					
								</select>

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
								<input type="text" name="password" value="<?= input_val('password'); ?>" class="my-2 form-control" placeholder="Password">
								<input type="text" name="password2" value="<?= input_val('password2'); ?>" class="my-2 form-control" placeholder="Retype Password">
								<!-- Save Bio -->
								<button type="submit" class="btn btn-primary float-end" >Update Bio</button>
								<!-- Back button -->
									<a href="<?=ROOT?>/profile/<?= $row->user_id ?>">
										<button type="button" class="btn btn-danger" >Back to Profile</button>
									</a>	
							</form>
						</div>