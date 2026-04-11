<?php $__env->startSection('title', @$title); ?>

<?php $__env->startSection('content'); ?>

  <?php echo $__env->make('frontend.includes.banners.offer-slider', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
  <main>
    <?php echo $__env->make('frontend.includes.banners.main-slider', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('frontend.includes.banners.furniture-category', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('frontend.includes.banners.block-wrap', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('frontend.includes.banners.brand-slider', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    
    <?php echo $__env->make('frontend.includes.banners.furniture-contemporary', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('frontend.includes.banners.furniture-sale-block', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <?php echo $__env->make('frontend.includes.slider', [
        'heading' => 'Todays Deals',
        'slug' => '',
        'collections' => $productCategories,
        'defaultCategory' => $productCategories->first()->slug ?? '',
        'slugRoute' => 'category.slug',
        'listRoute' => 'category.list',
        'options' => true,
    ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    


    <?php if($recentlyViewedPrtoducts->count() > 0): ?>
      <?php echo $__env->make('frontend.pages.home.recently-viewed-products', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php endif; ?>


    <?php echo $__env->make('frontend.includes.banners.keep-flowing', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <?php echo $__env->make('frontend.includes.banners.subscribe', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    
  </main>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
  <script>
    $(document).ready(function() {
      const speed = $('.marquee').data('speed') || 30000; // fallback to 30 seconds

      $('.marquee').marquee({
        direction: 'left',
        duration: speed,
        gap: 0,
        delayBeforeStart: 0,
        duplicated: true,
        pauseOnHover: true
      });
    });
  </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontend.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\ecomm-v3\resources\views/frontend/pages/home/index.blade.php ENDPATH**/ ?>