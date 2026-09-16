<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Stationery Inventory</title>
    <link href="<?= base_url('css/style.css') ?>" rel="stylesheet">
</head>
<body>
    <nav class="navbar">
        <a href="#" class="navbar-brand"> Inventory System</a>
        <div class="nav-links">
            <?php $session = \Config\Services::session(); ?>
            <?php if($session->get('isAdminLoggedIn')): ?>
                <a href="<?= base_url('admin/dashboard') ?>">Admin Dashboard</a>
                <a href="<?= base_url('inventory/add-item') ?>" style="color: #f1c40f;"> Add Item</a>
                <a href="<?= base_url('items') ?>">View Items</a>
                <a href="<?= base_url('admin/logout') ?>" style="background-color: #e74c3c;">Logout</a>
            <?php elseif($session->get('isLoggedIn')): ?>
                <a href="<?= base_url('dashboard') ?>">My Dashboard</a>
                <a href="<?= base_url('items') ?>">View Items</a>
                <a href="<?= base_url('my-history') ?>">View History</a>
                <a href="<?= base_url('logout') ?>" style="background-color: #e74c3c;">Logout</a>
            <?php else: ?>
                <a href="<?= base_url('register') ?>">Student Register</a>
                <a href="<?= base_url('login') ?>">Student Login</a>
            <?php endif; ?>
        </div>
    </nav>
    <?= $this->renderSection('content') ?>   
</body>
</html>