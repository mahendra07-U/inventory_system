<?php
namespace App\Models;
use CodeIgniter\Model;

class AllocationModel extends Model
{
    protected $table            = 'allocations';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = [
        'student_id', 
        'item_id', 
        'quantity_allocated', 
        'allocation_date', 
        'return_date', 
        'status'
    ];
    protected $useTimestamps = false; 
}