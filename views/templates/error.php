<?php if(isset($_REQUEST['error'])): ?>

  <div class="alert alert-danger" role="alert">
  <strong>Erro!</strong> <?php echo $_REQUEST['error'] ?>
  </div>

<?php endif; ?>