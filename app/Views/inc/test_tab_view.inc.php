
<nav class="navbar">

	<center><h5>Add Test Questions</h5></center>

	<div class="btn-group">
	  <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
	    <i class="fa fa-bars"></i>Add
	  </button>
	  <ul class="dropdown-menu dropdown-menu-end">
	    <li><a class="dropdown-item" href="<?= ROOT ?>/single_test/multiple<?= $row->test_id ?>">Multiple Choice Question</a></li>
	    <li><a class="dropdown-item" href="<?= ROOT ?>/single_test/addobjective/<?= $row->test_id ?>">Objective Question</a></li>
	    <li><hr class="dropdown-divider"></li>
	    <li><a class="dropdown-item" href="<?= ROOT ?>/single_test/addsubjective/<?= $row->test_id ?>">Subjective Question</a></li>
	  </ul>
	</div>
</nav>

<hr>


<?php if (isset($questions) && is_array($questions)): ?>
		<?php $num  = 0; ?>
<?php foreach ($questions as $question): $num++ ?>
	<div class="card mb-4 shadow">
	  <div class="card-header">
	    <span class="bg-primary text-white p-1 rounded">Question #<?= $num; ?></span> <span class="badge bg-success"><?= date('F jS, Y H:i:s a') ?></span>
	  </div>
	  <div class="card-body">
	    <h5 class="card-title"><?= esc($question->question); ?></h5>
	    <p class="card-text">1 Point</p>
	  </div>
	</div>
<?php endforeach; ?>
<?php endif; ?>

