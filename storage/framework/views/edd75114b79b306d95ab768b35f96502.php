<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['filter' => true, 'link' => false]));

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

foreach (array_filter((['filter' => true, 'link' => false]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<div class="card card-h-100">
  <div class="d-flex card-header justify-content-between align-items-center">
    <h4 class="header-title">Conversion Overview</h4>

    <?php if($filter): ?>
      <div class="dropdown ms-1">
        <div class="d-flex me-2">
          <div class="input-group input-group-text font-14 bg-white" id="conversionStatusRange" wire:ignore>
            <i class="mdi mdi-calendar-range font-14 d-flex me-2"></i>
            <span></span>
          </div>
        </div>
      </div>
    <?php endif; ?>

    <div class="dropdown ms-1">
      <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown">
        <i class="mdi mdi-dots-vertical"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-end">
        <a href="javascript:void(0);" class="dropdown-item" id="downloadPngConversion">
          Download PNG
        </a>
        <a href="javascript:void(0);" class="dropdown-item" id="downloadCsvConversion">
          Download CSV
        </a>
      </div>
    </div>
  </div>

  <div class="card-body">
    <div id="conversionStatusChart"></div>
  </div>
</div>

<?php $__env->startPush('component-scripts'); ?>
<script>
document.addEventListener('DOMContentLoaded', () => {
  const chartElement = document.getElementById("conversionStatusChart");
  let chart = null;

  document.getElementById('downloadPngConversion').addEventListener('click', () => {
    if (chart) {
      chart.dataURI().then(({ imgURI }) => {
        const link = document.createElement("a");
        link.href = imgURI;
        link.download = `conversion-status-${Date.now()}.png`;
        link.click();
      });
    }
  });

  document.getElementById('downloadCsvConversion').addEventListener('click', () => {
    if (chart) chart.exportToCSV();
  });

  const fetchChartData = (start, end) => {
    fetch('<?php echo e(route('admin.reports.conversion-status-json')); ?>', {
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
    .then(r => r.json())
    .then(options => {
      if (chart) chart.destroy();
      chart = new ApexCharts(chartElement, options);
      chart.render();
    });
  };

  const startOfYear = moment().startOf('year').format('YYYY-MM-DD');
  const today = moment().format('YYYY-MM-DD');

  $('#conversionStatusRange').daterangepicker({
    startDate: startOfYear,
    endDate: today,
    locale: { format: 'YYYY-MM-DD' }
  }, (start, end) => {
    $('#conversionStatusRange span').html(`${start.format('MMMM D, YYYY')} - ${end.format('MMMM D, YYYY')}`);
    fetchChartData(start.format('YYYY-MM-DD'), end.format('YYYY-MM-DD'));
  });

  $('#conversionStatusRange span').html(
    `${moment(startOfYear).format('MMMM D, YYYY')} - ${moment(today).format('MMMM D, YYYY')}`
  );

  fetchChartData(startOfYear, today);
});
</script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\wamp64\www\ecomm-v3\resources\views/backend/includes/conversion-status.blade.php ENDPATH**/ ?>