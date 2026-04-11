<section class="furniture__contemporary_wrap">
  <div class="container-xxl">
    <div class="row">
      <div class="col-lg-12">
        <?php

          if (!empty($homePageFourHovercaedTitle['settings'])) {
              $titleSettings = json_decode($homePageFourHovercaedTitle['settings'], true);
              $title = isset($titleSettings['title']) ? $titleSettings['title'] : 'Contemporary';
          }
        ?>
        <div class="headdings font100 c--black"><?php echo e($title); ?></div>

        <div class="swiperwrp">
          <div class="swiper swiper__3">
            <div class="swiper-wrapper eq-height">
              <?php $__empty_1 = true; $__currentLoopData = $furnitureContemporaries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $furnitureContemporary): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <?php
                  $banner = $furnitureContemporary['furnitureContemporaryBaner'];
                  $variant = $furnitureContemporary['furnitureContemporaryProductVariant'];
                  $settings = json_decode($banner['settings'] ?? '{}', true);
                ?>

                <div class="swiper-slide">
                  <div class="contemporary-card">
                    <div class="card-wrp">
                      <figure class="m-0 grayscale-hover">
                        <img
                          src="<?php echo e(!empty($settings['image']) ? asset(config('defaults.banner_image_path') . $settings['image']) : asset('public/frontend/assets/img/home/contemporary1.jpg')); ?>"
                          alt="<?php echo e($settings['alt_text'] ?? ''); ?>" class="imageFit" />
                      </figure>
                    </div>

                    <div class="bagwrap">
                      <?php if($variant): ?>
                        <form id="add-to-cart-form-<?php echo e($variant->id); ?>" action="<?php echo e(route('cart.add')); ?>" method="POST"
                          style="display: none;">
                          <?php echo csrf_field(); ?>
                          <input type="hidden" name="product_variant_id" value="<?php echo e($variant->id); ?>">
                          <input type="hidden" name="quantity" value="1">
                          <input type="hidden" name="is_saved_for_later" value="0">
                          <input type="hidden" name="action" value="add_to_cart">
                        </form>

                        <div class="<?php echo e(isInCart($variant->id) ? 'd-none' : 'showingbag'); ?>">
                          <a href="javascript:void(0)" class="<?php echo e(isInCart($variant->id) ? '' : 'add-to-cart-btn'); ?>"
                            data-id="<?php echo e($variant->id); ?>" title="Add To Cart"
                            <?php if(isInCart($variant->id)): ?> style="pointer-events: none; opacity: 0.4;" <?php endif; ?>>
                            <span class="material-symbols-outlined">local_mall</span>
                          </a>
                        </div>
                      <?php endif; ?>

                      <div class="productinfo">
                        <?php if($variant): ?>
                          <?php echo e($variant->name); ?>

                        <?php else: ?>
                          <?php echo $settings['content'] ?? ''; ?>

                        <?php endif; ?>

                        <a
                          href="<?php echo e($settings['hyper_link'] ?? ($variant && $variant->sku ? route('product.show', $variant->sku) : '#')); ?>">
                          <?php echo e($settings['btn_text'] ?? 'Shop Now'); ?>

                        </a>
                      </div>
                    </div>
                  </div>
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


<?php $__env->startPush('styles'); ?>
  <style>
    /* .grayscale-hover img {
        transition: filter 0.3s ease;
      } */

    /* .grayscale-hover:hover img {
        filter: grayscale(100%);
      } */

    /* .contemporary-card .card-wrp figure:last-child {
        opacity: 1;
      } */

    .swiper__3-pagination {
      display: none !important;
    }
  </style>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\wamp64\www\ecomm-v3\resources\views/frontend/includes/banners/furniture-contemporary.blade.php ENDPATH**/ ?>