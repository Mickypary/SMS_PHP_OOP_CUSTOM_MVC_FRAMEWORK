<div class="card-group justify-content-center">


	<table class="table table-striped table-hover">
		<tr>
			<th></th>
			<th>Class Name</th>
			<th>Created by</th>
			<th>Date</th>
			<th>
						
			</th>
		</tr>

	<?php if(isset($rows) && $rows): ?>
		<?php foreach ($rows as $key => $row): ?>
			<tr>
				<td>
					<a href="<?= ROOT ?>/single_class/<?= $row->class_id ?>">
						<button class="btn btn-sm btn-primary" autofocus><i class="fa fa-chevron-right"></i></button>
					</a>	
				</td>
				<td><?= $row->class ?></td>
				<td><?= $row->user->firstname ?> <?= $row->user->lastname ?></td>
				<td><?= format_date($row->date) ?></td>
				<td>
					<?php if (Auth::access('lecturer')): ?>
					<a href="<?= ROOT ?>/classes/edit/<?= $row->id ?>">
						<button class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></button>
					</a>
					<a href="<?= ROOT ?>/classes/delete/<?= $row->id ?>" id="delete">
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