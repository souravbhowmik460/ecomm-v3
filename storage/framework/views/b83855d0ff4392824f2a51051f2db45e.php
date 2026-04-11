<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['c_items' => [], 's_items' => [], 'cart_action' => true, 'display_quantity']));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['c_items' => [], 's_items' => [], 'cart_action' => true, 'display_quantity']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<div class="furniture_cart_left">
  <div class="inside flow-rootX3">
    <div class="cart_block flow-rootX2">
      <div class="cart_grid flow-rootX">
        
        <div id="cart-items-wrapper" class="flow-rootX2">
          <?php echo $__env->make('frontend.includes.cart_items', ['items' => $c_items,'display_quantity' => $display_quantity], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>

        
         
         <?php if(request()->segment(1) !== 'checkout'): ?>
            <h2 class="mt-5 mb-3">Wishlist</h2>
            <div id="wishlist-items-wrapper">
              <?php echo $__env->make('frontend.includes.wishlist_items', ['items' => $s_items], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            </div>
          <?php endif; ?>
      </div>
    </div>
  </div>
</div>
<?php /**PATH C:\wamp64\www\ecomm-v3\resources\views/components/cart-items.blade.php ENDPATH**/ ?>