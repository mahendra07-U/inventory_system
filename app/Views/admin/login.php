<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<div class="container">
    <h2 style="color: #c0392b;">Admin Control Panel Login</h2>   
    <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert-danger">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>
    <form action="<?= base_url('admin/login-admin') ?>" method="post">       
        <div class="form-group">
            <label>Admin Email</label>
            <input type="email" name="email" class="form-control" required placeholder="admin@inventory.com">
        </div>
        <div class="form-group">
            <label>Admin Password</label>
            <input type="password" name="admin_password" class="form-control" required placeholder="Enter password">
        </div>
        <button type="submit" class="btn-success" style="background-color: #c0392b;">Login as Admin</button>
    </form>
</div>
<?= $this->endSection() ?>