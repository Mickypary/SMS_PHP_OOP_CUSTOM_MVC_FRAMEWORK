<?php $this->load_view('includes/header'); ?>
<?php $this->load_view('includes/nav'); ?>


		<div class="container-fluid p-4 shadow mx-auto" style="max-width: 1000px">
			<!-- Breadcrumbs -->
			<?php $this->load_view('includes/crumbs',['crumbs' => $crumbs]); ?>

			<?php if ($row): ?>
				<div class="row">
					<center><h4><?= esc(ucwords($row->test)) ?></h4></center>
					<table class="table table-bordered table-hover table-striped">
						<tr>
							<th>Created By</th>
							<td><?= esc($row->user->firstname) ?> <?= esc($row->user->lastname) ?></td>
							<th>Date Created</th>
							<td><?= format_date(esc($row->date)) ?></td>
							<td>
								<a href="<?= ROOT ?>/single_class/<?= $row->class_id ?>?tab=tests">
									<button class="btn btn-sm btn-primary"><i class="fa fa-eye"></i>View Class</button>
								</a>
							</td>
						</tr>
						<?php $active = $row->disabled ? 'No' : 'Yes'; ?>
						<tr>
							<td><b>Active: </b><?= $active; ?></td>
							<td colspan="4"><b>Test Description: </b><br><?= esc($row->description) ?></td>	
						</tr>
					</table>
				</div> <!-- End 1st row -->

				

				<?php

					switch ($page_tab) {
						case 'view':
							// code...
						if (Auth::access('admin') && Auth::i_own_content($row)):
							include(views_path('inc/test_tab_view'));
				 		endif;
							break;

						case 'add_subjective':
							// code...
						include(views_path('inc/test_tab_add_subjective'));
							break;

						case 'add_multiple':
							// code...
						include(views_path('inc/test_tab_add_multiple'));
							break;

						case 'add_objective':
							// code...
						include(views_path('inc/test_tab_add_objective'));
							break;

						case 'edit':
							// code...
						include(views_path('inc/test_tab_lecturers_edit'));
							break;

						case 'delete':
							// code...
						include(views_path('inc/test_tab_lecturers_delete'));
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
	