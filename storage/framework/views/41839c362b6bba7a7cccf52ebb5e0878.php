<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['variant']));

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

foreach (array_filter((['variant']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
  $promo = findSalePrice($variant->id);
  $displayPrice = $promo['display_price'];
  $regularPrice = $promo['regular_price'];
  $discount = $promo['display_discount'];
?>

<div class="product-details-price d-flex align-items-center gap-3">
  <?php if($promo['regular_price_true'] == true): ?>
    <p class="m-0 font30 price-wrapper d-flex gap-3">
      <span class="c--primary"><?php echo e(displayPrice($regularPrice)); ?></span>
    </p>
  <?php else: ?>
    <p class="m-0 font30 price-wrapper d-flex gap-3">
      <span class="c--primary"><?php echo e(displayPrice($displayPrice)); ?></span>
      <span class="c--oldprice text-decoration-line-through"><?php echo e(displayPrice($regularPrice)); ?></span>
    </p>
    <?php if($discount > 0): ?>
      <p class="m-0 font18 c--success">(<?php echo e($discount); ?> Discount)</p>
    <?php else: ?>
      <p class="m-0 font18 c--success">(No Discount)</p>
    <?php endif; ?>
  <?php endif; ?>
</div>
<?php /**PATH C:\wamp64\www\ecomm-v3\resources\views/components/product-price.blade.php ENDPATH**/ ?>