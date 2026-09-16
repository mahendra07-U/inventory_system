<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<div class="container" style="max-width: 1000px;">
    <h2>Available Stationery Items</h2>
    <div style="margin-bottom: 25px; text-align: center;">
        <form action="<?= base_url('items') ?>" method="get" style="display: inline-block; width: 100%; max-width: 500px;">
            <div style="display: flex; gap: 10px; align-items: center;">
                
                <input type="text" name="search" placeholder="Item ka naam ya category likhein..." value="<?= esc($search_query ?? '') ?>" class="form-control" style="flex: 1; border-radius: 20px; padding: 10px 15px; margin-bottom: 0;">
                
                <button type="submit" class="btn-success" style="border-radius: 20px; padding: 10px 20px; width: auto; margin: 0; background-color: #2c3e50;"> Search</button>
                <?php if(!empty($search_query)): ?>
                    <a href="<?= base_url('items') ?>" style="padding: 10px; text-decoration: none; color: #e74c3c; font-weight: bold;"> Clear</a>
                <?php endif; ?>
                <a href="<?= base_url('change-password') ?>" style="background-color: #e67e22; color: white; text-decoration: none; padding: 10px 20px; border-radius: 20px; font-weight: bold; display:inline-block; margin-left: 10px; box-shadow: 0 2px 5px rgba(0,0,0,0.2);">
                    Change Password
                </a>
            </div> 
        </form>
    </div>
    <p style="text-align: center; color: #555;">Here Is Your All Available Items.</p>
    <div class="item-grid">
        <?php if(!empty($stationery_items)): ?>
            <?php foreach($stationery_items as $item): ?>
                <div class="item-card">
                    <?php if(!empty($item['image'])): ?>
                        <img src="<?= base_url('uploads/items/' . $item['image']) ?>" alt="<?= esc($item['item_name']) ?>" style="width: 100%; height: 180px; object-fit: cover; border-radius: 6px; margin-bottom: 12px;">
                    <?php else: ?>
                        <div style="width: 100%; height: 180px; background-color: #ecf0f1; border-radius: 6px; margin-bottom: 12px; display: flex; align-items: center; justify-content: center; color: #7f8c8d; font-size: 14px;">
                             No Image
                        </div>
                    <?php endif; ?>
                    <h3><?= esc($item['item_name']) ?></h3>
                    <div class="item-category">Category: <?= esc($item['category']) ?></div>
                    
                    <p style="color: #666; font-size: 14px;"><?= esc($item['description']) ?></p>
                    
                    <div class="stock-badge">
                        Available Stock: <?= esc($item['available_quantity']) ?>
                    </div>
                    <div style="margin-top: 15px; display: flex; gap: 10px; justify-content: center;">                       
                        <?php $session = \Config\Services::session(); ?>
                        <?php if($session->get('isAdminLoggedIn')): ?>
                            <a href="<?= base_url('inventory/edit-item/' . $item['id']) ?>" style="background-color: #2980b9; color: white; padding: 6px 12px; text-decoration: none; border-radius: 4px; font-size: 14px;"> Edit</a>
                            <a href="<?= base_url('inventory/delete-item/' . $item['id']) ?>" style="background-color: #e74c3c; color: white; padding: 6px 12px; text-decoration: none; border-radius: 4px; font-size: 14px;" onclick="return confirm('Kya aap sach me is item ko delete karna chahte hain?');"> Delete</a>
                        <?php else: ?>
                            <?php if($item['available_quantity'] > 0): ?>
                                <form action="<?= base_url('borrow-item/' . $item['id']) ?>" method="post">
                                    <button type="submit" class="btn-success" style="padding: 8px; font-size: 14px;">Issue Item</button>
                                </form>
                            <?php else: ?>
                                <button class="btn-success" style="padding: 8px; font-size: 14px; background-color: #95a5a6; cursor: not-allowed;" disabled>Out of Stock</button>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p style="color: red; text-align: center;">No Items Are Issued.</p>
        <?php endif; ?>
    </div>
</div>

<?= $this->endSection() ?>