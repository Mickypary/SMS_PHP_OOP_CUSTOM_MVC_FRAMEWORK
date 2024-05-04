<?php $this->load_view('includes/header'); ?>
<?php $this->load_view('includes/nav'); ?>

<style type="text/css">
	h1 {
		font-size: 80px;
		color: limegreen;
	}
	a {
		text-decoration: none;
	}
	.card-header {
		font-weight: bold;
	}
	.card {
		min-width: 250px;
	}
</style>



		<div class="container-fluid p-4 shadow mx-auto" style="max-width: 1000px">
			<div class="row justify-content-center">

				<?php if (Auth::access('super_admin')): ?>
				<!-- School -->
				<div class="col-3 shadow rounded m-4 border card p-0">
					<a href="<?=ROOT?>/schools">
						<div class="card-header">SCHOOLS</div>
						<h1 class="text-center">
							<i class="fa fa-graduation-cap"></i>
						</h1>
						<div class="card-footer">View all schools</div>
					</a>
				</div>
				<?php endif; ?>
				
				<?php if (Auth::access('admin')): ?>
				<!-- Staff -->			
				<div class="col-3 shadow rounded m-4 border card p-0">
					<a href="<?=ROOT?>/users">
						<div class="card-header">STAFF</div>
						<h1 class="text-center">
							<i class="fa fa-chalkboard-teacher"></i>
						</h1>
						<div class="card-footer">View all staff members</div>
					</a>
				</div>
				<?php endif; ?>
				
				<?php if (Auth::access('reception')): ?>
				<!-- Students -->
				<div class="col-3 shadow rounded m-4 border card p-0">
					<a href="<?=ROOT?>/students">
						<div class="card-header">STUDENTS</div>
						<h1 class="text-center">
							<i class="fa fa-user-graduate"></i>
						</h1>
						<div class="card-footer">View all students</div>
					</a>
				</div>
				<?php endif; ?>
				
				<!-- Classes -->	
				<div class="col-3 shadow rounded m-4 border card p-0">
					<a href="<?=ROOT?>/classes">
						<div class="card-header">CLASSES</div>
						<h1 class="text-center">
							<i class="fa fa-university"></i>
						</h1>
						<div class="card-footer">View all classes</div>
					</a>
				</div>
			
				
				<!-- Tests -->
				<div class="col-3 shadow rounded m-4 border card p-0">
					<a href="<?=ROOT?>/tests">
						<div class="card-header">TESTS</div>
						<h1 class="text-center">
							<i class="fa fa-file-signature"></i>
						</h1>
						<div class="card-footer">View all tests</div>
					</a>
				</div>
				
				<?php if (Auth::access('admin')): ?>
				<!-- Statistics -->
				<div class="col-3 shadow rounded m-4 border card p-0">
					<a href="<?=ROOT?>/statistics">
						<div class="card-header">STATISTICS</div>
						<h1 class="text-center">
							<i class="fa fa-chart-pie"></i>
						</h1>
						<div class="card-footer">View students statistics</div>
					</a>
				</div>
				<?php endif; ?>
				
				<?php if (Auth::access('admin')): ?>
				<!-- Settings -->
				<div class="col-3 shadow rounded m-4 border card p-0">
					<a href="<?=ROOT?>/settings">
						<div class="card-header">SETTINGS</div>
						<h1 class="text-center">
							<i class="fa fa-cogs"></i>
						</h1>
						<div class="card-footer">App Settings</div>
					</a>
				</div>
				<?php endif; ?>
				
				
				<!-- Profile -->
				<div class="col-3 shadow rounded m-4 border card p-0">
					<a href="<?=ROOT?>/profile">
						<div class="card-header">PROFILE</div>
						<h1 class="text-center">
							<i class="fa fa-id-card"></i>
						</h1>
						<div class="card-footer">View your profile</div>
					</a>
				</div>

				<!-- Logout -->
				<div class="col-3 shadow rounded m-4 border card p-0">
					<a href="<?=ROOT?>/logout">
						<div class="card-header">LOGOUT</div>
						<h1 class="text-center">
							<i class="fa fa-sign-out-alt"></i>
						</h1>
						<div class="card-footer">Logout from system</div>
					</a>
				</div>
				
				

			</div>
		</div>

<?php $this->load_view('includes/footer'); ?>
	