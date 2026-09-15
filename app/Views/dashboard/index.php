<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<div class="container" style="max-width: 800px;">
    <h2>Student Dashboard</h2>
    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>
    <div style="background: #fdfdfd; padding: 25px; border-radius: 8px; border: 1px solid #ddd; margin-top: 20px;">
        <h3 style="color: #2c3e50;">Welcome, <?= session()->get('student_name') ?>! </h3>
        <p><strong>Email:</strong> <?= session()->get('student_email') ?></p>
        <p><strong>Account Status:</strong> <span style="color: green; font-weight: bold;">Active</span></p>
        <hr style="border-top: 1px solid #ccc; margin: 20px 0;">     
        <h4 style="color: #2980b9;">My Borrowed Items</h4>      
        <?php if(!empty($my_items)): ?>
            <table style="width: 100%; border-collapse: collapse; margin-top: 15px;">
                <tr style="background-color: #f2f2f2; border-bottom: 2px solid #ddd;">
                    <th style="padding: 10px; text-align: left;">Item Name</th>
                    <th style="padding: 10px; text-align: left;">Issue Date</th>
                    <th style="padding: 10px; text-align: center;">Action</th>
                </tr>               
                <?php foreach($my_items as $row): ?>
                    <tr style="border-bottom: 1px solid #ddd;">
                        <td style="padding: 10px;"><?= esc($row['item_name']) ?></td>
                        <td style="padding: 10px;"><?= esc($row['allocation_date']) ?></td>
                        <td style="padding: 10px; text-align: center;">
                            <form action="<?= base_url('return-item/' . $row['alloc_id'] . '/' . $row['item_id']) ?>" method="post">
                                <button type="submit" class="btn-success" style="background-color: #f39c12; padding: 5px 15px; font-size: 13px; width: auto; margin-top: 0;">Return Item</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p style="color: #7f8c8d; font-style: italic;">You Haven't issued Any Item Yet.</p>
        <?php endif; ?>
        <p style="color: #555;">This is your Dashboard</p>
        <a href="<?= base_url('logout') ?>" class="btn-success" style="background-color: #e74c3c; display: inline-block; text-align: center; width: auto; padding: 10px 20px; text-decoration: none; margin-top: 15px;">Logout Securely</a>       
    </div>
</div>
<?= $this->endSection() ?>