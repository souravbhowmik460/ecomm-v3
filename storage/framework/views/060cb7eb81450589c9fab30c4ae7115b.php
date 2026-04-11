<div>
  <div class="modal genericmodal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true"
    wire:ignore.self>
    <div class="modal-dialog modal-xxl">
      <div class="modal-content">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="modal-body">
          <form class="allForm" wire:submit.prevent>
            <div class="form-element">
              <span class="material-symbols-outlined">search</span>
              <input name="search" type="text" class="searchcontent"
                placeholder="Search for products, brands and more" wire:model.live.debounce.500ms="search_products"
                autocomplete="off">
            </div>

            <!--[if BLOCK]><![endif]--><?php if($showResults && $variants->isNotEmpty()): ?>
              <ul class="search_lists modal_scroll data-simplebar active" data-lenis-prevent>
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $variants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li class="search_items">
                    <div class="withresult">
                      <a href="<?php echo e($this->generateSearchUrl($variant)); ?>"
                        title="<?php echo e($variant->name ?? 'Unnamed Variant'); ?>">
                      </a>
                      <figure class="ratio ratio-1000x800 mb-0 border">
                        <img src="<?php echo e(get_default_variant_image($variant)); ?>"
                          alt="<?php echo e($variant->name ?? 'Unnamed Variant'); ?>"
                          title="<?php echo e($variant->name ?? 'Unnamed Variant'); ?>" />
                      </figure>
                      <div class="info">
                        <h4 class="font18 mb-0">
                          <strong><?php echo e($variant->name ?? 'Unnamed Variant'); ?></strong>
                        </h4>
                        <p class="font16 mb-0">
                          <?php echo e($variant->product_name); ?> - <?php echo e($variant->category_name); ?>

                        </p>
                      </div>
                    </div>
                  </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
              </ul>
            <?php elseif($showResults && $variants->isEmpty()): ?>
              <div class="no-results">
                <p>No Products found matching "<?php echo e($search_products); ?>"</p>
              </div>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php $__env->startPush('component-scripts'); ?>
  <script>
    document.addEventListener('livewire:initialized', () => {
      const searchModal = document.getElementById('searchModal');
      const searchInput = searchModal.querySelector('.searchcontent');

      searchModal.addEventListener('hidden.bs.modal', () => {
        Livewire.dispatch('clearSearch');
      });

      searchModal.addEventListener('shown.bs.modal', () => {
        searchInput.focus();
      });

      searchInput.addEventListener('keydown', (event) => {
        if (event.key === 'Enter') {
          event.preventDefault();

          const searchText = searchInput.value.trim().toLowerCase();
          const allLinks = searchModal.querySelectorAll('.search_items .withresult a');

          let exactMatch = null;

          allLinks.forEach(link => {
            const href = link.getAttribute('href') || '';
            const sku = href.split('/product/').pop().toLowerCase();

            if (sku === searchText) {
              exactMatch = link;
            }
          });

          if (exactMatch && exactMatch.href) {
            // Exact SKU match → go to product detail
            window.location.href = exactMatch.href;
          } else {
            // Otherwise → go to general search page
            const baseSearchUrl = "<?php echo e(route('base.search')); ?>";
            window.location.href = `${baseSearchUrl}?q=${encodeURIComponent(searchText)}`;
          }
        }
      });

    });
  </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\wamp64\www\ecomm-v3\resources\views/livewire/frontend-search.blade.php ENDPATH**/ ?>