<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<div class="container">
    <h2>Student Registration</h2>
    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')) : ?>
         <div class="alert-danger" style="background-color: #f8d7da; color: #721c24; padding: 10px; border-radius: 4px; margin-bottom: 15px; text-align: center;">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>
    <form action="<?= base_url('register-student') ?>" method="post">
        <div class="form-group">
            <label>Full Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Email Address</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="student_password" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Roll Number</label>
            <input type="text" name="roll_no" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Department</label>
            <select name="department" class="form-control" required>
                <option value="">Select Dept</option>
                <option value="BCA">BCA</option>
                <option value="BBA">BBA</option>
                <option value="B.Tech">B.Tech</option>
                <option value="B.Com">B.Com</option>
            </select>
        </div>
        <div class="form-group">
            <label>Phone Number</label>
            <input type="text" name="phone" class="form-control" maxlength="10" required>
        </div>
        <button type="submit" class="btn-success">Register</button>
    </form>
    <div style="text-align: center; margin-top: 15px;">
     <p>Already Have an Account ? <a href="<?= base_url('login') ?>" style="color: #27ae60; text-decoration: none; font-weight: bold;">Login Here</a></p>
    </div>
</div>
<?= $this->endSection() ?>