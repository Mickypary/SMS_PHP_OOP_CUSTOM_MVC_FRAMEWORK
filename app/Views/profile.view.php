<?php $this->load_view('includes/header'); ?>
<?php $this->load_view('includes/nav'); ?>


		<div class="container-fluid p-4 shadow mx-auto" style="max-width: 1000px">
			<!-- Breadcrumbs -->
			<?php $this->load_view('includes/crumbs',['crumbs' => $crumbs]); ?>

			<?php if ($row): ?>
				<div class="row">
					<!-- left col -->
					<div class="col-sm-4 col-md-3"> 
						<?php
						   $image = $row->profile_image;
						   $gender = $row->gender;

						?>
							<img src="<?= get_image($image, $gender) ?>" class="border border-primary d-block mx-auto rounded-circle" style="width: 150px;">
						
						<h3 class="text-center"><?= esc($row->firstname) ?> <?= esc($row->lastname) ?></h3>
						<?php if (Auth::access('admin') || (Auth::access('reception') && $row->rank == 'student')): ?>
						<center>
							<a href="<?=ROOT?>/profile/edit/<?= $row->user_id ?>">
								<button class="btn btn-sm btn-primary">Edit Profile</button>
							</a>
							<a href="<?=ROOT?>/profile/delete/<?= $row->user_id ?>">
								<button class="btn btn-sm btn-danger">Delete Profile</button>
							</a>	
						</center>
						<?php endif ?>
					</div>
					<!-- Right Col -->
					<div class="col-sm-8 col-md-9 bg-light p-2">
						<table class="table table-bordered table-hover table-striped">
							<tr>
								<th>First Name</th>
								<td><?= esc($row->firstname) ?></td>
							</tr>
							<tr>
								<th>Last Name</th>
								<td><?= esc($row->lastname) ?></td>
							</tr>
							<?php if ($row->rank == 'student'): ?>
							<tr>
								<th>Class</th>
								<td><?= esc($row->class) ?></td>
							</tr>
							<?php endif ?>
							
							<tr>
								<th>Email</th>
								<td><?= esc($row->email) ?></td>
							</tr>
							<tr>														
								<th>Rank</th>
								<td><?= ucwords(str_replace("_", " ", esc($row->rank))); ?></td>
							</tr>
							<tr>														
								<th>Gender</th>
								<td><?= ucfirst(esc($row->gender)) ?></td>
							</tr>
							<tr>														
								<th>Date Created</th>
								<td><?= format_date(esc($row->date)) ?></td>
							</tr>
						</table>
					</div>
				</div> <!-- End 1st row -->
			
			<br>
			<div class="container-fluid">
				<ul class="nav nav-tabs">
				  <li class="nav-item">
				    <a class="nav-link <?= $page_tab == 'info' ? 'active' : '' ?>" aria-current="page" href="<?=ROOT?>/profile/<?= $row->user_id ?>?tab=info">Basic Info</a>
				  </li>
				  <?php if (Auth::access('lecturer') || Auth::i_own_content($row)): ?>
				  	  <li class="nav-item">
				    	<a class="nav-link <?= $page_tab == 'classes' ? 'active' : '' ?>" href="<?=ROOT?>/profile/<?= $row->user_id ?>?tab=classes">My Classes</a>
				  	  </li>	  
					  <li class="nav-item">
					    <a class="nav-link <?= $page_tab == 'tests' ? 'active' : '' ?>" href="<?=ROOT?>/profile/<?= $row->user_id ?>?tab=tests">Tests</a>
					  </li>
				  <?php endif ?>
				</ul>


				<?php
				
					switch ($page_tab) {
						case 'info':
							// code...
						include(views_path('inc/profile_tab_info'));
							break;

						case 'classes':
							// code...
						if (Auth::access('lecturer') || Auth::i_own_content($row)) {
							include(views_path('inc/profile_tab_classes'));
						}else {
							include(views_path('inc/access-denied'));
						}
							break;

						case 'tests':
							// code...
						include(views_path('inc/profile_tab_tests'));
							break;
						
						default:
							// code...
							break;
					}





				?>

				<!-- Nav search -->
				
				
			</div>

			<?php else: ?>
				<h4 style="text-align: center"><?= 'No record found'; ?></h4>
			<?php endif ?>

		</div>

<?php $this->load_view('includes/footer'); ?>
	