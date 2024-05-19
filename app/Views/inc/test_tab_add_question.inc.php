<?php $quest_type = 'Subjective' ?>

<?php if (isset($_GET['type']) && $_GET['type'] == 'objective'): ?>
	<?php $quest_type = 'Objective' ?>
<?php elseif(isset($_GET['type']) && $_GET['type'] == 'multiple'): ?>
	<?php $quest_type = 'Multiple Choice' ?>
<?php endif ?>

<center><h5><?= 'Add ' . $quest_type . ' Question' ?></h5></center>

<form method="POST" action="" enctype="multipart/form-data">

	<!-- Alert Start using array data -->
			<?php if(count($errors) > 0): ?>
				<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<strong>Errors!:</strong> <br>
					<?php foreach ($errors as $key => $error): ?>
						<?= $error ."<br>" ?>
					<?php endforeach ?>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			<?php endif; ?>
			<!-- Alert End -->
	
	<label>Question:</label>
	<textarea autofocus class="form-control" name="question" placeholder="Type your question here"><?= input_val('question') ?></textarea>
	<div class="input-group mb-3 pt-3">
		<label class="input-group-text" for="inputGroupFile01">Comment(optional)</label>
		<input type="text" name="comment" value="<?= input_val('comment') ?>" class="form-control" placeholder="Comment" id="inputGroupFile01">
	</div>
	
	<div class="input-group mb-3">
	  <label class="input-group-text" for="inputGroupFile02"><i class="fa fa-image"></i>Image(optional)</label>
	  <input type="file" name="image" class="form-control" id="inputGroupFile02">
	</div>

	<?php if (isset($_GET['type']) && $_GET['type'] == 'objective'): ?>
		<div class="input-group mb-3">
		  	<label class="input-group-text" for="inputGroupFile03">Correct Answer</label>
		  	<input type="text" name="correct_answer" value="<?= input_val('correct_answer') ?>" class="form-control" id="inputGroupFile03" placeholder="Enter the correct answer here">
		</div>
	<?php endif ?>

	<?php if (isset($_GET['type']) && $_GET['type'] == 'multiple'): ?>
		<div class="card" style="">
		  <div class="card-header bg-secondary text-white">
		    Multiple Choice Answers <button onclick="add_choice()" type="button" class="btn btn-warning btn-sm float-end"><i class="fa fa-plus"></i>Add Choice</button>
		  </div>

		  <ul class="list-group list-group-flush choice-list">

		  	<?php if (isset($_POST['choice0'])): ?>

		  		<?php


		  			$num = 0;
					$letters = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J'];
					foreach ($_POST as $key => $value) {
						if (strstr($key, 'choice')) {
											?>
								<li class="list-group-item">
						    		<?= $letters[$num]; ?> : <input type="text" class="form-control" name="<?= $key ?>" value="<?= $value ?>" placeholder="Type your answer here">
						    		<input type="radio" name="correct_answer"> Correct Answer
							    </li>

							<?php 
								$num++;	
						} 					

					}

				?>
							  		

		  	<?php else: ?>
		  		<li class="list-group-item">
		    		A : <input type="text" class="form-control" name="choice0" placeholder="Type your answer here">
		    		<input type="radio" name="correct_answer"> Correct Answer
			    </li>

			    <li class="list-group-item">
			    	B : <input type="text" class="form-control" name="choice1" placeholder="Type your answer here">
			    	<input type="radio" name="correct_answer"> Correct Answer
			    </li>
		  	
		  	<?php endif ?>
		    

		  </ul>
		</div>
		<br>
	<?php endif ?>
	
	
	<a href="<?= ROOT ?>/single_test/<?= $row->test_id ?>/">
		<button type="button" class="btn btn-info text-white"><i class="fa fa-chevron-left"></i>Back</button>
	</a>
	<button class="btn btn-primary float-end">Save Question</button>
	<div class="clearfix"></div>
	
</form>

<script>

	var letters = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J'];
	
	function add_choice() {

		// ${choices.children.length} or ${choices.childElementCount}

		var choices = document.querySelector('.choice-list');
		if (choices.children.length < letters.length) {

			choices.innerHTML += `
			<li class="list-group-item">
		    	${letters[choices.children.length]} : <input type="text" class="form-control" name="choice${choices.childElementCount}" placeholder="Type your answer here">
		    	<input type="radio" name="correct_answer"> Correct Answer
		    </li>`;

		}
		
	}

</script>