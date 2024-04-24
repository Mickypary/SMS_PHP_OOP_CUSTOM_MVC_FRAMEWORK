$(function () {
	$(document).on('click','#delete', function (e) {
		e.preventDefault();
		var link = $(this).attr('href');

		Swal.fire({
		  title: 'Are you sure?',
		  text: 'Do you want to continue',
		  icon: 'warning',
		  showCancelButton: 'true',
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Cool'
		}).then( (result) => {
			if (result.isConfirmed) {
				window.location.href = link
				swal.fire(
					'Deleted!',
					'Deleted.',
					'success'
				)
			}
		});
	});
});