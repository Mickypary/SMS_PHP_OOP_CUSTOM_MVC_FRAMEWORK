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
				    <a class="nav-link <?= $page_tab == 'lecturers' ? 'active' : ''; ?>" aria-current="page" href="<?= ROOT ?>/single_class/<?= $row->class_id ?>?tab=lecturers">Lecturers</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link <?= $page_tab == 'students' ? 'active' : ''; ?>" href="<?= ROOT ?>/single_class/<?= $row->class_id ?>?tab=students">Students</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link <?= $page_tab == 'tests' ? 'active' : '' ?>" href="<?= ROOT ?>/single_class/<?= $row->class_id ?>?tab=tests">Tests</a>
				  </li>
				</ul>

				

				<?php

					switch ($page_tab) {
						case 'lecturers':
							// code...
						include(views_path('class_tab_lecturers'));
							break;

						case 'students':
							// code...
						include(views_path('class_tab_students'));
							break;

						case 'tests':
							// code...
						include(views_path('class_tab_tests'));
							break;

						case 'lecturers-add':
							// code...
						include(views_path('class_tab_lecturers_add'));
							break;

						case 'students-add':
							// code...
						include(views_path('class_tab_students_add'));
							break;

						case 'tests-add':
							// code...
						include(views_path('class_tab_tests_add'));
							break;
						
						default:
							// code...
							break;
					}


				?>

			<?php else: ?>
				<h4 style="text-align: center"><?= 'No record found'; ?></h4>
			<?php endif ?>

		</div>

<?php $this->load_view('includes/footer'); ?>
	