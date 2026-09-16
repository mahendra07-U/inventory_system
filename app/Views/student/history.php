<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container" style="max-width: 900px; margin-top: 30px;">
    
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2 style="color: #2c3e50; margin: 0;">My Item History </h2>
        <a href="<?= base_url('items') ?>" class="btn-success" style="background-color: #34495e; text-decoration: none; padding: 8px 15px;">⬅ Back to Stock</a>
    </div>

    <div style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
        <?php if(empty($history)): ?>
            <p style="text-align: center; color: #7f8c8d; font-size: 18px;">Aapne abhi tak koi item issue nahi kiya hai.</p>
        <?php else: ?>
            <table style="width: 100%; border-collapse: collapse; text-align: left;">
                <thead>
                    <tr style="background-color: #f2f2f2; border-bottom: 2px solid #ddd;">
                        <th style="padding: 12px;">Item Name</th>
                        <th style="padding: 12px;">Issue Date</th>
                        <th style="padding: 12px;">Return Date</th>
                        <th style="padding: 12px;">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($history as $row): ?>
                        <tr style="border-bottom: 1px solid #ddd;">
                            <td style="padding: 12px; font-weight: bold;"><?= esc($row['item_name']) ?></td>
                            <td style="padding: 12px; color: #555;"><?= date('d M Y', strtotime($row['allocation_date'])) ?></td>
                            <td style="padding: 12px; color: #555;">
                                <?= $row['return_date'] ? date('d M Y', strtotime($row['return_date'])) : '<span style="color: #e74c3c;">Pending</span>' ?>
                            </td>
                            <td style="padding: 12px;">
                                <?php if($row['status'] == 'Active'): ?>
                                    <span style="background-color: #f1c40f; color: #fff; padding: 4px 8px; border-radius: 4px; font-size: 12px; font-weight: bold;">Active</span>
                                <?php else: ?>
                                    <span style="background-color: #2ecc71; color: #fff; padding: 4px 8px; border-radius: 4px; font-size: 12px; font-weight: bold;">Returned</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</div>

<?= $this->endSection() ?>