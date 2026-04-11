

<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['filter' => true]));

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

foreach (array_filter((['filter' => true]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<div class="card card-h-100">
  <div class="d-flex card-header justify-content-between align-items-center">
    <h4 class="header-title">Top Products (Orders)</h4>

    <?php if($filter): ?>
      <div class="input-group input-group-text font-14 bg-white" id="topProductsRange" wire:ignore>
        <i class="mdi mdi-calendar-range me-2"></i>
        <span></span>
      </div>
    <?php endif; ?>
  </div>

  <div class="card-body">
    <div id="topProductsChart"></div>
  </div>
</div>

<?php $__env->startPush('component-scripts'); ?>
  <script>
    document.addEventListener('DOMContentLoaded', () => {

      let chart;

      const fetchData = (start, end) => {
        fetch('<?php echo e(route('admin.reports.top-products-json')); ?>', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
            },
            body: JSON.stringify({
              start_date: start,
              end_date: end
            })
          })
          .then(res => res.json())
          .then(options => {
            if (chart) chart.destroy();
            chart = new ApexCharts(document.querySelector("#topProductsChart"), options);
            chart.render();
          });
      };

      const start = moment().startOf('year');
      const end = moment();

      $('#topProductsRange').daterangepicker({
        startDate: start,
        endDate: end,
        locale: {
          format: 'YYYY-MM-DD'
        }
      }, function(start, end) {
        $('#topProductsRange span').html(
          start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY')
        );
        fetchData(start.format('YYYY-MM-DD'), end.format('YYYY-MM-DD'));
      });

      $('#topProductsRange span').html(
        start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY')
      );

      fetchData(start.format('YYYY-MM-DD'), end.format('YYYY-MM-DD'));
    });
  </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\wamp64\www\ecomm-v3\resources\views/backend/includes/top-products.blade.php ENDPATH**/ ?>