<?php
namespace App\Controllers;
use App\Models\AdminModel;
class AdminController extends BaseController
{
    public function setup()
    {
        $adminModel = new AdminModel();
        if ($adminModel->countAll() == 0) {
            
            $data = [
                'name'           => 'Admin Mahendra',
                'email'          => 'admin@inventory.com',
                'admin_password' => password_hash('admin123', PASSWORD_DEFAULT) 
            ];
            $adminModel->insert($data);
            return "Kamaal ho gaya! Pehla Admin account ban gaya. <br> <b>Email:</b> admin@inventory.com <br> <b>Password:</b> admin123";
            
        } else {
            return "Admin account pehle se maujood hai!";
        }
    }
    public function login()
    {
        return view('admin/login');
    }
    public function authenticate()
    {
        $session = \Config\Services::session();
        $adminModel = new AdminModel();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('admin_password');
        $admin = $adminModel->where('email', $email)->first();
        if ($admin) {
            if (password_verify($password, $admin['admin_password'])) {
                $session->set([
                    'admin_id'        => $admin['id'],
                    'admin_name'      => $admin['name'],
                    'isAdminLoggedIn' => TRUE
                ]);               
                return redirect()->to('admin/dashboard')->with('success', 'Welcome ' . $admin['name'] . '!');
            } else {
                $session->setFlashdata('error', 'wrong Password!');
                return redirect()->to('admin/login');
            }
        } else {
            $session->setFlashdata('error', 'Admin email not found.');
            return redirect()->to('admin/login');
        }
    }
    public function dashboard()
    {
        $session = \Config\Services::session();
        if (!$session->get('isAdminLoggedIn')) {
            $session->setFlashdata('error', 'First Admin Do Login !');
            return redirect()->to('admin/login');
        }
        $db = \Config\Database::connect();
        $data['total_students'] = $db->table('students')->countAllResults();
        $data['total_items'] = $db->table('inventory_items')->countAllResults();
        $data['active_issues'] = $db->table('allocations')->where('status', 'Active')->countAllResults();
        $builder = $db->table('allocations');
        $builder->select('allocations.allocation_date, allocations.return_date, allocations.status, students.name as student_name, students.roll_no, inventory_items.item_name');
        $builder->join('students', 'students.id = allocations.student_id');
        $builder->join('inventory_items', 'inventory_items.id = allocations.item_id');
        $builder->orderBy('allocations.allocation_date', 'DESC');        
        $query = $builder->get();
        $data['all_allocations'] = $query->getResultArray();
        return view('admin/dashboard', $data);
    }
    public function logout()
    {
        $session = \Config\Services::session();
        $session->remove(['admin_id', 'admin_name', 'isAdminLoggedIn']);
        return redirect()->to('admin/login');
    }
}