<?php $__env->startPush('styles'); ?>
  <style>
    .custom-tooltip {
      position: relative;
      cursor: pointer;
    }

    .custom-tooltip::after {
      content: attr(data-tooltip);
      position: absolute;
      bottom: 125%;
      left: 50%;
      transform: translateX(-50%);
      background-color: #333;
      color: #fff;
      padding: 8px 12px;
      border-radius: 6px;
      white-space: nowrap;
      font-size: 14px;
      opacity: 0;
      pointer-events: none;
      transition: opacity 0.2s ease-in-out;
      z-index: 1000;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
    }

    /* Tooltip arrow */
    .custom-tooltip::before {
      content: "";
      position: absolute;
      bottom: 115%;
      left: 50%;
      transform: translateX(-50%);
      border-width: 6px;
      border-style: solid;
      border-color: #333 transparent transparent transparent;
      opacity: 0;
      transition: opacity 0.2s ease-in-out;
      z-index: 1001;
    }

    /* Show tooltip on hover */
    .custom-tooltip:hover::after,
    .custom-tooltip:hover::before {
      opacity: 1;
    }
  </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('title', @$title); ?>

<?php $__env->startSection('content'); ?>
  <section class="breadcrumb-wrapper py-4 border-top">
    <div class="container-xxl">
      <ul class="breadcrumbs">
        <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
        <li>Cart</li>
      </ul>
    </div>
  </section>

  <section class="furniture_cart_wrap pt-4">
    <div class="container-xxl flow-rootX3">
      <h2 class="fw-normal m-0 font45 c--blackc">Cart</h2>
      <div class="furniture_cart_inside_wrap">
        <?php if (isset($component)) { $__componentOriginal668c7a20207a57df30a8baa989f6e034 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal668c7a20207a57df30a8baa989f6e034 = $attributes; } ?>
<?php $component = App\View\Components\CartItems::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('cart-items'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\CartItems::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['c_items' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($cart_items),'s_items' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($saved_for_later_items),'display_quantity' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal668c7a20207a57df30a8baa989f6e034)): ?>
<?php $attributes = $__attributesOriginal668c7a20207a57df30a8baa989f6e034; ?>
<?php unset($__attributesOriginal668c7a20207a57df30a8baa989f6e034); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal668c7a20207a57df30a8baa989f6e034)): ?>
<?php $component = $__componentOriginal668c7a20207a57df30a8baa989f6e034; ?>
<?php unset($__componentOriginal668c7a20207a57df30a8baa989f6e034); ?>
<?php endif; ?>

        <div class="furniture__cartsummery-right <?php echo e(cartCount() == 0 ? 'd-none' : ''); ?>">
          <div class="furniture__cartsummery-inside">
            <div id="cart-summary-wrapper">
              <?php if (isset($component)) { $__componentOriginalc4aa1d63f0f8dbeec2ec2f57b2fc28be = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc4aa1d63f0f8dbeec2ec2f57b2fc28be = $attributes; } ?>
<?php $component = App\View\Components\CartSummary::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('cart-summary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\CartSummary::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['cart_items' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($cart_items)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc4aa1d63f0f8dbeec2ec2f57b2fc28be)): ?>
<?php $attributes = $__attributesOriginalc4aa1d63f0f8dbeec2ec2f57b2fc28be; ?>
<?php unset($__attributesOriginalc4aa1d63f0f8dbeec2ec2f57b2fc28be); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc4aa1d63f0f8dbeec2ec2f57b2fc28be)): ?>
<?php $component = $__componentOriginalc4aa1d63f0f8dbeec2ec2f57b2fc28be; ?>
<?php unset($__componentOriginalc4aa1d63f0f8dbeec2ec2f57b2fc28be); ?>
<?php endif; ?>
            </div>
            <div class="individual_blocks pt-0">
              <div class="cart_action">
                <a id="proceed-to-checkout" href="<?php echo e(cartCount() > 0 ? route('checkout') : 'javascript:void(0)'); ?>"
                  class="btn btn-dark w-100 py-3 <?php echo e(cartCount() > 0 ? '' : 'disabled'); ?>">Proceed To Checkout</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php echo $__env->make('frontend.includes.checkout-more-products', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontend.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\ecomm-v3\resources\views/frontend/pages/cart/index.blade.php ENDPATH**/ ?>