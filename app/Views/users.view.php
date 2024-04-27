<?php $this->load_view('includes/header'); ?>
<?php $this->load_view('includes/nav'); ?>

	<div class="container-fluid p-4 shadow mx-auto" style="max-width: 1000px">
		<!-- Breadcrumbs -->
		<?php $this->load_view('includes/crumbs',['crumbs' => $crumbs]); ?>

		<!-- Nav search -->
			<nav class="navbar bg-body-tertiary">
			  <form class="form-inline">
			    <div class="input-group">
			      <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
			      <input type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="basic-addon1">
			    </div>
			  </form>

			  <!-- add new user -->
				<a href="<?= ROOT ?>/signup">
					<button class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>Add New</button>
				</a>
			</nav>


		<div class="card-group justify-content-center">
			<?php if($rows): ?>
			<?php foreach ($rows as $key => $row): ?>
				<div class="card m-2 shadow" style="min-width: 14rem; max-width: 14rem;">
				  <?php
				   $image = $row->profile_photo;
				   $gender = $row->gender;

				   ?>
				  <img src="<?= get_image($image,$gender) ?>" class="card-img-top" alt="Card image cap">
				  <div class="card-body">
				    <h5 class="card-title"><?= esc($row->firstname) ?> <?= esc($row->lastname) ?></h5>
				    <p class="card-text"><?= ucwords(str_replace("_", " ", esc($row->rank))); ?></p>
				    <a href="<?= ROOT ?>/profile/<?=$row->user_id?>" class="btn btn-primary">Profile</a>
				  </div>
				</div>
			<?php endforeach ?>
			<?php else: ?>
				<div>
					<h5><?= 'No record found'; ?></h5>
				</div>
				
			<?php endif ?>
			

		</div>
		

	</div>

<?php $this->load_view('includes/footer'); ?>
	