<form method="POST" action="" class="form mx-auto" style="width: 100%; max-width: 400px;">
	<br><h4>Add Lecturer</h4>
	<input autofocus type="text" class="form-control" name="name" placeholder="Lecturer Name">
	<br>
	<a href="<?= ROOT ?>/single_class/<?= $row->class_id ?>?tab=lecturers">
		<button type="button" class="btn btn-danger">Cancel</button>
	</a>
	<button name="search" class="btn btn-primary float-end">Search</button>
	<div class="clearfix"></div>
</form>


<!-- Search Result panel -->
<div class="container-fluid">

	<?php if(isset($results) && $results): ?>
		<table class="table table-striped table-hover">
			<tr>
				<th>Name</th>
				<th>Action</th>
			</tr>
			<?php foreach ($results as $key => $row): ?>

				<tr>
					<td><?= $row->firstname ?> <?= $row->lastname ?></td>
					<td>
						<button class="btn btn-sm btn-primary">Add</button>
					</td>
				</tr>
			
			<?php endforeach ?>	
		</table>
	<?php else: ?>
		<?php if (count($_POST) > 0): ?>
			<center><hr><h4><?= 'No record found'; ?></h4></center>
		<?php endif ?>
		
	<?php endif ?>
</div>