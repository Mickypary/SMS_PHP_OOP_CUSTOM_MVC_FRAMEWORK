<!-- Nav search -->
				<nav class="navbar bg-body-tertiary">
				  <form class="form-inline">
				    <div class="input-group">
				      <button class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></button>
				      <input name="find" value="<?= isset($_GET['find']) ? $_GET['find'] : '' ?>" type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="basic-addon1">
				    </div>
				  </form>

				  <div>
				  		<!-- add new user -->
						<a href="<?= ROOT ?>/single_class/lectureradd/<?= $row->class_id ?>?select=true">
							<button class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>Assign</button>
						</a>
					  	<!-- remove new user -->
						<a href="<?= ROOT ?>/single_class/lecturerremove/<?= $row->class_id ?>?deselect=true">
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
							<center><hr><h4><?= 'No lecturer found in this class'; ?></h4></center>
					<?php endif ?>
				</div>

				<!-- For Pagination display -->
						<?= $pager->display(); ?>
				