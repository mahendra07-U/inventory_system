<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container" style="max-width: 1000px;">
    <h2 style="color: #2c3e50;">Admin Dashboard</h2>
    <!-- NAYA CODE: Analytics Summary Cards -->
    <div style="display: flex; gap: 20px; margin-top: 20px; margin-bottom: 20px; flex-wrap: wrap;">
        
        <!-- Blue Card: Total Students -->
        <div style="flex: 1; min-width: 200px; background: linear-gradient(135deg, #3498db, #2980b9); color: white; padding: 25px 20px; border-radius: 10px; text-align: center; box-shadow: 0 4px 8px rgba(0,0,0,0.2);">
            <h3 style="margin: 0; font-size: 38px;"><?= esc($total_students) ?></h3>
            <p style="margin: 5px 0 0 0; font-size: 16px; font-weight: bold;">Total Students</p>
        </div>
        
        <!-- Green Card: Total Stock Items -->
        <div style="flex: 1; min-width: 200px; background: linear-gradient(135deg, #2ecc71, #27ae60); color: white; padding: 25px 20px; border-radius: 10px; text-align: center; box-shadow: 0 4px 8px rgba(0,0,0,0.2);">
            <h3 style="margin: 0; font-size: 38px;"><?= esc($total_items) ?></h3>
            <p style="margin: 5px 0 0 0; font-size: 16px; font-weight: bold;">Total Item Types</p>
        </div>
        
        <!-- Orange Card: Active Issues -->
        <div style="flex: 1; min-width: 200px; background: linear-gradient(135deg, #e67e22, #d35400); color: white; padding: 25px 20px; border-radius: 10px; text-align: center; box-shadow: 0 4px 8px rgba(0,0,0,0.2);">
            <h3 style="margin: 0; font-size: 38px;"><?= esc($active_issues) ?></h3>
            <p style="margin: 5px 0 0 0; font-size: 16px; font-weight: bold;">Active Issues (Pending)</p>
        </div>

    </div>
    <!-- Analytics Cards Khatam -->
    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <div style="background: #fff; padding: 20px; border-radius: 8px; border-left: 5px solid #c0392b; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
        <h3>Hello, <?= session()->get('admin_name') ?> </h3>
        <p>You Can Manage Inventory items from here.</p>
        <div style="margin-top: 20px; display: flex; gap: 15px;">
            <a href="<?= base_url('inventory/add-item') ?>" class="btn-success" style="width: auto; text-decoration: none; padding: 10px 20px;">+ Add New Item</a>
            <a href="<?= base_url('items') ?>" class="btn-success" style="width: auto; text-decoration: none; padding: 10px 20px; background-color: #2980b9;">View All Stock</a>
        </div>
    </div>
    <div style="margin-top: 30px; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
        <h3 style="color: #c0392b; border-bottom: 2px solid #eee; padding-bottom: 10px;">Item Allocation History</h3>
        <?php if(!empty($all_allocations)): ?>
            <table style="width: 100%; border-collapse: collapse; margin-top: 15px;">
                <tr style="background-color: #f2f2f2; border-bottom: 2px solid #ddd;">
                    <th style="padding: 12px; text-align: left;">Student Name</th>
                    <th style="padding: 12px; text-align: left;">Roll No</th>
                    <th style="padding: 12px; text-align: left;">Item Name</th>
                    <th style="padding: 12px; text-align: left;">Issue Date</th>
                    <th style="padding: 12px; text-align: center;">Status</th>
                </tr> 
                <?php foreach($all_allocations as $row): ?>
                    <tr style="border-bottom: 1px solid #eee;">
                        <td style="padding: 12px; font-weight: bold;"><?= esc($row['student_name']) ?></td>
                        <td style="padding: 12px;"><?= esc($row['roll_no']) ?></td>
                        <td style="padding: 12px; color: #2980b9;"><?= esc($row['item_name']) ?></td>
                        <td style="padding: 12px;"><?= esc($row['allocation_date']) ?></td>                    
                        <td style="padding: 12px; text-align: center;">
                            <?php if($row['status'] == 'Active'): ?>
                                <span style="background-color: #f39c12; color: white; padding: 4px 10px; border-radius: 12px; font-size: 12px; font-weight: bold;">Not Returned</span>
                            <?php else: ?>
                                <span style="background-color: #27ae60; color: white; padding: 4px 10px; border-radius: 12px; font-size: 12px; font-weight: bold;">Returned on <?= esc($row['return_date']) ?></span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p style="color: #7f8c8d; font-style: italic; text-align: center; margin-top: 20px;">No Student has requested to issue an item yet.</p>
        <?php endif; ?>
    </div>
</div>
<?= $this->endSection() ?>