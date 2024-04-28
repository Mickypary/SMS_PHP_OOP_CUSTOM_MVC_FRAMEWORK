<?php $this->load_view('includes/header'); ?>
<?php $this->load_view('includes/nav'); ?>


		<div class="container-fluid p-4 shadow mx-auto" style="max-width: 1000px">
			<!-- Breadcrumbs -->
			<?php $this->load_view('includes/crumbs',['crumbs' => $crumbs]); ?>

			<?php if ($row): ?>
				<div class="row">
					<center><h4><?= esc(ucwords($row->class)) ?></h4></center>
					<table class="table table-bordered table-hover table-striped">
						<tr>
							<th>Class Name</th>
							<td><?= esc(ucwords($row->class)) ?></td>
						</tr>
						<tr>
							<th>Created By</th>
							<td><?= esc($row->user->firstname) ?> <?= esc($row->user->lastname) ?></td>
						</tr>
						<tr>														
							<th>Date Created</th>
							<td><?= format_date(esc($row->date)) ?></td>
						</tr>
					</table>
				</div> <!-- End 1st row -->
			
			<br>

				<ul class="nav nav-tabs">
				  <li class="nav-item">
				    <a class="nav-link active" aria-current="page" href="#">Lecturers</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" href="#">Students</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" href="#">Tests</a>
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

			<?php else: ?>
				<h4 style="text-align: center"><?= 'No record found'; ?></h4>
			<?php endif ?>

		</div>

<?php $this->load_view('includes/footer'); ?>
	