<!-- Footer Start -->
<?php
  //dd($siteSettings);
?>
<section class="furniture_footer fullBG mt-0">
  <div class="container">
    <div class="footer-logo-wrap">


      <div class="row align-items-center">
        <div class="col-lg-6">
          <a href="<?php echo e(route('home')); ?>" class="footer-logo">
            <img src="<?php echo e(siteLogo()); ?>" alt="log0" title="logo" style="width: 60%" />
          </a>
        </div>
        <div class="col-lg-6">
          <ul class="footer-menu">
            
            <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slug => $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li><a href="<?php echo e(url($slug)); ?>" title="<?php echo e($page->title); ?>"><?php echo e($page->title); ?></a></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
            
            
          </ul>
          <!-- <div class="footer_linkblock_wrap" style="column-gap: 65rem;">
          <div class="footer_links">
            <ul>
              <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slug => $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

              <li>
                <a href="<?php echo e(url($slug)); ?>" title="<?php echo e($page->title); ?>">
                  <?php echo e($page->title); ?>

                </a>
              </li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              
              <li>
                <a href="<?php echo e(url('blogs')); ?>" title="Blog">
                  Blog
                </a>
              </li>
            </ul>
          </div>
        </div> -->
        </div>
      </div>
    </div>
    <?php if(optional($siteSettings)['google_play_link'] || optional($siteSettings)['apple_app_link']): ?>
      <div class="row">
        <div class="col-lg-12">
          <div class="popular_brands_wrap">
            <div class="popular_brands flow-rootX">
            </div>
            <div class="download_app flow-rootX">
              <h5 class="font20 fw-medium mb-3">Download our App</h5>
              <div class="d-flex align-items-center justify-content-start gap-2">
                <?php if($siteSettings['google_play_link']): ?>
                  <a href="<?php echo e($siteSettings['google_play_link'] ?? 'javascript:void();'); ?>" title=""><img
                      src="<?php echo e(asset('public/frontend/assets/img/footer/google_play.png')); ?>" alt="Google Play"
                      title="Google Play" /></a>
                <?php endif; ?>
                <?php if($siteSettings['apple_app_link']): ?>
                  <a href="<?php echo e($siteSettings['apple_app_link'] ?? 'javascript:void();'); ?>" title=""><img
                      src="<?php echo e(asset('public/frontend/assets/img/footer/ios_app.png')); ?>" alt="App Store"
                      title="App Store" /></a>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php endif; ?>
    <div class="row">
      <div class="col-lg-12">
        <div class="we_accept_wrap">
          <div class="we-accept d-flex align-items-center gap-3">
            <h5 class="font20 mb-0">We Accept</h5>
            <div class="iconswrp d-flex align-items-center gap-2">
              <span><img src="<?php echo e(asset('public/frontend/assets/img/footer/visa.jpg')); ?>" alt="Visa"
                  title="Visa" /></span>
              <span><img src="<?php echo e(asset('public/frontend/assets/img/footer/american-express.jpg')); ?>"
                  alt="American Express" title="American Express" /></span>
              <span><img src="<?php echo e(asset('public/frontend/assets/img/footer/mastercard.jpg')); ?>" alt="Mastercard"
                  title="Mastercard" /></span>
              <span><img src="<?php echo e(asset('public/frontend/assets/img/footer/dinersclub.jpg')); ?>" alt="Diners Club"
                  title="Diners Club" /></span>
              <span><img src="<?php echo e(asset('public/frontend/assets/img/footer/maestro.jpg')); ?>" alt="Maestro"
                  title="Maestro" /></span>
              <span><img src="<?php echo e(asset('public/frontend/assets/img/footer/rupay.jpg')); ?>" alt="RuPay"
                  title="RuPay" /></span>
            </div>
          </div>
          <div class="follow-us d-flex justify-content-end align-items-center gap-4">
            <h5 class="font20 mb-0">Follow Us</h5>
            <div class="socialwrap d-flex align-items-center gap-3">
              <span><a href="<?php echo e($siteSettings['x_link'] ?? 'javascript:void();'); ?>" title="Twitter"
                  class="twitter"><img src="<?php echo e(asset('public/frontend/assets/img/footer/twitter.svg')); ?>"
                    alt="Twitter" title="Twitter" /></a></span>
              <span><a href="<?php echo e($siteSettings['youtube_link'] ?? 'javascript:void();'); ?>" title="YouTube"
                  class="youtube"><img src="<?php echo e(asset('public/frontend/assets/img/footer/youtube.svg')); ?>"
                    alt="YouTube" title="YouTube" /></a></span>
              <span><a href="<?php echo e($siteSettings['instagram_link'] ?? 'javascript:void();'); ?>" title="Instagram"
                  class="instagram"><img src="<?php echo e(asset('public/frontend/assets/img/footer/instagram.svg')); ?>"
                    alt="Instagram" title="Instagram" /></a></span>
              <span><a href="<?php echo e($siteSettings['facebook_link'] ?? 'javascript:void();'); ?>" title="Facebook"
                  class="facebook"><img src="<?php echo e(asset('public/frontend/assets/img/footer/facebook.svg')); ?>"
                    alt="Facebook" title="Facebook" /></a></span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-0">
      <div class="col-lg-12">
        <div class="footer_links_wrp">
          <div class="copyrightwrp w-100 d-flex align-items-center justify-content-between">
            <span class="font16 copyrightwrp-items">
              <?php if(!empty($terms_and_conditions_page)): ?>
                <a href="<?php echo e(route('cms.page', $terms_and_conditions_page->slug)); ?>">
                  <?php echo e($terms_and_conditions_page->title); ?>

                </a>
              <?php endif; ?>

              <?php if(!empty($privacy_policy_page)): ?>
                | <a href="<?php echo e(route('cms.page', $privacy_policy_page->slug)); ?>">
                  <?php echo e($privacy_policy_page->title); ?>

                </a>
              <?php endif; ?>
            </span>
            <span class="font18 d-flex gap-4"> <span>© Copyright <?php echo e($siteSettings['sitename'] ?? 'Mayuri'); ?></span>
              
          </div>
        </div>
      </div>
    </div>
  </div>
  <a href="javascript:void(0)" class="back-to-top" id="backtotop">
    <span class="material-symbols-outlined">north</span>
  </a>
</section>
<!-- Footer End -->
<?php /**PATH C:\wamp64\www\ecomm-v3\resources\views/frontend/layouts/includes/footer.blade.php ENDPATH**/ ?>