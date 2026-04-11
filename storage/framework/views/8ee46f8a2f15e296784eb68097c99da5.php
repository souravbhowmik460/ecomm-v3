<?php
  use Illuminate\Support\Str;
?>
<style>
  .select2-container .select2-selection--single .select2-selection__clear {
    position: relative;
    z-index: 9;
    color: var(--ct-danger);
    height: 45px;
    padding-right: 10px;
  }
</style>
<select class="form-select select2" name="<?php echo e($name); ?>" id="<?php echo e($id); ?>">
  <option value=""></option>
  <?php $__currentLoopData = $remixIcons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $icon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <option value="<?php echo e($icon->icon_name); ?>" data-icon="<?php echo e(Str::after($icon->icon_name, 'ri-')); ?>"
      <?php echo e($icon->icon_name == $selected ? 'selected' : ''); ?>>
      <?php echo e(Str::after($icon->icon_name, 'ri-')); ?>

    </option>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>

<?php $__env->startPush('component-scripts'); ?>
  <script>
    $('#<?php echo e($id); ?>').select2({
      placeholder: "Select Icon",
      width: '100%',
      allowClear: true,
      templateResult: formatIcon,
      templateSelection: formatIcon,
      escapeMarkup: function(markup) {
        return markup;
      }
    }).on('change select2:open select2:close', function() {
      $(this).next('.select2-container')
        .find('.select2-selection__clear')
        .attr('title', 'Clear selection');
    });


    function formatIcon(option) {
      if (!option.id) {
        return option.text;
      }
      var icon = $(option.element).data('icon');
      if (!icon) {
        return option.text;
      }
      return `<i class="ri-${icon}" style="margin-right: 10px; font-size: 24px;"></i> ${option.text}`;
    }
  </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\wamp64\www\ecomm-v3\resources\views/components/remix-icon-select.blade.php ENDPATH**/ ?>