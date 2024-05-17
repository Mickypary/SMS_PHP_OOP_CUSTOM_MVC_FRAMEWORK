<!-- Nav search -->
	<nav class="navbar bg-body-tertiary">
	  <form class="form-inline">
	    <div class="input-group">
	      <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
	      <input type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="basic-addon1">
	    </div>
	  </form>

	  <!-- add new user -->
		<a href="<?= ROOT ?>/single_class/testadd/<?= $row->class_id ?>?tab=test-add">
			<button class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>Add Test</button>
		</a>
	</nav>


	<table class="table table-striped table-hover">
		<tr>
			<th></th>
			<th>Test Name</th>
			<th>Created by</th>
			<th>Active</th>
			<th>Date Created</th>
			<th>
						
			</th>
		</tr>

	<?php if(isset($tests) && $tests): ?>
		<?php foreach ($tests as $key => $test): ?>
			<tr>
				<td>
					<a href="<?= ROOT ?>/single_test/<?= $test->test_id ?>">
						<button class="btn btn-sm btn-primary" autofocus><i class="fa fa-chevron-right"></i></button>
					</a>	
				</td>
				<td><?= $test->test ?></td>
				<td><?= $test->user->firstname ?> <?= $row->user->lastname ?></td>
				<?php $active = $test->disabled ? 'No' : 'Yes'; ?>
				<td><?= $active ?></td>
				<td><?= format_date($test->date) ?></td>
				<td>
					<?php if (Auth::access('lecturer')): ?>
					<a href="<?= ROOT ?>/single_class/edit_test/<?= $row->class_id ?>/<?= $test->test_id ?>?tab=tests">
						<button class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></button>
					</a>
					<a href="<?= ROOT ?>/single_class/delete_test/<?= $row->class_id ?>/<?= $test->test_id ?>?tab=tests" id="delete">
						<!-- <i class="fa fa-trash-alt"></i> -->
						<button class="btn btn-sm btn-danger"><i class="fa fa-trash-alt"></i></button>
					</a>
					<?php endif ?>			
				</td>
			</tr>
		<?php endforeach ?>
	<?php else: ?>
		<tr style="text-align: center;" >
			<td colspan="6"><h4><?= 'No record found'; ?></h4></td>
		</tr>
		
	<?php endif ?>
	</table>
	