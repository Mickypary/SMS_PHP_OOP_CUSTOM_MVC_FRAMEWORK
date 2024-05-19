</div>

  <!-- Jquery Ajax -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <script type="text/javascript" src="<?= ASSETS ?>/custom/code.js"></script>
	<script type="text/javascript" src="<?=ASSETS?>/bootstrap/js/bootstrap.bundle.min.js"></script>




  <script type='text/javascript'>

    <?php if (isset($_SESSION['message'])) : ?>  

        var type = "<?= $_SESSION['alert-type'] ?>";

        switch(type) {
          case 'success':
            toastr.success("<?= $_SESSION['message']; ?>");
            break;

          case 'info':
            toastr.info("<?= $_SESSION['message']; ?>");
            break;

          case 'warning':
            toastr.warning("<?= $_SESSION['message']; ?>");
            break;

          case 'error':
            toastr.error("<?= $_SESSION['message']; ?>");
            break;

        }

    <?php endif; ?>

    <?php unset($_SESSION['message']); ?>

  </script>


</body>
</html>





