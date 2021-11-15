  <br><br>


  <?php if(Session::has('success')): ?>
      <div class="alert alert-success <?php echo e(Session::has('important_msg') ? 'alert-important' : ''); ?>">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <?php echo e(Session::get('success')); ?>

      </div>
  <?php elseif(Session::has('failed')): ?>
      <div class="alert alert-danger">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <?php echo e(Session::get('failed')); ?>

      </div>
  <?php endif; ?>

  <?php if(session('status')): ?>
      <div class="alert alert-success" role="alert">
          <?php echo e(session('status')); ?>

      </div>
  <?php endif; ?>
<?php /**PATH D:\xampp_7_3\htdocs\kannel_report_system\resources\views/partial/flash.blade.php ENDPATH**/ ?>