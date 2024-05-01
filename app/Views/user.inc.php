<?php
   $image = $row->profile_photo;
   $gender = $row->gender;
?>

	<div class="card m-2 shadow" style="min-width: 14rem; max-width: 14rem;">		  
	  <img src="<?= get_image($image,$gender) ?>" class="card-img-top" alt="Card image cap">
	  <div class="card-body">
	    <h5 class="card-title"><?= esc($row->firstname) ?> <?= esc($row->lastname) ?></h5>
	    <p class="card-text"><?= ucwords(str_replace("_", " ", esc($row->rank))); ?></p>
	    <a href="<?= ROOT ?>/profile/<?=$row->user_id?>" class="btn btn-primary">Profile</a>

	   <?php if (isset($_GET['select'])): ?>
	   	<button name="selected" value="<?=$row->user_id?>" class="btn btn-success float-end">Assign</button>
	   <?php elseif(isset($_GET['deselect'])): ?>
	   	<button name="selected" value="<?=$row->user_id?>" class="btn btn-danger float-end">Unassign</button>
	   <?php endif ?>
	    
	  </div>
	</div>