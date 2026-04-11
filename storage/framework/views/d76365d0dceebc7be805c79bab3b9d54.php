<section class="furniture_category_threeblocks">
  <div class="container-fluid">
    <div class="row">
      <?php $count = 0; ?>

      <?php $__empty_1 = true; $__currentLoopData = $furnitureCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <?php
          $count++;
          $banner = $item['furnitureCategoryBanner'];
          $variant = $item['furnitureCategoryProductVariant'];
          $bannerSettings = json_decode($banner['settings'] ?? '{}', true);
        ?>

        <div class="<?php echo e($count == 2 ? 'col-lg-6' : 'col-lg-3'); ?>">
          <div class="product-with-blur-content">
            <figure>
              <img
                src="<?php echo e(!empty($bannerSettings['image']) ? asset(config('defaults.banner_image_path') . $bannerSettings['image']) : asset('public/frontend/assets/img/home/category_threeblocks_th1.png')); ?>"
                alt="<?php echo e($bannerSettings['alt_text'] ?? ''); ?>" />
            </figure>
            <div class="info">
              <div class="inside flow-rootX c--blackc">
                <?php if($variant): ?>
                  <?php
                    $priceData = findSalePrice($variant['id']);
                  ?>

                  <div class="top flow-rootx2 c--blackc">
                    <h3 class="font30 fw-normal text-center"><?php echo e($variant['name']); ?></h3>
                  </div>

                  <div class="pricebox font20 text-center">
                    <?php if($priceData): ?>
                      <?php if(!$priceData['regular_price_true']): ?>
                        <span><?php echo e(displayPrice($priceData['display_price'])); ?></span>
                      <?php else: ?>
                        <span><?php echo e(displayPrice($priceData['regular_price'])); ?></span>
                      <?php endif; ?>
                    <?php endif; ?>
                  </div>
                <?php else: ?>
                  <?php echo $bannerSettings['content'] ?? ''; ?>

                <?php endif; ?>

                <a href="<?php echo e($bannerSettings['hyper_link'] ?? ($variant && $variant['sku'] ? route('product.show', $variant['sku']) : '#')); ?>"
                  class="btn btn-outline-dark px-4">
                  <?php echo e($bannerSettings['btn_text'] ?? 'View'); ?>

                </a>
              </div>
            </div>
          </div>
        </div>

      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

        <div class="col-lg-3">
          <div class="product-with-blur-content">
            <figure><img src="<?php echo e(asset('public/frontend/assets/img/home/category_threeblocks_th1.png')); ?>"
                alt="Mayuri" title="Mayuri" /></figure>
            <div class="info">
              <div class="inside flow-rootX2 c--blackc">
                <div class="top flow-rootx2 c--blackc pb-3">
                  <h4 class="font16 fw-normal text-center mb-0">New Arrival</h4>
                  <h3 class="font35 fw-normal text-center">Chair</h3>
                </div>
                <div class="pricebox font25 text-center"><span>$</span>750.00</div>
                <a href="javascript:void();" class="btn btn-outline-dark px-4 py-2" title="View">View</a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="product-with-blur-content">
            <figure><img src="<?php echo e(asset('public/frontend/assets/img/home/category_threeblocks_th2.png')); ?>"
                alt="Mayuri" title="Mayuri" /></figure>
            <div class="info">
              <div class="inside flow-rootX2 c--blackc">
                <div class="top flow-rootx2 c--blackc pb-3">
                  <h4 class="font16 fw-normal text-center mb-0">New Arrival</h4>
                  <h3 class="font35 fw-normal text-center">Coffee Table</h3>
                </div>
                <div class="pricebox font25 text-center"><span>$</span>750.00</div>
                <a href="javascript:void();" class="btn btn-outline-dark px-4 py-2" title="View">View</a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-3">
          <div class="product-with-blur-content">
            <figure><img src="<?php echo e(asset('public/frontend/assets/img/home/category_threeblocks_th3.png')); ?>"
                alt="Mayuri" title="Mayuri" /></figure>
            <div class="info">
              <div class="inside flow-rootX2 c--blackc">
                <div class="top flow-rootx2 c--blackc pb-3">
                  <h4 class="font16 fw-normal text-center mb-0">New Arrival</h4>
                  <h3 class="font35 fw-normal text-center">Chair</h3>
                </div>
                <div class="pricebox font25 text-center"><span>$</span>750.00</div>
                <a href="javascript:void();" class="btn btn-outline-dark px-4 py-2" title="View">View</a>
              </div>
            </div>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>



<?php /**PATH C:\wamp64\www\ecomm-v3\resources\views/frontend/includes/banners/furniture-category.blade.php ENDPATH**/ ?>