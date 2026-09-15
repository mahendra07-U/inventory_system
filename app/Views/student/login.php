<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<div class="container">
    <h2>Student Login</h2>
    <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert-danger">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>
    <form action="<?= base_url('login-student') ?>" method="post">      
        <div class="form-group">
            <label>Email Address</label>
            <input type="email" name="email" class="form-control" required placeholder="example@email.com">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="student_password" class="form-control" required placeholder="Enter your password">
        </div>
        <button type="submit" class="btn-success">Login</button>
    </form>   
    <div style="text-align: center; margin-top: 15px;">
        <p>Don't Have Account ? <a href="<?= base_url('register') ?>" style="color: #27ae60; text-decoration: none; font-weight: bold;">Register Here</a></p>
    </div>
</div>
<?= $this->endSection() ?>