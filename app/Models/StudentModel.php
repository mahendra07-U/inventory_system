<?php
namespace App\Models;
use CodeIgniter\Model;
class StudentModel extends Model{
    protected $table = "students";
    protected $primaryKey = "id";
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        "name",
        "email",
        "student_password",
        "roll_no",
        "department",
        "phone"
    ];
    protected $useTimestamps = false;
}
?>