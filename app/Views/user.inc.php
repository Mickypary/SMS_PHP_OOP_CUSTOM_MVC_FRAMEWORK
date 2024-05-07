<?php
   $image = $row->profile_photo;
   $gender = $row->gender;
?>

	<div class="card m-2 shadow" style="min-width: 12rem; max-width: 12rem;">		  
	  <img src="<?= get_image($image,$gender) ?>" class="rounded-circle w-75 mx-auto d-block mt-1 card-img-top" alt="Card image cap">
	  <div class="card-body">
	    <center><h5 class="card-title"><?= esc($row->firstname) ?> <?= esc($row->lastname) ?></h5></center>
	    <center><p class="card-text"><?= ucwords(str_replace("_", " ", esc($row->rank))); ?></p></center>
	    <br>
	    <?php if (!isset($_GET['select']) && !isset($_GET['deselect']) && Auth::access('lecturer') || Auth::i_own_content($row)): ?>
	    	<center><a href="<?= ROOT ?>/profile/<?=$row->user_id?>" class="btn btn-primary">Profile</a></center>
	    <?php endif ?>
	    

	   <?php if (isset($_GET['select'])): ?>
	   	<center><button name="selected" value="<?=$row->user_id?>" class="btn btn-success ">Assign</button></center>
	   <?php elseif(isset($_GET['deselect'])): ?>
	   	<center><button name="selected" value="<?=$row->user_id?>" class="btn btn-danger ">Unassign</button></center>
	   <?php endif ?>
	    
	  </div>
	</div>