<center><h5>Add Test Questions</h5></center>

<!-- Example single danger button -->
<nav class="navbar">
	<div class="btn-group">
	  <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
	    <i class="fa fa-bars"></i>Add
	  </button>
	  <ul class="dropdown-menu">
	    <li><a class="dropdown-item" href="<?= ROOT ?>/single_test/multiple<?= $row->test_id ?>">Multiple Choice Question</a></li>
	    <li><a class="dropdown-item" href="<?= ROOT ?>/single_test/addobjective/<?= $row->test_id ?>">Objective Question</a></li>
	    <li><hr class="dropdown-divider"></li>
	    <li><a class="dropdown-item" href="<?= ROOT ?>/single_test/addsubjective/<?= $row->test_id ?>">Subjective Question</a></li>
	  </ul>
	</div>
</nav>
