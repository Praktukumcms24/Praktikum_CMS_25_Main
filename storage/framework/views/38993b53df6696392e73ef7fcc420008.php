<?php $__env->startSection('title', 'Data Pelanggan'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mt-4">
  <h2 class="mb-4 text-primary">📋 Daftar Pelanggan</h2>

  
  <?php if(session('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <?php echo e(session('success')); ?>

      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  <?php endif; ?>

  <?php if($errors->any()): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <?php echo e($errors->first()); ?>

      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  <?php endif; ?>

  
  <div class="d-flex justify-content-between align-items-center mb-3">
    <a href="<?php echo e(route('pelanggan.create')); ?>" class="btn btn-success">
      ➕ Tambah Pelanggan
    </a>

    <form method="GET" action="<?php echo e(route('pelanggan.index')); ?>" class="d-flex" style="max-width: 320px;">
      <input type="text" name="q" class="form-control form-control-sm me-2" placeholder="Cari..." value="<?php echo e(request('q')); ?>">
      <button type="submit" class="btn btn-sm btn-outline-primary">Cari</button>
      <?php if(request('q')): ?>
        <a href="<?php echo e(route('pelanggan.index')); ?>" class="btn btn-sm btn-outline-secondary ms-2">Reset</a>
      <?php endif; ?>
    </form>
  </div>

  
  <div class="card shadow-sm">
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover align-middle mb-0">
          <thead class="table-dark text-center">
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Alamat</th>
              <th>Email</th>
              <th>Telepon</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $pelanggan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
              <tr>
                <td class="text-center"><?php echo e($loop->iteration); ?></td>

                
                <td><?php echo e($item->nama); ?></td>
                <td><?php echo e($item->alamat); ?></td>
                <td><?php echo e($item->email); ?></td>
                <td><?php echo e($item->telepon ?? $item->no_telepon); ?></td>

                <td class="text-center">
                  <div class="d-flex justify-content-center flex-wrap gap-2">
                    <a href="<?php echo e(route('pelanggan.show', $item->id)); ?>" class="btn btn-sm btn-info">
                      👁️ View
                    </a>
                    <a href="<?php echo e(route('pelanggan.edit', $item->id)); ?>" class="btn btn-sm btn-warning">
                      ✏️ Edit
                    </a>
                    <form action="<?php echo e(route('pelanggan.destroy', $item->id)); ?>" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                      <?php echo csrf_field(); ?>
                      <?php echo method_field('DELETE'); ?>
                      <button class="btn btn-sm btn-danger">
                        🗑️ Delete
                      </button>
                    </form>
                  </div>
                </td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
              <tr>
                <td colspan="7" class="text-center text-muted py-3">
                  <?php if(request('q')): ?>
                    Tidak ditemukan hasil untuk: <strong><?php echo e(request('q')); ?></strong>
                  <?php else: ?>
                    Belum ada data pelanggan.
                  <?php endif; ?>
                </td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\xampp\htdocs\Praktikum_cms_2025-main\resources\views/pelanggan/index.blade.php ENDPATH**/ ?>