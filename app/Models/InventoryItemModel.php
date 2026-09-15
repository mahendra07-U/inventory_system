<?php
namespace App\Models;
use CodeIgniter\Model;
class InventoryItemModel extends Model{
    protected $table = "inventory_items";
    protected $primaryKey = "id";
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'item_name',
        'category',
        'total_quantity',
        'available_quantity',
        'description',
        'image',
    ];
    protected $useTimestamps = false;
}
?>