<?php $this->load_view('includes/header'); ?>
<?php $this->load_view('includes/nav'); ?>

	<div class="container-fluid p-4 shadow mx-auto" style="max-width: 1000px">
		<!-- Breadcrumbs -->
		<?php $this->load_view('includes/crumbs'); ?>

		<div class="card-group justify-content-center">
			<table class="table table-striped table-hover">
				<tr>
					<th>School</th>
					<th>Created by</th>
					<th>Date</th>
					<th>
						<a href="<?= ROOT ?>/schools/add">
							<button class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>Add New</button>
						</a>
					</th>
				</tr>
			<?php if($rows): ?>
				<?php foreach ($rows as $key => $row): ?>
					<tr>
						<td><?= $row->school ?></td>
						<td><?= $row->user->firstname ?> <?= $row->user->lastname ?></td>
						<td><?= format_date($row->date) ?></td>
						<td>
							<a href="<?= ROOT ?>/schools/edit/<?= $row->id ?>">
								<button class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></button>
							</a>
							<a href="">
								<button class="btn btn-sm btn-danger"><i class="fa fa-trash-alt"></i></button>
							</a>				
						</td>
					</tr>
				<?php endforeach ?>
			<?php else: ?>
				<h4><?= 'No record found'; ?></h4>
			<?php endif ?>
			</table>
		</div>
		

	</div>

<?php $this->load_view('includes/footer'); ?>
	