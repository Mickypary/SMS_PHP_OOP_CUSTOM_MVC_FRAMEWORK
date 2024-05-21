
<nav class="navbar">

	<center><h5>Add Test Questions</h5></center>

	<!-- <div class="btn-group">
	  <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
	    <i class="fa fa-bars"></i>Add
	  </button>
	  <ul class="dropdown-menu dropdown-menu-end">
	    <li><a class="dropdown-item" href="<?= ROOT ?>/single_test/add_question/<?= $row->test_id ?>?type=multiple">Multiple Choice Question</a></li>
	    <li><a class="dropdown-item" href="<?= ROOT ?>/single_test/add_question/<?= $row->test_id ?>?type=objective">Objective Question</a></li>
	    <li><hr class="dropdown-divider"></li>
	    <li><a class="dropdown-item" href="<?= ROOT ?>/single_test/add_question/<?= $row->test_id ?>">Subjective Question</a></li>
	  </ul>
	</div> -->
</nav>

<hr>


<?php if (isset($questions) && is_array($questions)): ?>

<form method="POST" action="">
		<?php $num  = 0; ?>
	<?php foreach ($questions as $question): $num++ ?>
		<div class="card mb-4">
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

		    <?php endif ?>

		    <?php if ($question->question_type  == 'multiple'):
		    	$type = '?type=multiple';
		     ?>
		    	<div class="card" style="width: 18rem;">
				  <div class="card-header">
				    Select your answer
				  </div>
				  <ul class="list-group list-group-flush">
				  	<?php $choices = json_decode($question->choices); ?>
				  	<?php foreach ($choices as $key => $value): ?>
				  		<li class="list-group-item"><b><?= $key . ': '; ?></b><?= $value; ?> 
				  			
				  			<input type="radio" style="transform: scale(1.5); cursor: pointer;" name="<?= $question->id ?>" value="<?= $key ?>" class="float-end" >
				  		
				  		</li>
				  	<?php endforeach ?>
				    
				  </ul>
				</div>
				<br>

		    <?php endif ?>

		    <?php if ($question->question_type  != 'multiple'): ?>
		    	<input type="text" class="form-control" name="<?= $question->id ?>" placeholder="Type your answer here">
		   	<?php endif; ?>

		  </div>

		</div>
	<?php endforeach; ?>
	
	<center><button class="btn btn-primary">Submit Test</button></center>

</form>

<?php endif; ?>

