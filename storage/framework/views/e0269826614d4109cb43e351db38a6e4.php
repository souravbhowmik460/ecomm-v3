<div>
  <div class="d-flex filter-small justify-content-end align-items-center mb-2">
    <div class="d-flex min-250 me-2" wire:ignore>
      <select class="form-select select2" name="module_list" id="module_list">
        <option value="">Select Module</option>
        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <option value="<?php echo e(Hashids::encode($module['id'])); ?>">
            <?php echo e($module['name']); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
      </select>
    </div>
    <div class="d-flex me-2">
      <div class="input-group input-group-text font-14 bg-white" id="reportrange" wire:ignore>
        <i class="mdi mdi-calendar-range font-14 d-flex me-2"></i>
        <span class=""></span>
      </div>
    </div>

    <?php echo $__env->make('livewire.includes.datatable-search', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

  </div>
  <?php echo $__env->make('livewire.includes.datatable-pagecount', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
  <div class="table-responsive">
    <table class="table table-centered mb-0">
      <thead>
        <tr>
          <th class="sl-col">
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="maincheck">
              <label class="form-check-label" for="customCheck1"></label>
            </div>
          </th>
          <th class="">Sl.</th>
          <th class="">Action</th>
          <?php echo $__env->make('livewire.includes.datatable-header-sort', [
              'colName' => 'module_id',
              'displayName' => 'Module',
          ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
          <?php echo $__env->make('livewire.includes.datatable-header-sort', [
              'colName' => 'name',
              'displayName' => 'Submodule',
          ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

          <?php echo $__env->make('livewire.includes.datatable-header-sort', [
              'colName' => 'sequence',
              'displayName' => 'Sequence',
          ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
          <?php echo $__env->make('livewire.includes.datatable-header-sort', [
              'colName' => 'status',
              'displayName' => 'Status',
          ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
          <?php echo $__env->make('livewire.includes.datatable-header-sort', [
              'colName' => 'created_by',
              'displayName' => 'Created By',
          ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
          <?php echo $__env->make('livewire.includes.datatable-header-sort', [
              'colName' => 'updated_by',
              'displayName' => 'Updated By',
          ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </tr>
      </thead>
      <tbody>
        <!--[if BLOCK]><![endif]--><?php if(count($submodules) > 0): ?>
          <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $submodules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $submodule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $hashedID = Hashids::encode($submodule->id); ?>
            <tr id="row_<?php echo e($hashedID); ?>">
              <td>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="check_<?php echo e($hashedID); ?>">
                  <label class="form-check-label"></label>
                </div>
              </td>
              <td><?php echo e($serialNumber++); ?></td>
              <td class="table-action ">
                <div class="d-flex">
                  <a href="<?php echo e(route('admin.submodules.edit', $hashedID)); ?>" class="action-icon text-info"
                    title="Edit">
                    <i class="ri-pencil-line"></i></a>
                  <a href="javascript: void(0);" class="action-icon text-danger" title="Remove"
                    onclick="deleteRecord('<?php echo e($hashedID); ?>')"> <i class="ri-delete-bin-line"></i></a>
                </div>
              </td>
              <td>
                <?php echo e($submodule->module ? $submodule->module->name : 'N/A'); ?>

              </td>
              <td>
                <div class="d-flex justify-content-start align-items-center">
                  <i class="<?php echo e($submodule->icon); ?> font-24 me-1"></i>
                  <?php echo e($submodule->name); ?>

                </div>
              </td>
              <td><?php echo e($submodule->sequence); ?></td>
              <td>
                <span class="badge badge-<?php echo e($submodule->status ? 'success' : 'danger'); ?>-lighten"
                  title="<?php echo e($submodule->status ? 'Active' : 'Inactive'); ?>" id="status_<?php echo e($hashedID); ?>"
                  role="button" tabindex="0" onclick="changeStatus('<?php echo e($hashedID); ?>')">
                  <?php echo e($submodule->status ? 'Active' : 'Inactive'); ?>

                </span>
              </td>
              <td class=" updatedby">
                <div class="thumb">
                  <span class="account-user-avatar">
                    <img src=<?php echo e(userImageById('admin', $submodule->created_by)['thumbnail']); ?> alt="user-image"
                      width="32" class="rounded-circle">
                  </span>
                  <div class="inf">
                    <?php echo e($submodule->created_by ? userNameById('admin', $submodule->created_by) : 'N/A'); ?>

                    <span><?php echo e(convertDateTimeHours($submodule->created_at)); ?></span>
                  </div>
                </div>
              </td>
              <td class=" updatedby">
                <div class="thumb">
                  <span class="account-user-avatar">
                    <img src=<?php echo e(userImageById('admin', $submodule->updated_by)['thumbnail']); ?> alt="user-image"
                      width="32" class="rounded-circle">
                  </span>
                  <div class="inf">
                    <?php echo e($submodule->updated_by ? userNameById('admin', $submodule->updated_by) : 'N/A'); ?>

                    <span><?php echo e(convertDateTimeHours($submodule->updated_at)); ?></span>
                  </div>
                </div>
              </td>

            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
        <?php else: ?>
          <tr>
            <td colspan="12" class="">
              <div role="alert" class="alert alert-danger text-center text-danger">
                No SubModules Found
              </div>
            </td>
          </tr>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
      </tbody>
    </table>
  </div>
  <?php echo e($submodules->links('vendor.livewire.bootstrap')); ?>

</div>

<?php $__env->startPush('component-scripts'); ?>
  <script>
    $('#module_list').select2({
      placeholder: 'Filter by Module',
      allowClear: true,

    });

    $('#module_list').on('change', function() {
      var moduleId = $(this).val();
      Livewire.dispatch('moduleChangedComponent', [moduleId]);
    });

    function changeStatus(id) {
      url = `<?php echo e(route('admin.submodules.edit.status', ':id')); ?>`.replace(':id', id);
      changeStatusAjax(url, id);
    }

    function deleteRecord(id) {
      url = `<?php echo e(route('admin.submodules.delete', ':id')); ?>`.replace(':id', id);
      deleteAjax(url);
    }

    $("#deleteBtn").on("click", function() {
      deleteMultipleAjax(`<?php echo e(route('admin.submodules.delete.multiple')); ?>`);
    });
  </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\wamp64\www\ecomm-v3\resources\views/livewire/system/sub-module-table.blade.php ENDPATH**/ ?>