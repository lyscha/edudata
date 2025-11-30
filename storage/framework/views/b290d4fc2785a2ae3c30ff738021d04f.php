<div class="modal fade" id="modalDelete<?php echo e($m->id); ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalDeleteLabel<?php echo e($m->id); ?>" aria-hidden="true">

  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modalDeleteLabel<?php echo e($m->id); ?>">
            Hapus Data Murid?
        </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body text-start">
        <div class="row">
            <div class="col-6">Nama</div>
            <div class="col-6">: <?php echo e($m->nama); ?></div>
        </div>

        <div class="row">
            <div class="col-6">NISN</div>
            <div class="col-6">: <?php echo e($m->nisn); ?></div>
        </div>

        <div class="row">
            <div class="col-6">Kelas</div>
            <div class="col-6">: <?php echo e($m->kelas->nama_kelas ?? '-'); ?></div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Kembali</button>

        <form action="<?php echo e(route('murid.destroy', $m->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
        </form>

      </div>

    </div>
  </div>

</div>
<?php /**PATH C:\xamppe\htdocs\ProjectUasMapil\resources\views/admin/murid/modal.blade.php ENDPATH**/ ?>