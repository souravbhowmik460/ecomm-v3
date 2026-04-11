<?php $__env->startSection('page-styles'); ?>
  <link href="<?php echo e(asset('/public/backend/assetss/select2/select2.min.css')); ?>" rel="stylesheet" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
  <?php if (isset($component)) { $__componentOriginal269900abaed345884ce342681cdc99f6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal269900abaed345884ce342681cdc99f6 = $attributes; } ?>
<?php $component = App\View\Components\Breadcrumb::resolve(['pageTitle' => $pageTitle,'skipLevels' => $submodule->id ? [0, 2] : [0]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('breadcrumb'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Breadcrumb::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal269900abaed345884ce342681cdc99f6)): ?>
<?php $attributes = $__attributesOriginal269900abaed345884ce342681cdc99f6; ?>
<?php unset($__attributesOriginal269900abaed345884ce342681cdc99f6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal269900abaed345884ce342681cdc99f6)): ?>
<?php $component = $__componentOriginal269900abaed345884ce342681cdc99f6; ?>
<?php unset($__componentOriginal269900abaed345884ce342681cdc99f6); ?>
<?php endif; ?>
  <?php if (isset($component)) { $__componentOriginal010d7f86e3f33f397845e24b9949ed37 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal010d7f86e3f33f397845e24b9949ed37 = $attributes; } ?>
