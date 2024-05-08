<?php $this->load_view('includes/header'); ?>
<?php $this->load_view('includes/nav'); ?>

	<div class="container-fluid p-4 shadow mx-auto" style="max-width: 1000px">
		<!-- Breadcrumbs -->
		<?php $this->load_view('includes/crumbs',['crumbs' => $crumbs]); ?>

		<!-- Nav search -->
			<nav class="navbar bg-body-tertiary">
			  <form class="form-inline">
			    <div class="input-group">
			      <button class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></button>
			      <input name="find" value="<?= isset($_GET['find']) ? $_GET['find'] : '' ?>" type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="basic-addon1">
			    </div>
			  </form>

			  <!-- add new user -->
				<a href="<?= ROOT ?>/signup?mode=users">
					<button class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>Add New</button>
				</a>
			</nav>


		<div class="card-group justify-content-center">
			<?php if($rows): ?>
				<?php foreach ($rows as $key => $row): ?>
					<!-- User include file comes here with card template -->
					<?php include(views_path('user')) ?>
				
				<?php endforeach ?>
			<?php else: ?>
				<div>
					<h5><?= 'No record found'; ?></h5>
				</div>
				
			<?php endif ?>		
		</div>

		<!-- For Pager display -->
		<?= $pager->display(); ?>
		

	</div>

<?php $this->load_view('includes/footer'); ?>
	