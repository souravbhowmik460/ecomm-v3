<?php if($items->count()): ?>
  <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="cart_page_block border" id="product-cart-item-<?php echo e($item->productVariant->id); ?>">
      <div class="product_thumb">
        <figure class="m-0 ratio ratio-1000x800">
          <a href="<?php echo e(route('product.show', $item->productVariant->sku)); ?>"
            title="<?php echo e($item->productVariant->name ?? ''); ?>">
            <img
              src="<?php echo e(!empty($item->productVariant->galleries[0]['file_name'])
                  ? asset('public/storage/uploads/media/products/images/' . $item->productVariant->galleries[0]['file_name'])
                  : asset('public/backend/assetss/images/products/product_thumb.jpg')); ?>"
              alt="<?php echo e($item->productVariant->name ?? ''); ?>" class="imageFit">
          </a>
        </figure>
      </div>

      <div class="product_info border-start d-flex justify-content-center flex-column p-4 flow-rootX2">

        <div class="cart-action d-flex justify-content-end align-items-center gap-3">
          <a href="#" class="action_remove c--blackc d-flex align-items-center gap-2 "
            onclick="event.preventDefault(); document.getElementById('<?php echo e('remove-form'); ?>-<?php echo e($item->product_variant_id); ?>').submit()">
            <span class="material-symbols-outlined font20">delete</span>
            <u>Remove</u>
          </a>
          <form id="remove-form-<?php echo e($item->product_variant_id); ?>" action="<?php echo e(route('cart.remove')); ?>" method="POST"
            style="display: none;">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="product_variant_id" value="<?php echo e(Hashids::encode($item->product_variant_id)); ?>">
          </form>

          <?php if(auth()->check()): ?>
            <a href="javascript:void(0);" data-id="<?php echo e(Hashids::encode($item->product_variant_id)); ?>"
              data-serial="<?php echo e($item->product_variant_id); ?>"
              class="action_savelater add-to-wishlist-btn c--blackc d-flex align-items-center gap-2">
              <span class="material-symbols-outlined font20"> update</span>
              <u>Move to Wishlist</u>
            </a>
            
            <form id="add-to-wishlist-form-<?php echo e($item->productVariant->id); ?>" action="<?php echo e(route('cart.add')); ?>"
              method="POST" style="display: none;">
              <?php echo csrf_field(); ?>
              <input type="hidden" name="product_variant_id" value="<?php echo e(Hashids::encode($item->productVariant->id)); ?>">
              <input type="hidden" name="quantity" value="1">
              <input type="hidden" name="is_saved_for_later" value="1">
              <input type="hidden" name="action" value="add_to_wishlist">
            </form>
          <?php endif; ?>

        </div>
        <?php
          $variantName = trim($item->productVariant->name ?? '');

          // Normalize extra spaces and casing
          $variantName = preg_replace('/\s+/', ' ', $variantName);

          // Split by space
          $parts = explode(' ', $variantName);

          // Define what units might appear at the end
          $unitPattern = '/^(?:\d+(\.\d+)?\s?(?:g|kg|ml|l|ltr|litre|litres|pcs|piece|pack))$/i';

          $selectedVariant = '';
          $baseName = $variantName;

          // If the last word matches a unit pattern → treat as variant
          if (!empty($parts) && preg_match($unitPattern, end($parts))) {
              $selectedVariant = strtoupper(array_pop($parts));
              $baseName = trim(implode(' ', $parts));
          }
        ?>
        <div class="product_name_category flow-rootx">
          <a style="all: unset; cursor: pointer;" href="<?php echo e(route('product.show', $item->productVariant->sku)); ?>">
            <h5 class="font35 fw-normal c--blackc mt-0"><?php echo e($item->productVariant->name ?? ''); ?></h5>
            
            </h4>
          </a>
        </div>

        <?php if (isset($component)) { $__componentOriginal806375e7513d5d7f92c8588223a61385 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal806375e7513d5d7f92c8588223a61385 = $attributes; } ?>
