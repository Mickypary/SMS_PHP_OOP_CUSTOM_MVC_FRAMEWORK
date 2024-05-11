<?php
   $image = $row->profile_image;
   $gender = $row->gender;
?>

	<div class="card m-2 shadow" style="min-width: 13rem; max-width: 13rem;">		  
	  <img src="<?= get_image($image,$gender) ?>" class="rounded-circle w-75 mx-auto d-block mt-1 card-img-top" alt="Card image cap">
	  <div class="card-body">
	    <center><h5 class="card-title"><?= esc($row->firstname) ?> <?= esc($row->lastname) ?></h5></center>
	    <center><p class="card-text"><?= ucwords(str_replace("_", " ", esc($row->rank))); ?></p></center>
	    <br>
	    <?php if (((!isset($_GET['select']) || !isset($_GET['select'])) && (Auth::access('reception') || Auth::i_own_content($row)))): ?>
	    	<center><a  href="<?= ROOT ?>/profile/<?=$row->user_id?>" class="btn btn-primary mb-2">Profile</a></center>
	    <?php endif ?>
	    

	   <?php if (isset($_GET['select'])): ?>
	   	<center><button name="selected" value="<?=$row->user_id?>" class="btn btn-success ">Add</button></center>
	   <?php elseif(isset($_GET['deselect'])): ?>
	   	<button name="selected" value="<?=$row->user_id?>" class="btn btn-danger ">Remove</button>
	   <?php endif ?>
	    
	  </div>
	</div>