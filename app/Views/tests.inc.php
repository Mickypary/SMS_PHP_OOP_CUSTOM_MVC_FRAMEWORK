<div class="card-group justify-content-center">


	<table class="table table-striped table-hover">
		<tr>
			<th></th>
			<th>Test Name</th>
			<th>Created by</th>
			<th>Active</th>
			<th>Date</th>
			<th>
						
			</th>
		</tr>

	<?php if(isset($rows) && $rows): ?>
		<?php foreach ($rows as $key => $row): ?>
			<tr>
				<td>
					<a href="<?= ROOT ?>/tests/<?= $row->class_id ?>">
						<button class="btn btn-sm btn-primary" autofocus><i class="fa fa-chevron-right"></i></button>
					</a>	
				</td>
				<td><?= $row->test ?></td>
				<td><?= $row->user->firstname ?> <?= $row->user->lastname ?></td>
				
				<?php $active = $row->disabled ? 'No' : 'Yes'; ?>
				<td><?= $active ?></td>
				<td><?= format_date($row->date) ?></td>
				<td>
					<?php if (Auth::access('lecturer')): ?>
					<a href="<?= ROOT ?>/tests/edit/<?= $row->test_id ?>">
						<button class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></button>
					</a>
					<a href="<?= ROOT ?>/tests/delete/<?= $row->test_id ?>" id="delete">
						<!-- <i class="fa fa-trash-alt"></i> -->
						<button class="btn btn-sm btn-danger"><i class="fa fa-trash-alt"></i></button>
					</a>
					<?php endif ?>			
				</td>
			</tr>
		<?php endforeach ?>
	<?php else: ?>
		<tr style="text-align: center;" >
			<td colspan="5"><h4><?= 'No record found'; ?></h4></td>
		</tr>
		
	<?php endif ?>
	</table>

</div>