<?php $component = App\View\Components\ProductPrice::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('product-price'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\ProductPrice::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($item->productVariant)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal806375e7513d5d7f92c8588223a61385)): ?>
<?php $attributes = $__attributesOriginal806375e7513d5d7f92c8588223a61385; ?>
<?php unset($__attributesOriginal806375e7513d5d7f92c8588223a61385); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal806375e7513d5d7f92c8588223a61385)): ?>
<?php $component = $__componentOriginal806375e7513d5d7f92c8588223a61385; ?>
<?php unset($__componentOriginal806375e7513d5d7f92c8588223a61385); ?>
<?php endif; ?>

        <?php if($cart_action): ?>
          <div class="cart-itemadd-less d-flex justify-content-end mt-2">
            <?php if($errors->has('quantity.' . $item->product_variant_id)): ?>
              <div class="error pt-3 me-2">
                <?php echo e($errors->first('quantity.' . $item->product_variant_id)); ?>

              </div>
            <?php endif; ?>
            <?php if($errors->has('cart')): ?>
              <div class="error pt-3 me-2">
                <?php echo e($errors->first('cart')); ?>

              </div>
            <?php endif; ?>

            <?php
              $display_quantity = $display_quantity ?? false;
            ?>
            <?php if($display_quantity): ?>
              <?php
                $decrementCondition = $item->quantity <= 1;
                $incrementCondition = $item->quantity >= $item->productVariant->inventory->quantity;
              ?>

              <form id="decrement-form-<?php echo e($item->product_variant_id); ?>" action="<?php echo e(route('cart.updateQuantity')); ?>"
                method="POST" style="display: none;">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="product_variant_id"
                  value="<?php echo e(Hashids::encode($item->product_variant_id)); ?>">
                <input type="hidden" name="quantity" value="<?php echo e($item->quantity - 1); ?>">
              </form>

              <form id="increment-form-<?php echo e($item->product_variant_id); ?>" action="<?php echo e(route('cart.updateQuantity')); ?>"
                method="POST" style="display: none;">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="product_variant_id"
                  value="<?php echo e(Hashids::encode($item->product_variant_id)); ?>">
                <input type="hidden" name="quantity" value="<?php echo e($item->quantity + 1); ?>">
              </form>

              
              <div class="number_product">
                <?php
                  $quantity = $item->quantity ?? 1;
                ?>
                <input type="text" value="<?php echo e($quantity); ?>" readonly />

                
                <span class="minus">
                  <span class="material-symbols-outlined <?php echo e($decrementCondition ? 'text-muted disabled' : ''); ?>"
                    style="cursor: <?php echo e($decrementCondition ? 'not-allowed' : 'pointer'); ?>; color: <?php echo e($decrementCondition ? 'red' : ''); ?>"
                    onclick="<?php echo e(!$decrementCondition ? "event.preventDefault(); document.getElementById('decrement-form-{$item->product_variant_id}').submit()" : ''); ?>">
                    keyboard_arrow_down
                  </span>
                </span>

                
                <span class="plus">
                  <span class="material-symbols-outlined"
                    onclick="event.preventDefault(); document.getElementById('increment-form-<?php echo e($item->product_variant_id); ?>').submit()">
                    keyboard_arrow_up
                  </span>
                </span>
              </div>
            <?php else: ?>
              <div class="number_product d-flex align-items-center">
                X <?php echo e($item->quantity); ?>

              </div>
            <?php endif; ?>
          </div>
        <?php else: ?>
          <div class="cart-item-quantity d-flex align-items-center justify-content-end mt-2">
            <span class="text-muted fs-4">X <?php echo e($item->quantity); ?></span>
          </div>
        <?php endif; ?>
      </div>
    </div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
  <div class="text-center border p-5">
    <h4>Your cart is empty.</h4>
  </div>
<?php endif; ?>
<?php /**PATH C:\wamp64\www\ecomm-v3\resources\views/frontend/includes/cart_items.blade.php ENDPATH**/ ?>