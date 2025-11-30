<script src="<?php echo e(asset('BS/assets/libs/jquery/dist/jquery.min.js')); ?>"></script>
  <script src="<?php echo e(asset('BS/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')); ?>"></script>
  <script src="<?php echo e(asset('BS/assets/js/sidebarmenu.js')); ?>"></script>
  <script src="<?php echo e(asset('BS/assets/js/app.min.js')); ?>"></script>
  <script src="<?php echo e(asset('BS/assets/libs/simplebar/dist/simplebar.js')); ?>"></script>
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
  <script src="<?php echo e(asset('alert/dist/sweetalert2.all.min.js')); ?>"></script>

  <?php $__sessionArgs = ['success'];
if (session()->has($__sessionArgs[0])) :
if (isset($value)) { $__sessionPrevious[] = $value; }
$value = session()->get($__sessionArgs[0]); ?>
  <script>
    Swal.fire({
      title: "Sukses",
      text: "<?php echo e(session('success')); ?>",
      icon: "success"
    });
  </script>
  <?php unset($value);
if (isset($__sessionPrevious) && !empty($__sessionPrevious)) { $value = array_pop($__sessionPrevious); }
if (isset($__sessionPrevious) && empty($__sessionPrevious)) { unset($__sessionPrevious); }
endif;
unset($__sessionArgs); ?>

  <?php $__sessionArgs = ['error'];
if (session()->has($__sessionArgs[0])) :
if (isset($value)) { $__sessionPrevious[] = $value; }
$value = session()->get($__sessionArgs[0]); ?>
  <script>
    Swal.fire({
      title: "Gagal",
      text: "<?php echo e(session('error')); ?>",
      icon: "error"
    });
  </script>
  <?php unset($value);
if (isset($__sessionPrevious) && !empty($__sessionPrevious)) { $value = array_pop($__sessionPrevious); }
if (isset($__sessionPrevious) && empty($__sessionPrevious)) { unset($__sessionPrevious); }
endif;
unset($__sessionArgs); ?>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <script>
    (function () {
      const canvas = document.getElementById('chartSiswa');
      if (!canvas) return;

   
      let labels = null;
      let data = null;

      <?php if(isset($muridPerKelas)): ?>
        labels = <?php echo json_encode($muridPerKelas->pluck('nama_kelas'), 15, 512) ?>;
        data   = <?php echo json_encode($muridPerKelas->pluck('murid_count'), 15, 512) ?>;
      <?php elseif(isset($labels) && isset($data)): ?>
        labels = <?php echo json_encode($labels, 15, 512) ?>;
        data   = <?php echo json_encode($data, 15, 512) ?>;
      <?php else: ?>
        labels = [];
        data = [];
      <?php endif; ?>

      try {
        const ctx = canvas.getContext('2d');
        new Chart(ctx, {
          type: 'bar',
          data: {
            labels: labels,
            datasets: [{
              label: 'Jumlah Siswa',
              data: data,
            }]
          },
          options: {
            responsive: true,
            scales: {
              y: {
                beginAtZero: true,
                ticks: {
                }
              }
            }
          }
        });
      } catch (e) {
        console.error('Chart init error:', e);
      }
    })();
  </script>

  <?php echo $__env->yieldPushContent('scripts'); ?>

</body>

</html><?php /**PATH C:\xamppe\htdocs\ProjectUasMapil\resources\views/layout/footer.blade.php ENDPATH**/ ?>