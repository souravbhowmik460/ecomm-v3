<div class="address_block_profile flow-rootX">
  <h3 class="font20 fw-normal mb-2">Default Address</h3>
  <?php $__empty_1 = true; $__currentLoopData = $addresses->where('primary', 1)->sortByDesc('id')->take(1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <div class="profile_address_block border">
      <address>
        <h4 class="fw-medium font20"><?php echo e($address->name); ?></h4>
        <p class="mb-0 font16"><?php echo e($address->address_1 ? truncateNoWordBreak($address->address_1,100) : ''); ?>, <br>
          <?php echo e($address->city); ?> - <?php echo e($address->pin); ?>, <br>
          <?php echo e($address->state->name); ?> </p>
      </address>
      <div class="action d-flex justify-content-center align-items-center gap-0">
        <a href="javascript:void();"
          class="btn btn-light d-inline-flex align-items-center font16 c--blackc gap-2 create-or-edit-address"
          title="Edit" data-address='<?php echo json_encode($address, 15, 512) ?>' data-address-id="<?php echo e(Hashids::encode($address->id ?? '')); ?>"><span
            class="material-symbols-outlined font15">edit</span> Edit</a>

        <a href="javascript:void();"
          class="btn btn-light font16 c--primary d-inline-flex align-items-center border-left gap-2 delete-default-address"
          title="Remove" data-address-id="<?php echo e($address->id ?? ''); ?>"><span
            class="material-symbols-outlined font15">delete</span> Remove</a>
      </div>
    </div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    No default address found
  <?php endif; ?>
</div>
<div class="address_block_profile flow-rootX">
  <h3 class="font20 fw-normal mb-2">Other Address</h3>
  <?php $__empty_1 = true; $__currentLoopData = $addresses->where('primary', 0); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <div class="profile_address_block border">
      <address>
        <h4 class="fw-medium font20"><?php echo e($address->name); ?></h4>
        <p class="mb-0 font16"><?php echo e($address->address_1); ?>, <br>
          <?php echo e($address->city); ?> - <?php echo e($address->pin); ?>, <br>
          <?php echo e($address->state->name); ?></p>
      </address>
      <div class="action d-flex justify-content-center align-items-center gap-0">
        <a href="javascript:void();"
          class="btn btn-light d-inline-flex align-items-center font16 c--blackc gap-2 create-or-edit-address"
          title="Edit" data-address='<?php echo json_encode($address, 15, 512) ?>' data-address-id="<?php echo e(Hashids::encode($address->id ?? '')); ?>"><span
            class="material-symbols-outlined font15">edit</span> Edit</a>

        <a href="javascript:void();"
          class="btn btn-light font16 c--primary d-inline-flex align-items-center border-left gap-2 delete-default-address"
          title="Remove" data-address-id="<?php echo e($address->id ?? ''); ?>"><span
            class="material-symbols-outlined font15">delete</span> Remove</a>
      </div>
    </div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    No other addresses available
  <?php endif; ?>
</div>
<?php /**PATH C:\wamp64\www\ecomm-v3\resources\views/frontend/includes/list-of-profile-address.blade.php ENDPATH**/ ?>