<center><h5>Add Subjective Questions</h5></center>

<form method="POST" action="" enctype="multipart/form-data">
	
	<label>Question:</label>
	<textarea autofocus class="form-control" name="question" placeholder="Type your question here"></textarea>
	<div class="input-group mb-3 pt-3">
		<input type="text" name="comment" class="form-control" placeholder="Comment(optional)">
	</div>
	
	<div class="input-group mb-3 pt-3">
	  <label class="input-group-text" for="inputGroupFile01"><i class="fa fa-image"></i>Image(optional)</label>
	  <input type="file" name="image" class="form-control" id="inputGroupFile01">
	</div>
	
	<a href="<?= ROOT ?>/single_test/<?= $row->test_id ?>/">
		<button type="button" class="btn btn-info text-white"><i class="fa fa-chevron-left"></i>Back</button>
	</a>
	<button class="btn btn-primary float-end">Save Question</button>
	<div class="clearfix"></div>
	
</form>