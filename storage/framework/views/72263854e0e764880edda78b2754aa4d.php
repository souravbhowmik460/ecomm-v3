<?php $__env->startSection('title', @$title); ?>

<?php $__env->startSection('content'); ?>

  <section class="breadcrumb-wrapper py-4 border-top">
    <div class="container-xxl">
      <ul class="breadcrumbs">
        <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
        <li>Account</li>
      </ul>
    </div>
  </section>
  <section class="furniture_myaccount_wrap pt-4">
    <div class="container flow-rootX3">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="fw-normal mt-0 font45 c--blackc">Account</h1>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-12">
          <div class="my_account_wrap">
            <?php echo $__env->make('frontend.pages.user.includes.profile-sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <div class="right_content">
              <div class="profile_details overflow-hidden border flow-rootX3 h-100">
                <div class="heading d-flex justify-content-between align-items-center border-bottom pb-4">
                  <h2 class="font25 fw-medium m-0 c--blackc">Saved Addresses</h2>
                  <a href="javascript:void();"
                    class="btn btn-outline-dark d-inline-flex px-4 py-3 align-items-center gap-2 create-or-edit-address"
                    title="Add New Address"><span class="material-symbols-outlined">add</span> Add New Address</a>
                </div>
                <div class="info flow-rootX2" id="address_block_profile">
                  <?php echo $__env->make('frontend.includes.list-of-profile-address', ['addresses' => $addresses], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php if (isset($component)) { $__componentOriginal22271b6c7d71fd7378303e04c6c5d3c3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal22271b6c7d71fd7378303e04c6c5d3c3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.create-or-edit-address-modal','data' => ['states' => $states]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('create-or-edit-address-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['states' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($states)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal22271b6c7d71fd7378303e04c6c5d3c3)): ?>
<?php $attributes = $__attributesOriginal22271b6c7d71fd7378303e04c6c5d3c3; ?>
<?php unset($__attributesOriginal22271b6c7d71fd7378303e04c6c5d3c3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal22271b6c7d71fd7378303e04c6c5d3c3)): ?>
<?php $component = $__componentOriginal22271b6c7d71fd7378303e04c6c5d3c3; ?>
<?php unset($__componentOriginal22271b6c7d71fd7378303e04c6c5d3c3); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('scripts'); ?>
  <script>
    function toggleOptions() {
      const options = document.getElementById("options");
      const selected = document.getElementById("selected");
      const isOpen = options.style.display === "block";

      options.style.display = isOpen ? "none" : "block";
      selected.classList.toggle("active", !isOpen);
    }

    function selectOption(name, img) {
      const selected = document.getElementById("selected");
      selected.innerHTML = `<img src="${img}" alt="${name}"> ${name}`;
      document.getElementById("options").style.display = "none";

      // Ensure border stays black
      selected.classList.remove("active");
      selected.classList.add("has-value");
    }

    // Close dropdown if clicked outside
    document.addEventListener('click', function(e) {
      const options = document.getElementById("options");
      const selected = document.getElementById("selected");

      if (!e.target.closest('.custom-select')) {
        if (options && selected) {
          options.style.display = "none";
          selected.classList.remove("active");
        }
      }
    });


    // Address modal operation





  </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontend.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\ecomm-v3\resources\views/frontend/pages/user/address/index.blade.php ENDPATH**/ ?>