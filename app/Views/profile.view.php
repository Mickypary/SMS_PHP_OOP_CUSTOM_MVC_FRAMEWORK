<?php $this->load_view('includes/header'); ?>
<?php $this->load_view('includes/nav'); ?>


		<div class="container-fluid p-4 shadow mx-auto" style="max-width: 1000px">
			<!-- Breadcrumbs -->
			<?php $this->load_view('includes/crumbs',['crumbs' => $crumbs]); ?>

			<?php if ($row): ?>
				<div class="row">
					<div class="col-sm-4 col-md-3"> 
						<?php
						   $image = $row->profile_photo;
						   $gender = $row->gender;

						?>
							<img src="<?= get_image($image, $gender) ?>" class="border border-primary d-block mx-auto rounded-circle" style="width: 150px;">
						
						<h3 class="text-center"><?= esc($row->firstname) ?> <?= esc($row->lastname) ?></h3>
					</div>
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
				    <a class="nav-link active" aria-current="page" href="#">Basic Info</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" href="#">Class</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" href="#">Test</a>
				  </li>
				</ul>

				<!-- Nav search -->
				<nav class="navbar bg-body-tertiary">
				  <form class="form-inline">
				    <div class="input-group">
				      <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
				      <input type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="basic-addon1">
				    </div>
				  </form>
				</nav>
				
			</div>

			<?php else: ?>
				<h4 style="text-align: center"><?= 'No record found'; ?></h4>
			<?php endif ?>

		</div>

<?php $this->load_view('includes/footer'); ?>
	