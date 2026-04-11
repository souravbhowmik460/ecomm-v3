

<label class="d-flex border py-2 address-item" for="default_address_<?php echo e($singleAddress->id ?? ''); ?>">
  <input type="radio" name="default_address" id="default_address_<?php echo e($singleAddress->id ?? ''); ?>" value="<?php echo e($singleAddress->id ?? ''); ?>"
    class="mx-3" data-attr-type="<?php echo e($singleAddress->type ?? ''); ?>" <?php echo e(!empty($singleAddress) && $singleAddress->primary == 1 ? 'checked' : ''); ?>>
  <div id="address_<?php echo e($singleAddress->id ?? ''); ?>">
    <h4 class="fw-medium font20"><?php echo e($singleAddress->name ?? ''); ?></h4>
    <p class="mb-0 font16">
      <?php echo e($singleAddress->address_1 ? truncateNoWordBreak($singleAddress->address_1,100) : ''); ?>,
      <?php echo e($singleAddress->city ?? ''); ?> <br>
      <?php echo e($singleAddress->landmark ?? ''); ?><br>
      <?php echo e($singleAddress->state_name ?? ($singleAddress->state->name ?? '')); ?> - <?php echo e($singleAddress->pin ?? ''); ?>,<br>
      <?php echo e($singleAddress->country_name ?? ($singleAddress->state->country->name ?? '')); ?><br>
      Phone: <?php echo e($singleAddress->phone ?? ''); ?>

    </p>
  </div>
</label>
<?php /**PATH C:\wamp64\www\ecomm-v3\resources\views/frontend/includes/address-block.blade.php ENDPATH**/ ?>