<div class="product-details-slider-wrap">
  <div class="product-details-slider flow-rootX">
    <div
      class="swiper swiper--product-detail swiper-initialized swiper-horizontal swiper-watch-progress swiper-backface-hidden">
      <div class="swiper-wrapper" id="swiper-wrapper-e9eeeecb559dc8e8" aria-live="polite"
        style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);">
        <?php $__empty_1 = true; $__currentLoopData = $orderedImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
          <div class="swiper-slide swiper-slide-visible swiper-slide-active" role="group">
            <div class="easyzoom easyzoom--overlay">
              <a href="javascript:void(0)" class="ratio ratio-1000x600">
                <?php if($item->gallery->file_type == 'video/mp4'): ?>
                  <video width="100%" height="100%" controls>
                    <source
                      src="<?php echo e(asset('public/storage/uploads/media/products/videos/' . $item->gallery->file_name)); ?>"
                      type="video/mp4">
                  </video>
                <?php else: ?>
                  <img src="<?php echo e(asset('public/storage/uploads/media/products/images/' . $item->gallery->file_name)); ?>"
                    alt="<?php echo e($productVariant->name); ?>" title="<?php echo e($productVariant->name); ?>">
                <?php endif; ?>
              </a>
            </div>
          </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
          <div class="swiper-slide">
            <div class="ratio ratio-1000x800 border">
              <img src="<?php echo e(asset('public/backend/assetss/images/products/product_thumb.jpg')); ?>" alt=""
                title="" />
            </div>
          </div>
        <?php endif; ?>
      </div>
      <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
    </div>

    <div
      class="swiper swiper--product-thumbs swiper-initialized swiper-horizontal swiper-free-mode swiper-backface-hidden swiper-thumbs">
      <div class="swiper-wrapper" id="swiper-wrapper-e852b1cda78ac8be" aria-live="polite"
        style="transform: translate3d(0px, 0px, 0px); transition-duration: 0ms;">
        <?php $__empty_1 = true; $__currentLoopData = $orderedImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
          <div class="swiper-slide swiper-slide-visible swiper-slide-active swiper-slide-thumb-active"
            style="width: 204.8px; margin-right: 10px;" role="group" aria-label="1 / 7">
            <div class="ratio ratio-1000x800 border">
              <?php if($item->gallery->file_type == 'video/mp4'): ?>
                <video src="<?php echo e(asset('public/storage/uploads/media/products/videos/' . $item->gallery->file_name)); ?>"
                  controls title="<?php echo e($productVariant->name); ?>"></video>
              <?php elseif(
                  $item->gallery->file_type == 'image/jpeg' ||
                      $item->gallery->file_type == 'image/png' ||
                      $item->gallery->file_type == 'image/jpg' ||
                      $item->gallery->file_type == 'image/webp'): ?>
                <img src="<?php echo e(asset('public/storage/uploads/media/products/images/' . $item->gallery->file_name)); ?>"
                  alt="<?php echo e($productVariant->name); ?>" title="<?php echo e($productVariant->name); ?>">
              <?php endif; ?>
            </div>
          </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
          <div class="swiper-slide">
            <div class="ratio ratio-1000x800 border">
              <img src="<?php echo e(asset('public/backend/assetss/images/products/product_thumb.jpg')); ?>" alt=""
                title="" />
            </div>
          </div>
        <?php endif; ?>
      </div>
      <div class="swiper-scrollbar swiper-scrollbar-horizontal" style="opacity: 0; transition-duration: 400ms;">
        <div class="swiper-scrollbar-drag"
          style="transform: translate3d(0px, 0px, 0px); transition-duration: 0ms; width: 0px;"></div>
      </div>
      <div class="swiper-buttons">
        <div class="swiper-button-prev swiper-button-disabled" tabindex="-1" role="button" aria-label="Previous slide"
          aria-controls="swiper-wrapper-e852b1cda78ac8be" aria-disabled="true">
        </div>
        <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide"
          aria-controls="swiper-wrapper-e852b1cda78ac8be" aria-disabled="false"></div>
      </div>
      <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
    </div>
  </div>
</div>
<?php /**PATH C:\wamp64\www\ecomm-v3\resources\views/frontend/includes/image-slide.blade.php ENDPATH**/ ?>