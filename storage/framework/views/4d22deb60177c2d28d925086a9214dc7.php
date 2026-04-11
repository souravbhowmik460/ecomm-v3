<div dir="ltr"
  style="margin:0px;width:100%;background-color:#f3f2f0;padding:0px;padding-top:18px;padding-bottom:18px;">
  <table border="0" cellpadding="0" cellspacing="0"
    style="width:800px;margin:0 auto;font-family: 'Google Sans',Roboto,RobotoDraft,Helvetica,Arial,Segoe UI,sans-serif;line-height:1.2; font-size: 18px; background: #fff;">
    <tbody>
      <?php echo $__env->make('backend.includes.mail-header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
      <?php echo $__env->yieldContent('content'); ?>
      <?php echo $__env->make('backend.includes.mail-footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </tbody>
  </table>
</div>
<?php /**PATH C:\wamp64\www\ecomm-v3\resources\views/backend/layouts/mail-layout.blade.php ENDPATH**/ ?>