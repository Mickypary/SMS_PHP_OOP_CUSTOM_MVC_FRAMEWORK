
<nav class="navbar">

	<center><h5>Add Test Questions</h5></center>

	<div class="btn-group">
	  <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
	    <i class="fa fa-bars"></i>Add
	  </button>
	  <ul class="dropdown-menu dropdown-menu-end">
	    <li><a class="dropdown-item" href="<?= ROOT ?>/single_test/add_question/<?= $row->test_id ?>?type=multiple">Multiple Choice Question</a></li>
	    <li><a class="dropdown-item" href="<?= ROOT ?>/single_test/add_question/<?= $row->test_id ?>?type=objective">Objective Question</a></li>
	    <li><hr class="dropdown-divider"></li>
	    <li><a class="dropdown-item" href="<?= ROOT ?>/single_test/add_question/<?= $row->test_id ?>">Subjective Question</a></li>
	  </ul>
	</div>
</nav>

<hr>


<?php if (isset($questions) && is_array($questions)): ?>
		<?php $num  = $total_questions + 1; ?>
<?php foreach ($questions as $question): $num-- ?>
	<div class="card mb-4 shadow">
	  <div class="card-header">
	    <span class="bg-primary text-white p-1 rounded">Question #<?= $num; ?></span> <span class="badge bg-success float-end p-2"><?= date('F jS, Y H:i:s a', strtotime($question->date)) ?></span>
	  </div>
	  <div class="card-body">
	    <h5 class="card-title"><?= esc($question->question); ?></h5>
	    <?php if (file_exists($question->image)): ?>
	    	<img src="<?= ROOT . '/' . $question->image ?>" style="width: 30%;">
	    <?php endif ?>
	    
	    <p class="card-text"><?= esc($question->comment); ?></p>
	    <?php $type = ''; ?>

	    <?php if ($question->question_type  == 'objective'):
	    	$type = '?type=objective';
	     ?>
	    	<p class="card-text"><b>Answer: </b><?= esc($question->correct_answer); ?></p>
	    <?php endif ?>

	    <?php if ($question->question_type  == 'multiple'):
	    	$type = '?type=multiple';
	     ?>
	    	<div class="card" style="width: 18rem;">
			  <div class="card-header">
			    Multiple Choice
			  </div>
			  <ul class="list-group list-group-flush">
			  	<?php $choices = json_decode($question->choices); ?>
			  	<?php foreach ($choices as $key => $value): ?>
			  		<li class="list-group-item"><b><?= $key . ': '; ?></b><?= $value; ?> 
			  		<?php if (trim($key) == trim($question->correct_answer)): ?>
			  			<i class="fa fa-check float-end"></i>
			  		<?php endif ?>
			  		
			  	</li>
			  	<?php endforeach ?>
			    
			  </ul>
			</div>
			<br>
			<p class="card-text"><b>Answer: </b><?= esc($question->correct_answer); ?></p>
	    <?php endif ?>

	    <p class="card-text float-end">
	    	<a href="<?= ROOT ?>/single_test/edit_question/<?= $question->test_id ?>/<?= $question->id ?><?= $type ?>">
	    		<button class="btn btn-info pe-1 text-white"><i class="fa fa-edit"></i></button>
	    	</a>
	    	<a href="<?= ROOT ?>/single_test/delete_question/<?= $question->test_id ?>/<?= $question->id ?>" id="delete">
	    		<button class="btn btn-danger pe-1 text-white"><i class="fa fa-trash-alt"></i></button>
	    	</a>    	
	    </p>
	  </div>
	</div>
<?php endforeach; ?>
<?php endif; ?>

