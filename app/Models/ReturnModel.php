<?php
namespace App\Models;
use CodeIgniter\Model;
class ReturnModel extends Model{
    protected $table = "returns";
    protected $primaryKey = "id";
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        "returned_quantity",
        "return_date",
        "item_condition",
        "remarks"
    ] ;
    protected $useTimestamps = false;
}
?>