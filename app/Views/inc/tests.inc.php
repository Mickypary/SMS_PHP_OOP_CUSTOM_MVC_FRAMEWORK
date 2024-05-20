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

	<?php if(isset($test_rows) && $test_rows): ?>
		<?php foreach ($test_rows as $key => $row): ?>
			<tr>
				<td>
					<a href="<?= ROOT ?>/single_test/<?= $row->test_id ?>">
						<button class="btn btn-sm btn-primary" autofocus><i class="fa fa-chevron-right"></i></button>
					</a>	
				</td>
				<td><?= $row->test ?></td>
				<td><?= $row->user->firstname ?> <?= $row->user->lastname ?></td>

				<?php $active = $row->disabled ? 'No' : 'Yes'; ?>
				<td><?= $active ?></td>
				<td><?= format_date($row->date) ?></td>
				<td>
					<?php if (can_take_test($row->test_id)): ?>
						<a href="<?= ROOT ?>/take_test/<?= $row->test_id ?>">
							<button class="btn btn-sm btn-primary"><i class="fa fa-edit"></i>Attempt Test</button>
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