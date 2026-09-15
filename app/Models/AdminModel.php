<?php
namespace App\Models;
use CodeIgniter\Model;
class AdminModel extends Model
{
    protected $table = "admins";
    protected $primaryKey = "id";
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'name',
        'email',
        'admin_password'
    ] ;
    protected $useTimestamps = false;
}
?>