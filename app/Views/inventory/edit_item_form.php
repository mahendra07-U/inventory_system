<?php 
/**
 * @var array $item
 */
?>
<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<div class="container" style="max-width: 600px;">
    <h2>Edit Item Details</h2>   
    <form action="<?= base_url('inventory/update-item/' . $item['id']) ?>" method="post">       
        <div class="form-group">
            <label>Item Name</label>
            <input type="text" name="item_name" class="form-control" value="<?= esc($item['item_name']) ?>" required>
        </div>
        <div class="form-group">
            <label>Category</label>
            <select name="category" class="form-control" required>
                <option value="Notebooks" <?= ($item['category'] == 'Notebooks') ? 'selected' : '' ?>>Notebooks</option>
                <option value="Pens & Pencils" <?= ($item['category'] == 'Pens & Pencils') ? 'selected' : '' ?>>Pens & Pencils</option>
                <option value="Art Supplies" <?= ($item['category'] == 'Art Supplies') ? 'selected' : '' ?>>Art Supplies</option>
                <option value="Geometry" <?= ($item['category'] == 'Geometry') ? 'selected' : '' ?>>Geometry</option>
                <option value="Miscellaneous" <?= ($item['category'] == 'Miscellaneous') ? 'selected' : '' ?>>Miscellaneous</option>
            </select>
        </div>
        <div class="form-group">
            <label>Total Quantity (Available Stock)</label>
            <input type="number" name="total_quantity" class="form-control" value="<?= esc($item['available_quantity']) ?>" required min="0">
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control" rows="3"><?= esc($item['description']) ?></textarea>
        </div>
        <button type="submit" class="btn-success" style="background-color: #f39c12;">Update Item</button>
        <a href="<?= base_url('items') ?>" style="display: block; text-align: center; margin-top: 10px; color: #7f8c8d; text-decoration: none;">Cancel</a>
    </form>
</div>
<?= $this->endSection() ?>