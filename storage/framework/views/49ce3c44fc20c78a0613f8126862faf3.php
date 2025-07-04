<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $__env->yieldContent('title', 'Aplikasi Pelanggan'); ?></title>

  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

  <style>
    body {
      overflow-x: hidden;
    }

    .sidebar {
      min-height: 100vh;
      width: 220px;
      background-color: rgb(109, 6, 66);
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .sidebar .menu {
      flex-grow: 1;
    }

    .sidebar h4 {
      text-align: center;
      margin-top: 15px;
      margin-bottom: 0;
      padding: 15px;
      color: #fff;
      border-bottom: 1px solid rgba(255, 255, 255, 0.2);
    }

    .sidebar a {
      color: #fff;
      display: block;
      padding: 12px 20px;
      text-decoration: none;
      transition: background-color 0.2s;
    }

    .sidebar a:hover {
      background-color: rgb(150, 9, 168);
    }

    .sidebar form {
      padding: 15px 20px;
    }

    .main-content {
      flex-grow: 1;
      padding: 20px;
    }
  </style>
</head>
<body>
  <div class="d-flex">
    
    <div class="sidebar">
      <div class="menu">
        <h4>Aplikasi Pelanggan</h4>
        <a href="<?php echo e(route('pelanggan.index')); ?>"><i class="bi bi-people-fill"></i> Data Pelanggan</a>
        <a href="<?php echo e(route('pelanggan.create')); ?>"><i class="bi bi-person-plus-fill"></i> Tambah Pelanggan</a>
      </div>

      
      <form action="<?php echo e(route('logout')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <button type="submit" class="btn btn-light w-100">
          <i class="bi bi-box-arrow-right"></i> Logout
        </button>
      </form>
    </div>

    
    <div class="main-content">
      <?php echo $__env->yieldContent('content'); ?>
    </div>
  </div>

  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH D:\xampp\htdocs\Praktikum_cms_2025-main\resources\views/layouts/app.blade.php ENDPATH**/ ?>