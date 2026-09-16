<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container" style="max-width: 500px; margin-top: 50px;">
    
    <div style="background: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
        <h2 style="text-align: center; color: #2c3e50; margin-bottom: 20px;">Change Password 🔐</h2>

        <!-- Error Message Dikhane ke liye -->
        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert-danger" style="background-color: #f8d7da; color: #721c24; padding: 10px; border-radius: 4px; margin-bottom: 15px; text-align: center;">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('update-password') ?>" method="post">
            <div class="form-group" style="margin-bottom: 15px;">
                <label style="font-weight: bold;">Old Password</label>
                <input type="password" name="old_password" class="form-control" required style="width: 100%; padding: 10px; border-radius: 4px; border: 1px solid #ccc;">
            </div>

            <div class="form-group" style="margin-bottom: 15px;">
                <label style="font-weight: bold;">New Password</label>
                <input type="password" name="new_password" class="form-control" required style="width: 100%; padding: 10px; border-radius: 4px; border: 1px solid #ccc;">
            </div>

            <div class="form-group" style="margin-bottom: 25px;">
                <label style="font-weight: bold;">Confirm New Password</label>
                <input type="password" name="confirm_password" class="form-control" required style="width: 100%; padding: 10px; border-radius: 4px; border: 1px solid #ccc;">
            </div>

            <button type="submit" class="btn-success" style="width: 100%; padding: 12px; font-size: 16px; background-color: #e67e22;">Update Password</button>
            <a href="<?= base_url('items') ?>" style="display: block; text-align: center; margin-top: 15px; color: #7f8c8d; text-decoration: none;">Cancel</a>
        </form>
    </div>
</div>

<?= $this->endSection() ?>