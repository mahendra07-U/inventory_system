<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<div class="container" style="max-width: 600px;">
    <h2>Add New Stationery Item</h2>
    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>
    <form action="<?= base_url('inventory/save-item') ?>" method="post" enctype="multipart/form-data">      
        <div class="form-group">
            <label>Item Name</label>
            <input type="text" name="item_name" class="form-control" required placeholder="e.g. Cello Pen">
        </div>
        <div class="form-group">
            <label>Category</label>
            <select name="category" class="form-control" required>
                <option value="">Select Category</option>
                <option value="Notebooks">Notebooks</option>
                <option value="Pens & Pencils">Pens & Pencils</option>
                <option value="Art Supplies">Art Supplies</option>
                <option value="Geometry">Geometry</option>
                <option value="Miscellaneous">Miscellaneous</option>
            </select>
        </div>
        <div class="form-group">
            <label>Total Quantity (Stock IN)</label>
            <input type="number" name="total_quantity" class="form-control" required min="1">
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control" rows="3" placeholder="Enter item details..."></textarea>
        </div>
        <div class="form-group">
            <label>Item Image (Optional)</label>
            <input type="file" name="image" class="form-control" accept="image/*">
        </div>
        <button type="submit" class="btn-success">Save Item</button>
    </form>
</div>
<?= $this->endSection() ?>