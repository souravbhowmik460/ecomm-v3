<?php $__currentLoopData = $variants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <?php
    $productName = $variant->product?->name;
    $searchSlug = str_replace(' ', '-', strtolower($productName));
    $defaultImage = $variant->images[0]->gallery->file_name ?? null;
    $promo = findSalePrice($variant->id);
    $displayPrice = $promo['display_price'];
    $regularPrice = $promo['regular_price'];
    $specialPrice = $promo['special_price'];
    $discount_percent = $promo['display_discount'];

    $isOutOfStock = $variant->inventory?->quantity < 1;

    if ($promo['regular_price_true'] == true) {
        $finalPrice = $regularPrice;
        $isDiscount = false;
    } else {
        $finalPrice = $displayPrice;
        $isDiscount = true;
    }
  ?>

  <div class="swiper-slide">
    <div class="product-card flow-rootX">
      <div class="main-image-wrap border position-relative">
        <form id="add-to-cart-form-<?php echo e($variant->id); ?>" action="<?php echo e(route('cart.add')); ?>" method="POST"
          style="display: none;">
          <?php echo csrf_field(); ?>
          <input type="hidden" name="product_variant_id" value="<?php echo e(Hashids::encode($variant->id)); ?>">
          <input type="hidden" name="quantity" value="1">
          <input type="hidden" name="is_saved_for_later" value="0">
          <input type="hidden" name="action" value="add_to_cart">
        </form>

        <?php if($isDiscount && !$isOutOfStock): ?>
          <div class="tag primary font12">
            <?php echo e($discount_percent); ?> Off
          </div>
        <?php endif; ?>

        <?php if($isOutOfStock): ?>
          <div class="tag out-of-stock font12" style="background-color: #dc3545; color: #fff;">
            Out of Stock
          </div>
        <?php endif; ?>

        <div class="showingbag <?php echo e(isInCart($variant->id) || $isOutOfStock ? 'd-none' : ''); ?>">
          <a href="javascript:void(0)" class="add-to-cart-btn" data-id="<?php echo e(Hashids::encode($variant->id)); ?>"
            data-serial="<?php echo e($variant->id); ?>" title="Add To Cart">
            <span class="material-symbols-outlined">local_mall</span>
          </a>
        </div>

        <div class="main-images ratio ratio-1000x800 position-relative">
          <a class="details_link" href="<?php echo e(route('product.show', $variant->sku)); ?>">
            <div class="image-container">
              <img class="active product-image" alt="<?php echo e($defaultImage ?? 'Product image'); ?>"
                src="<?php echo e($defaultImage ? asset('public/storage/uploads/media/products/images/' . $defaultImage) : asset('public/backend/assetss/images/products/product_thumb.jpg')); ?>"
                style="object-fit: cover;" />
            </div>
            <div class="spinner-border text-primary product-spinner" role="status"
              style="display:none; position:absolute; top:50%; left:50%; transform:translate(-50%,-50%); width:3rem; height:3rem; z-index:10;">
            </div>
          </a>
        </div>
      </div>

      <div class="product-details flow-rootx2">
        <div class="d-flex gap-3 justify-content-between align-items-center">
          <div class="category m-0">
            <h4 class="fw-normal"><a href="<?php echo e(route('product.show', $variant->sku)); ?>" title="<?php echo e($productName); ?>"
                class="font14">
                <?php echo e($productName); ?>

              </a></h4>
          </div>
          <?php if(isset($variant->colorOptions) && $variant->colorOptions->count() > 1): ?>
            <div class="color-option">
              <div class="circles" data-variant-id="<?php echo e(Hashids::encode($variant->id)); ?>">
                <?php $__currentLoopData = $variant->colorOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $colorOption): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php
                    $activeVariant =
                        $variant->variantAttributes->where('attribute_id', 1)->first()->attributeValue->id ==
                        $colorOption->attributeValue->id;
                  ?>
                  <span class="circle <?php echo e($activeVariant ? 'active' : ''); ?>"
                    data-color="<?php echo e($colorOption->attributeValue->value); ?>"
                    data-hex="<?php echo e($colorOption->attributeValue->value_details); ?>"
                    style="background: <?php echo e($colorOption->attributeValue->value_details); ?>; box-shadow: <?php echo e($activeVariant ? '0 0 0 2px #fff, 0 0 0 3px ' . $colorOption->attributeValue->value_details : ''); ?>;"></span>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
            </div>
          <?php endif; ?>
        </div>

        <div class="product_name">
          <h3 class="font18 fw-normal mb-0"><a class="details_link" href="<?php echo e(route('product.show', $variant->sku)); ?>"
              title="<?php echo e($variant->name); ?>"><?php echo e($variant->name); ?></a></h3>
        </div>

        <div class="price font18 mt-0">
          <?php if($isOutOfStock): ?>
            <span class="text-danger">Currently Unavailable</span>
          <?php else: ?>
            <?php echo e(displayPrice($finalPrice)); ?>

            <?php if($isDiscount): ?>
              <span class="old-price ms-2"><?php echo e(displayPrice($regularPrice)); ?></span>
            <?php endif; ?>
          <?php endif; ?>
          <?php if($specialPrice): ?>
            <span class="special-offer-badge-small">Special
              Offer</span>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<?php $__env->startPush('styles'); ?>
  <style>
    .product-card.loading .image-container {
      display: none;
    }

    .product-card .image-container {
      display: block;
    }

    .product-card.loading .product_name,
    .product-card.loading .details_link,
    .product-card.loading .price {
      visibility: hidden;
    }

    .main-image-wrap {
      position: relative;
      background: #f5f5f5;
    }

    /*
                    .special-offer-badge-inline {
                      display: inline-block;
                      margin-left: 0.5rem;
                      padding: 0.15rem 0.4rem;
                      font-size: 0.65rem;
                      font-weight: bold;
                      color: #fff;
                      background: linear-gradient(270deg, #ff416c, #ff4b2b, #ff416c);
                      background-size: 600% 600%;
                      border-radius: 0.25rem;
                      text-transform: uppercase;
                      animation: gradientShift 3s ease infinite, pulse 1.2s infinite;
                      vertical-align: middle;
                    }

                    /* Reuse your existing animations */
    /* @keyframes gradientShift {
                      0% {
                        background-position: 0% 50%;
                      }

                      50% {
                        background-position: 100% 50%;
                      }

                      100% {
                        background-position: 0% 50%;
                      }
                    }

                    @keyframes pulse {

                      0%,
                      100% {
                        transform: scale(1);
                      }

                      50% {
                        transform: scale(1.1);
                      }
                    } */
  </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
  <script>
    class ProductCardUpdater {
      constructor($card) {
        this.$card = $card;
      }

      update(variant) {
        const {
          name,
          url,
          value,
          image,
          image_name,
          sale_price,
          regular_price,
          discount_percent,
          isDiscount,
          in_cart,
          isOutOfStock
        } = variant;

        // Reset state: remove all badges and styles first
        this.$card.find('.tag.out-of-stock').remove();
        this.$card.find('.tag.primary').remove();
        this.$card.find('.price').empty();
        this.$card.find('.showingbag').removeClass('d-none');
        this.$card.find('.showingbag a.add-to-cart-btn').css('display', '');

        // Basic updates
        this.$card.find('.product_name h3 a').text(name);
        this.$card.find('.details_link').attr('href', url);
        this.$card.find('form input[name="product_variant_id"]').val(value);
        this.$card.find('.showingbag a.add-to-cart-btn').attr('data-id', value);
        this.$card.find('.product_variant_id').text(value);

        this.$card.find('img.product-image').attr({
          alt: image_name,
          src: image
        }).addClass('active');

        // Out of stock logic
        if (isOutOfStock) {
          this.$card.find('.showingbag').addClass('d-none');
          this.$card.find('.main-image-wrap').prepend(`
          <div class="tag out-of-stock font12" style="background-color: #dc3545; color: #fff;">Out of Stock</div>
        `);
          this.$card.find('.price').html(`<span class="text-danger">Currently Unavailable</span>`);
          return;
        }
        if (in_cart) {
          this.$card.find('.showingbag').addClass('d-none');
        } else {
          this.$card.find('.showingbag').removeClass('d-none');
        }
        // Price update
        if (isDiscount && sale_price) {
          this.$card.find('.price').html(`
          ${sale_price}<span class="old-price ms-2">${regular_price}</span>
        `);
          // Show discount badge
          this.$card.find('.main-image-wrap').prepend(`
          <div class="tag primary font12">${discount_percent} Off</div>
        `);
        } else {
          this.$card.find('.price').html(regular_price || sale_price || '');
        }
      }
    }

    function debounce(func, wait) {
      let timeout;
      return function executedFunction(...args) {
        const later = () => {
          clearTimeout(timeout);
          func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
      };
    }

    const variantCache = {};

    $(document).on('click', '.color-option .circles .circle', async function() {
      const $circle = $(this);
      const $switcher = $circle.parent();
      const $card = $circle.closest('.product-card').addClass('loading');

      const variantId = $switcher.data('variant-id');
      const color = $circle.data('color');
      const hex = $circle.data('hex');

      $switcher.find('.circle').removeClass('active').css('box-shadow', '');
      $circle.addClass('active').css('box-shadow', `0 0 0 2px #fff, 0 0 0 3px ${hex}`);
      $card.find('img').attr('src', '');

      try {
        const {
          success,
          variant
        } = await $.ajax({
          url: '<?php echo e(route('home.getVariantDetails')); ?>',
          method: 'GET',
          data: {
            variant_id: variantId,
            color
          }
        });

        if (success) new ProductCardUpdater($card).update(variant);
        else $('.error-message').text('Failed to load variant.').show();
      } catch {
        $('.error-message').text('Failed to load variant. Please try again.').show();
      } finally {
        $card.removeClass('loading');
      }
    });
  </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\wamp64\www\ecomm-v3\resources\views/frontend/includes/product-card.blade.php ENDPATH**/ ?>