<?php $this->view('includes/header'); ?>
<?php $this->view('includes/nav'); ?>

		<div class="container-fluid">
			<h1><i class="fa fa-home"></i>This is home!</h1>
			<?php
				echo "<pre>";
				print_r($data);

			?>
		</div>

<?php $this->view('includes/footer'); ?>
	