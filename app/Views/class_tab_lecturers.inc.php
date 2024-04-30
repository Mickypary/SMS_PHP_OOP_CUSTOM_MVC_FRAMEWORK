<!-- Nav search -->
				<nav class="navbar bg-body-tertiary">
				  <form class="form-inline">
				    <div class="input-group">
				      <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
				      <input type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="basic-addon1">
				    </div>
				  </form>

				  <div>
				  		<!-- add new user -->
						<a href="<?= ROOT ?>/single_class/<?= $row->class_id ?>?tab=lecturers-add&select=true">
							<button class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>Assign</button>
						</a>
					  	<!-- remove new user -->
						<a href="<?= ROOT ?>/single_class/<?= $row->class_id ?>?tab=lecturers-remove&deselect=true">
							<button class="btn btn-sm btn-danger"><i class="fa fa-minus"></i>De-assign</button>
						</a>
						
				  </div>
				  
				</nav>

				<div class="card-group justify-content-center">
					<?php if(is_array($lecturers)): ?>
			
						<?php foreach ($lecturers as $key => $lecturer): ?>
							<?php 
							$row = $lecturer->user; 
							include(views_path('user'))

							?>
						
						<?php endforeach ?>	
					<?php else: ?>
						<?php if (count($_POST) > 0): ?>
							<center><hr><h4><?= 'No record found'; ?></h4></center>
						<?php endif ?>	
					<?php endif ?>
				</div>
				