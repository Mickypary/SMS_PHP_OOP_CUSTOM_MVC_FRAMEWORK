</div>

  <script type="text/javascript" src="<?= ASSETS ?>/custom/code.js"></script>
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> -->
	<script type="text/javascript" src="<?=ASSETS?>/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>



<script type="text/javascript">
  
  @if(isset($_SESSION['message'])
  var type = "<?= Session::get('alert-type','info') ?>"
  switch(type) {
  case 'info':
    toastr.info("<?= Session::get('message') ?>");
    break;

   case 'success':
    toastr.success("<?= Session::get('message') ?>");
    break; 

    case 'warning':
    toastr.warning("<?= Session::get('message') ?>");
    break; 

  case 'error':
    toastr.error("<?= Session::get('message') ?>");
    break; 
  }
  @endif

</script>