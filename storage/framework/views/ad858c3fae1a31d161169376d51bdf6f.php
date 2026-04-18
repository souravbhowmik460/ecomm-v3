<div class="furniture__menuwrap">
  <div class="container-xxl">
    <div class="row">
      <div class="col-lg-12">
        <nav class="navbar navbar-expand-xl navbar-light">
          <div class="container-fluid p-0">

            <a href="<?php echo e(route('home')); ?>" title="<?php echo e($siteSettings['sitename'] ?? 'Neuwrld'); ?>" class="mobilelogo"
              id="ham-menu">
              <img src="<?php echo e(siteLogo()); ?>" alt="<?php echo e($siteSettings['sitename'] ?? 'Neuwrld'); ?>" />
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="main_nav">

              
              <ul class="navbar-nav left-items">

                <?php $__currentLoopData = $navMenus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $navMenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php
                    $hasChildren = $navMenu->children->isNotEmpty();
                    $hasGrandChildren = false;

                    if ($hasChildren) {
                        foreach ($navMenu->children as $child) {
                            if ($child->children->isNotEmpty()) {
                                $hasGrandChildren = true;
                                break;
                            }
                        }
                    }
                  ?>

                  
                  
                  
                  <?php if($hasGrandChildren): ?>
                    <li class="nav-item dropdown has-megamenu">
                      <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        <?php echo e($navMenu->title); ?>

                      </a>

                      <div class="dropdown-menu megamenu">
                        <div class="row g-3">

                          
                          <div class="col-lg-8 col-8">
                            <div class="col-megamenu_wrap">

                              <?php $__currentLoopData = $navMenu->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subnavMenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-megamenu">
                                  <h6 class="text-uppercase font18 fw-medium mb-2">
                                    <?php echo e($subnavMenu->title); ?>

                                  </h6>

                                  <ul class="list-unstyled">
                                    <?php $__currentLoopData = $subnavMenu->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <li>
                                        <a
                                          href="<?php echo e(filter_var($level3->slug, FILTER_VALIDATE_URL)
                                              ? $level3->slug
                                              : ($level3->slug == '#' || empty($level3->slug)
                                                  ? '#'
                                                  : route('category.slug', $level3->slug))); ?>">
                                          <?php echo e($level3->title); ?>

                                        </a>
                                      </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  </ul>
                                </div>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </div>
                          </div>

                          
                          <div class="col-lg-4 col-4">
                            <div class="menu-banner">
                              <figure class="m-0">
                                <a href="<?php echo e(route('category.slug', $navMenu->slug)); ?>" class="mega-banner-link">

                                  <img
                                    src="<?php echo e(!empty($navMenu->category_image)
                                        ? asset('/public/storage/uploads/categories/' . $navMenu->category_image)
                                        : asset('public/frontend/assets/img/home/megamenu-banner.jpg')); ?>"
                                    alt="<?php echo e($navMenu->title); ?>" title="<?php echo e($navMenu->title); ?>"
                                    class="imageFit img-with-radius" />

                                </a>
                              </figure>
                            </div>
                          </div>

                        </div>
                      </div>
                    </li>

                    
                    
                    
                  <?php elseif($hasChildren): ?>
                    <li class="nav-item dropdown has-singleListing">
                      <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        <?php echo e($navMenu->title); ?>

                      </a>

                      <div class="dropdown-menu singleListing-menu">
                        <div class="dropdown-content">

                          <?php $__currentLoopData = $navMenu->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subnavMenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e(filter_var($subnavMenu->slug, FILTER_VALIDATE_URL)
                                ? $subnavMenu->slug
                                : ($subnavMenu->slug == '#' || empty($subnavMenu->slug)
                                    ? '#'
                                    : route('category.slug', $subnavMenu->slug))); ?>"
                              class="dropdown-item">
                              <?php echo e($subnavMenu->title); ?>

                            </a>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                      </div>
                    </li>

                    
                    
                    
                  <?php else: ?>
                    <li class="nav-item">
                      <a class="nav-link"
                        href="<?php echo e(filter_var($navMenu->slug, FILTER_VALIDATE_URL) ? $navMenu->slug : route('category.slug', $navMenu->slug)); ?>">
                        <?php echo e($navMenu->title); ?>

                      </a>
                    </li>
                  <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

              </ul>

              
              <ul class="navbar-nav ms-auto right-items gap-4">
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo e(route('cms.page', 'contact-us')); ?>">
                    Help
                  </a>
                </li>
              </ul>

            </div>
          </div>
        </nav>
      </div>
    </div>
  </div>
</div>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    // Initialize all dropdowns
    document.querySelectorAll('.dropdown-toggle').forEach(function(toggle) {
      // Create Bootstrap dropdown instance
      const dropdown = new bootstrap.Dropdown(toggle);
      // Ensure click toggles show/hide correctly
      toggle.addEventListener('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        // Close other open dropdowns first (optional)
        document.querySelectorAll('.dropdown-menu.show').forEach(menu => {
          if (menu !== toggle.nextElementSibling) {
            menu.classList.remove('show');
          }
        });
        document.querySelectorAll('.dropdown-toggle.show').forEach(btn => {
          if (btn !== toggle) {
            btn.classList.remove('show');
          }
        });
        // Toggle the clicked dropdown
        dropdown.toggle();
      });
    });
    // Close dropdowns when clicking outside
    document.addEventListener('click', function(e) {
      if (!e.target.closest('.dropdown')) {
        document.querySelectorAll('.dropdown-menu.show').forEach(menu => menu.classList.remove('show'));
        document.querySelectorAll('.dropdown-toggle.show').forEach(toggle => toggle.classList.remove('show'));
      }
      // Close navbar collapse if clicking outside navbar
      if (!e.target.closest('.navbar')) {
        const collapse = document.getElementById('main_nav');
        if (collapse && collapse.classList.contains('show')) {
          const bsCollapse = bootstrap.Collapse.getInstance(collapse);
          if (bsCollapse) bsCollapse.hide();
        }
      }
    });
    // Handle ham-menu click for mobile toggle
    const hamMenu = document.getElementById('ham-menu');
    if (hamMenu) {
      hamMenu.addEventListener('click', function(e) {
        e.preventDefault();
        const collapse = document.getElementById('main_nav');
        if (collapse) {
          const bsCollapse = bootstrap.Collapse.getInstance(collapse);
          if (bsCollapse) {
            bsCollapse.toggle();
          }
        }
      });
    }
  });
</script>
<script>
  document.querySelectorAll('.mega-banner-link').forEach(function(link) {
    link.addEventListener('click', function(e) {
      e.preventDefault(); // prevent default blocked click
      window.location.href = link.href; // navigate manually
    });
  });
</script>
<?php /**PATH C:\wamp64\www\ecomm-v3\resources\views/frontend/layouts/includes/navbar.blade.php ENDPATH**/ ?>