<?php $component = App\View\Components\FormCard::resolve(['formTitle' => $cardHeader,'backRoute' => route('admin.submodules'),'formId' => 'submoduleForm'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\FormCard::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="row">
      <div class="col-md-4">
        <div class="mb-3 required">
          <label class="form-label">Module </label>
          <select class="form-select select2" name="parentmodule" id="parentmodule">
            <option value="">Select Module</option>
            <?php $__currentLoopData = $modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e(Hashids::encode($module->id)); ?>"
                <?php echo e($module->id == $submodule->module_id ? 'selected' : ''); ?>>
                <?php echo e($module->name); ?>

              </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
          <div id="parentmodule-error-container"></div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="mb-3 required">
          <label class="form-label">Submodule</label>
          <input class="form-control only-alphabet-numbers-symbols" type="text" name="submodulename" id="submodulename"
            value="<?php echo e($submodule->name); ?>">
          <div id="submodulename-error-container"></div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="mb-3">
          <label class="form-label">Route Name </label>
          <input class="form-control lowercase-slug" type="text" name="submoduleslug" id="submoduleslug"
            value="<?php echo e($submodule->route_name); ?>">
          <div id="submoduleslug-error-container"></div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="mb-3 required">
          <label class="form-label">Sequence </label>
          <input class="form-control only-integers" type="text" name="submodulesequence" id="submodulesequence"
            value="<?php echo e($submodule->sequence ?? 1); ?>">
          <div id="submodulesequence-error-container"></div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="mb-3">
          <label class="form-label">Submodule Icon </label>
          <?php if (isset($component)) { $__componentOriginal48a4623e0c6540ae16fcf2bda7f81676 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal48a4623e0c6540ae16fcf2bda7f81676 = $attributes; } ?>
<?php $component = App\View\Components\RemixIconSelect::resolve(['name' => 'submoduleicon','id' => 'submoduleicon','selected' => ''.e($submodule->icon).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('remix-icon-select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\RemixIconSelect::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal48a4623e0c6540ae16fcf2bda7f81676)): ?>
<?php $attributes = $__attributesOriginal48a4623e0c6540ae16fcf2bda7f81676; ?>
<?php unset($__attributesOriginal48a4623e0c6540ae16fcf2bda7f81676); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal48a4623e0c6540ae16fcf2bda7f81676)): ?>
<?php $component = $__componentOriginal48a4623e0c6540ae16fcf2bda7f81676; ?>
<?php unset($__componentOriginal48a4623e0c6540ae16fcf2bda7f81676); ?>
<?php endif; ?>
          <div id="submoduleicon-error-container"></div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="mb-3 required">
          <label class="form-label">Status </label>
          <select name="status" id="div_status" class="form-select">
            <option value="1" <?php echo e($submodule->status === 1 ? 'selected' : ''); ?>>Active</option>
            <option value="0" <?php echo e($submodule->status === 0 ? 'selected' : ''); ?>>Inactive</option>
          </select>
        </div>
      </div>
      <div class="col-md-12 mb-3">
        <h5>Permissions </h5>
        <div class="pl-2">
          <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="form-check form-check-inline form-checkbox-success">
              <input class="form-check-input" type="checkbox"
                name="permissions['<?php echo e(Hashids::encode($permission->id)); ?>']" id="permissions-<?php echo e($permission->name); ?>"
                value="<?php echo e($permission->id); ?>"
                <?php echo e($submodule->id ? (in_array($permission->id, $submodulePermissions) ? 'checked' : '') : ''); ?>>
              <label class="form-check-label" for="permissions-<?php echo e($permission->name); ?>"><?php echo e($permission->name); ?></label>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <div id="permissions-error-container"></div>
        </div>
      </div>

      <div class="col-md-12 mb-3">
        <label for="password" class="form-label">Description </label>
        <textarea class="form-control" rows="3" name="description" id="description"><?php echo e($submodule->description); ?></textarea>
      </div>
    </div>
   <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal010d7f86e3f33f397845e24b9949ed37)): ?>
<?php $attributes = $__attributesOriginal010d7f86e3f33f397845e24b9949ed37; ?>
<?php unset($__attributesOriginal010d7f86e3f33f397845e24b9949ed37); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal010d7f86e3f33f397845e24b9949ed37)): ?>
<?php $component = $__componentOriginal010d7f86e3f33f397845e24b9949ed37; ?>
<?php unset($__componentOriginal010d7f86e3f33f397845e24b9949ed37); ?>
<?php endif; ?>
  <!-- end row -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-scripts'); ?>
  <script src="<?php echo e(asset('/public/backend/assetss/js/jquery.validate.min.js')); ?>"></script>
  <script src="<?php echo e(asset('/public/common/js/custom_input.js?v=1' . time())); ?>"></script>
  <script src="<?php echo e(asset('/public/backend/assetss/select2/select2.min.js')); ?>"></script>
  <script src="<?php echo e(asset('/public/common/js/select2-option-icon.js')); ?>"></script>

  <script>
    $('#parentmodule').select2({
      placeholder: 'Select Module',
    });
    $('#submoduleForm').validate({
      rules: {
        parentmodule: {
          required: true
        },
        submodulename: {
          required: true,
          minlength: 3
        },
        submodulesequence: {
          required: true,
          number: true,
          min: 1,
          max: 127
        },
        status: {
          required: true
        }
      },
      messages: {
        parentmodule: {
          required: "<?php echo e(__('validation.required', ['attribute' => 'Module'])); ?>"
        },
        submodulename: {
          required: "<?php echo e(__('validation.required', ['attribute' => 'Submodule'])); ?>",
          minlength: "<?php echo e(__('validation.minlength', ['attribute' => 'Submodule', 'min' => 3])); ?>"
        },
        submodulesequence: {
          required: "<?php echo e(__('validation.required', ['attribute' => 'Submodule Sequence'])); ?>",
          number: "<?php echo e(__('validation.numeric', ['attribute' => 'Sequence'])); ?>",
          min: "<?php echo e(__('validation.minvalue', ['attribute' => 'Sequence', 'min' => 1])); ?>",
          max: "<?php echo e(__('validation.maxvalue', ['attribute' => 'Sequence', 'max' => 127])); ?>"
        },
        status: {
          required: "<?php echo e(__('validation.required', ['attribute' => 'Status'])); ?>"
        }
      },
      errorElement: "div",
      errorPlacement: function(error, element) {
        let errorContainer = $(`#${element.attr('id')}-error-container`);
        // Check if element is a Select2
        if (element.hasClass("select2-hidden-accessible")) {
          let select2Container = element.next(".select2-container");

          if (errorContainer.length) {
            error.appendTo(errorContainer);
          } else {
            error.insertAfter(select2Container); // Place after Select2 container
          }
        } else {
          if (errorContainer.length) {
            error.appendTo(errorContainer);
          } else {
            error.insertAfter(element); // Fallback for other elements
          }
        }
      },
      highlight: function(element) {
        // Add is-invalid for Select2
        if ($(element).hasClass("select2-hidden-accessible")) {
          $(element).next(".select2-container").addClass("is-invalid").removeClass("is-valid");
        } else {
          $(element).addClass("is-invalid").removeClass("is-valid");
        }
      },
      unhighlight: function(element) {
        // Remove is-invalid for Select2
        if ($(element).hasClass("select2-hidden-accessible")) {
          $(element).next(".select2-container").removeClass("is-invalid").addClass("is-valid");
        } else {
          $(element).removeClass("is-invalid").addClass("is-valid");
        }
      },
      submitHandler: function(form) {
        let formID = '<?php echo e(Hashids::encode($submodule->id ?? '')); ?>'
        let url = "<?php echo e(route('admin.submodules.store')); ?>"
        if (formID)
          url = `<?php echo e(route('admin.submodules.update', ':id')); ?>`.replace(':id', formID);

        $.ajax({
          type: "POST",
          url: url,
          data: $('#submoduleForm').serialize(),
          success: function(response) {
            if (response.success) {
              swalNotify("Success!", response.message, "success");
              $(form).find(".is-valid, .is-invalid").removeClass("is-valid is-invalid");
              if (!formID) {
                form.reset();
                $(form).find(".select2").val(null).trigger("change.select2");
              }
            } else {
              swalNotify("Oops!", response.message, "error");
            }
          },
          error: function(error) {
            console.log(error);
            swalNotify("Error!", error.responseJSON.message, "error");
          }
        })
      }
    });

    $(".select2").on("change", function() {
      $(this).valid();
    });
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\ecomm-v3\resources\views/backend/pages/system/submodule/form.blade.php ENDPATH**/ ?>