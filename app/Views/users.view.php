<?php $this->load_view('includes/header'); ?>
<?php $this->load_view('includes/nav'); ?>

	<div class="container-fluid p-4 shadow mx-auto" style="max-width: 1000px">
		<!-- Breadcrumbs -->
		<?php $this->load_view('includes/crumbs'); ?>

		<div class="card-group justify-content-center">
			<?php if($rows): ?>
			<?php foreach ($rows as $key => $value): ?>
				<div class="card m-2 shadow" style="min-width: 14rem; max-width: 14rem;">
				  <img src="<?=ASSETS?>/user_female.jpg" class="card-img-top" alt="Card image cap">
				  <div class="card-body">
				    <h5 class="card-title"><?= $value->firstname ?> <?= $value->lastname ?></h5>
				    <p class="card-text"><?= ucfirst(str_replace('_'," ",$value->rank)) ?></p>
				    <a href="#" class="btn btn-primary">Profile</a>
				  </div>
				</div>
			<?php endforeach ?>
			<?php endif ?>
			

		</div>
		

	</div>

<?php $this->load_view('includes/footer'); ?>
	