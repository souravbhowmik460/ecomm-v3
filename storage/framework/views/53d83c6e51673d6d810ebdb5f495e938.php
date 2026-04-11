<header class="furniture__header">
  <div class="furniture__logowrap">
    <div class="container-xxl">
      <div class="row">
        <div class="col-lg-12">
          <div class="furniture_logowrap">
            <div class="location__link">
              <div class="inside">

                <?php if(!auth()->check()): ?>
                  <a href="javascript:void();" class="d-flex justify-content-start align-items-center locationModal"><span
                      class="material-symbols-outlined me-1">location_on</span> Delivering to:
                    <strong class="default-pin ms-2">
                      <?php echo e(isset(session('user_pincode')['Name']) ? truncateNoWordBreak(session('user_pincode')['Name'], 20) : config('defaults.default_location')); ?>

                      <?php echo e(session('user_pincode')['Pincode'] ?? config('defaults.default_pincode')); ?>

                    </strong></a>
                <?php else: ?>
                  <a href="javascript:void();"
                    class="d-flex justify-content-start align-items-center list-address"
                    ><span
                      class="material-symbols-outlined me-1">location_on</span> Delivering to:
                    <strong class="default-pin ms-2">
                      <?php echo e(isset(session('user_pincode')['Name']) ? truncateNoWordBreak(session('user_pincode')['Name'], 20) : config('defaults.default_location')); ?>

                      <?php echo e(session('user_pincode')['Pincode'] ?? config('defaults.default_pincode')); ?>

                    </strong></a>
                <?php endif; ?>

              </div>
            </div>
            <div class="furniture__headerlogo text-center"><a href="<?php echo e(route('home')); ?>"
                title="<?php echo e($siteSettings['sitename'] ?? 'Sundew Ecomm'); ?>"><img src="<?php echo e(siteLogo()); ?>"
                  alt="<?php echo e($siteSettings['sitename'] ?? 'Sundew Ecomm'); ?>"
                  title="<?php echo e($siteSettings['sitename'] ?? 'Sundew Ecomm'); ?>" /></a></div>
            <div class="actionwrap">
              <div class="itemswrp">
                <div class="top-nav-item search-icon">
                  <a href="javascript:void();" title="Search" data-bs-toggle="modal" data-bs-target="#searchModal"><span
                      class="material-symbols-outlined">search</span></a>
                </div>

                <?php if(auth()->check()): ?>
                  <div class="top-nav-item cart-icon wish-icon">
                    <a href="<?php echo e(route('wishlist')); ?>" title="Wishlist">
                      <span class="material-symbols-outlined">favorite</span>
                      <div class="cart-number wishlist-number <?php echo e(savedForLaterCount() > 0 ? '' : 'd-none'); ?>">
                        <?php echo e(savedForLaterCount()); ?></div>
                    </a>
                  </div>
                <?php endif; ?>

                <div class="top-nav-item cart-icon">
                  <a href="<?php echo e(route('cart.index')); ?>" title="Shopping Cart">
                    <span class="material-symbols-outlined">local_mall</span>
                    
                    <div class="cart-number <?php echo e(cartCount() > 0 ? '' : 'd-none'); ?>"><?php echo e(cartCount()); ?></div>
                  </a>
                </div>
              </div>

              <div class="top_accounts_wrap">
                <div class="buttons-inline gap-3 align-items-center d-flex">
                  <?php if(auth()->guard('web')->check()): ?>
                    
                    

                    <figure class="m-0">
                      <a href="<?php echo e(route('profile')); ?>" title="User"><img
                          src="<?php echo e(userImageById('web', auth()->guard('web')->user()->id) ? userImageById('web', auth()->guard('web')->user()->id)['image'] : asset('public/frontend/assets/img/home/top_user_thumb.jpg')); ?>"
                          alt="User" title="User" class="imageFit rounded-circle"
                          style="width: 50px; height: 50px;" />
                      </a>
                    </figure>

                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-inline">
                      <?php echo csrf_field(); ?>
                      <button type="submit" class="btn btn-dark">Logout</button>
                    </form>
                  <?php else: ?>
                    
                    <a class="btn btn-dark" href="<?php echo e(route('signuplogin')); ?>">Login</a>
                    
                  <?php endif; ?>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php echo $__env->make('frontend.layouts.includes.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</header>

<?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('frontend-search');

$__html = app('livewire')->mount($__name, $__params, 'lw-489118015-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
<?php /**PATH C:\wamp64\www\ecomm-v3\resources\views/frontend/layouts/includes/header.blade.php ENDPATH**/ ?>