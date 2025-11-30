

<?php $__env->startSection('content'); ?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-semibold">Export Data Murid</h4>
                <a href="<?php echo e(route('murid.index')); ?>" class="btn btn-sm btn-outline-info">Kembali</a>
            </div>

            <p class="text-muted">Klik tombol di bawah untuk download file Excel data murid.</p>

            <a href="<?php echo e(route('murid.export')); ?>" class="btn btn-warning">
                Download Excel
            </a>

        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xamppe\htdocs\ProjectUasMapil\resources\views/admin/murid/export-page.blade.php ENDPATH**/ ?>