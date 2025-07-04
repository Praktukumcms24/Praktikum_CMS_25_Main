<?php $__env->startSection('title', 'Tambah Pelanggan'); ?>

<?php $__env->startSection('content'); ?>
<h2>Tambah Pelanggan</h2>

<?php if($errors->any()): ?>
  <div class="alert alert-danger">
    <ul class="mb-0">
      <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><?php echo e($error); ?></li>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
  </div>
<?php endif; ?>

<form action="<?php echo e(route('pelanggan.store')); ?>" method="POST" enctype="multipart/form-data">
  <?php echo csrf_field(); ?>
  <div class="mb-3">
    <label>Nama</label>
    <input type="text" name="nama" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>Alamat</label>
    <input type="text" name="alamat" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>Email</label>
    <input type="email" name="email" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>No Telepon</label>
    <input type="text" name="no_telepon" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>Foto Pelanggan</label>
    <input type="file" name="foto_pelanggan" class="form-control">
  </div>
  <button type="submit" class="btn btn-primary">Simpan</button>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\xampp\htdocs\Praktikum_cms_2025-main\resources\views/pelanggan/create.blade.php ENDPATH**/ ?>