<?php if(!empty($brandSliders) && count($brandSliders) > 0): ?>
  <section class="furniture_brands_wrap">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">

          <div class="swiperwrp">
            <div class="swiper logoSmoothSlider">
              <div class="swiper-wrapper eq-height">
                <?php $__empty_1 = true; $__currentLoopData = $brandSliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brandSlider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                  <?php
                    $settings = json_decode($brandSlider->settings, true);
                  ?>
                  <div class="swiper-slide">
                    <img
                      src="<?php echo e(!empty($settings['image']) ? asset(config('defaults.banner_image_path') . $settings['image']) : asset('public/frontend/assets/img/brands/brandlogo1.jpg')); ?>"
                      alt="<?php echo e($settings['alt_text'] ?? 'Furniture'); ?>" />
                  </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <?php endif; ?>
              </div>
            </div>
          </div>



          

        </div>
      </div>
    </div>
  </section>
<?php else: ?>
  
  <section class="furniture_brands_wrap" style="display:none">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="slider">
            <div class="slide-track">
              <?php for($i = 1; $i <= 3; $i++): ?>
                <div class="slide"><img src="<?php echo e(asset('public/frontend/assets/img/brands/brandlogo1.jpg')); ?>"
                    alt="Furniture" /></div>
                <div class="slide"><img src="<?php echo e(asset('public/frontend/assets/img/brands/brandlogo2.jpg')); ?>"
                    alt="Furniture" /></div>
                <div class="slide"><img src="<?php echo e(asset('public/frontend/assets/img/brands/brandlogo3.jpg')); ?>"
                    alt="Furniture" /></div>
                <div class="slide"><img src="<?php echo e(asset('public/frontend/assets/img/brands/brandlogo4.jpg')); ?>"
                    alt="Furniture" /></div>
                <div class="slide"><img src="<?php echo e(asset('public/frontend/assets/img/brands/brandlogo5.jpg')); ?>"
                    alt="Furniture" /></div>
                <div class="slide"><img src="<?php echo e(asset('public/frontend/assets/img/brands/brandlogo6.jpg')); ?>"
                    alt="Furniture" /></div>
                <div class="slide"><img src="<?php echo e(asset('public/frontend/assets/img/brands/brandlogo7.jpg')); ?>"
                    alt="Furniture" /></div>
              <?php endfor; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>
<?php /**PATH C:\wamp64\www\ecomm-v3\resources\views/frontend/includes/banners/brand-slider.blade.php ENDPATH**/ ?>