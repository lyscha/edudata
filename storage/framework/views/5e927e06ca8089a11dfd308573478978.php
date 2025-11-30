

<?php $__env->startSection('content'); ?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="card-title fw-semibold mb-0">Data Murid</h5>

                <div class="d-flex gap-2">
                    <a href="<?php echo e(route('murid.create')); ?>" class="btn btn-sm btn-outline-primary">Tambah Murid</a>

                    <a href="<?php echo e(route('murid.importPage')); ?>" class="btn btn-sm btn-outline-success">
                        Import Data Excel
                    </a>

                    <a href="<?php echo e(route('murid.exportPage')); ?>" class="btn btn-sm btn-outline-warning">
                        Export Ke Excel
                    </a>
                </div>
            </div>

            <div class="table-responsive">
                <form method="GET" action="<?php echo e(route('murid.index')); ?>" class="mb-3">
                    <div class="row g-2">

                        <div class="col-md-4">
                            <input 
                                type="text" 
                                name="search" 
                                class="form-control" 
                                placeholder="Cari nama / NISN..." 
                                value="<?php echo e(request('search')); ?>"
                            >
                        </div>

                        <div class="col-md-3">
                            <select name="kelas" class="form-select">
                                <option value="">-- Filter Kelas --</option>
                                <?php $__currentLoopData = $kelas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($k->id); ?>" <?php echo e(request('kelas') == $k->id ? 'selected' : ''); ?>>
                                        <?php echo e($k->nama_kelas); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <select name="jk" class="form-select">
                                <option value="">-- Jenis Kelamin --</option>
                                <option value="Laki-laki" <?php echo e(request('jk') == 'Laki-laki' ? 'selected' : ''); ?>>Laki-laki</option>
                                <option value="Perempuan" <?php echo e(request('jk') == 'Perempuan' ? 'selected' : ''); ?>>Perempuan</option>
                            </select>
                        </div>

                        <div class="col-md-2">
                            <button class="btn btn-primary w-100">Filter</button>
                        </div>

                    </div>
                </form>
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">NISN</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Wali Kelas</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">No HP</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $murid; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td class="text-center"><?php echo e($m->nisn); ?></td>
                            <td class="text-center"><?php echo e($m->nama); ?></td>
                            <td class="text-center"><?php echo e($m->kelas->nama_kelas ?? '-'); ?></td>
                            <td class="text-center"><?php echo e($m->kelas->wali_kelas ?? '-'); ?></td>
                            <td class="text-center"><?php echo e($m->jenis_kelamin); ?></td>
                            <td class="text-center"><?php echo e($m->no_hp); ?></td>

                            <td class="text-center">
                                <a href="<?php echo e(route('murid.edit', $m->id)); ?>" class="btn btn-warning btn-sm mb-1">Edit</a>

                                <button 
                                    type="button" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#modalDelete<?php echo e($m->id); ?>" 
                                    class="btn btn-danger btn-sm mb-1">
                                    Hapus
                                </button>
                            </td>
                        </tr>

                        <?php echo $__env->make('admin.murid.modal', ['m' => $m], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="6" class="text-center text-gray-500 py-4">Belum ada data.</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>

                </table>
                <div class="mt-3">
                    <div>
                        <?php echo e($murid->appends(request()->query())->links('pagination::bootstrap-5')); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xamppe\htdocs\ProjectUasMapil\resources\views/admin/murid/datamurid.blade.php ENDPATH**/ ?>