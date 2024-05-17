
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
	    <span class="bg-primary text-white p-1 rounded">Question #<?= $num; ?></span>
	  </div>
	  <div class="card-body">
	    <h5 class="card-title">Special title treatment</h5>
	    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
	  </div>
	  <div class="card-footer text-body-secondary">
	    <?= date('F jS, Y H:i:s a') ?>
	  </div>
	</div>
<?php endforeach; ?>
<?php endif; ?>

