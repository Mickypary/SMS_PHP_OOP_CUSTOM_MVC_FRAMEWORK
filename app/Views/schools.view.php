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
			      <input name="find" id="search-input" value="<?= isset($_GET['find']) ? $_GET['find'] : '' ?>" type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="basic-addon1">
			      
			    </div>
			  </form>

			  <!-- add new user -->
				<a href="<?= ROOT ?>/schools/add">
					<button class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>Add New</button>
				</a>
			</nav>
		

		<?php include(views_path('school')) ?>	

		<script type="text/javascript">
			  // $(document).on('keyup','#search-input',function(){
			  //   var search-input = $('#search-input').val();
			  //    $.ajax({
			  //     url: "",
			  //     type: "GET",
			  //     data: {
			  //     	'find':find,
			  //     },
			  //     success: function (data) {
			  //       $('#school-entry').removeClass('d-none');
			  //       var html = '';
			  //       $.each( data, function(key, v){
			  //       	var increment = key+1
			  //         html +=
			  //         '<tr>'+
			  //         '<td>'+increment+'</td>'+
			  //         // '<td><?= url('upload/student_images') ?>/'+v.student.image+'</td>'+
			  //         <?= $row->school ?>
			  //         '<td>'+v.student.id_no+'<input type="hidden" name="student_id[]" value="'+v.student_id+'"> <input type="hidden" name="id_no[]" value="'+v.student.id_no+'"> </td>'+
			  //         '<td>'+v.student.name+'</td>'+
			  //         '<td>'+v.student.fname+'</td>'+
			  //        '<td style="text-transform:capitalize">'+v.student.gender+'</td>'+ 
			  //         '<td><input type="text" class="form-control form-control-sm" name="marks[]" value="'+'"></td>'+
			  //         '</tr>';
			  //       });
			  //       html = $('#marks-entry-tr').html(html);
			  //     }
			  //   });
			  // });
		</script>

	</div>

<?php $this->load_view('includes/footer'); ?>





	