<?php
namespace App\Controllers;
use App\Models\StudentModel;
use PSpell\Config;

class StudentController extends BaseController
{
    public function register()
    {
        return view("student/register");
    }
    public function store()
    {        
        $studentModel = new StudentModel();
        $raw_password = $this->request->getPost("student_password");
        $hashed_password = password_hash($raw_password, PASSWORD_DEFAULT);
        $session = \config\Services::session();
        $email = $this->request->getPost("email");
        $existingStudent = $studentModel->where("email", $email)->first();
        if ($existingStudent) {
            $session->setFlashdata("error","This Email is already register ! pls try with another gmail");
            return redirect()->to('register');
        }
        $data = [
            'name'=> $this->request->getPost('name'),
            'email'=> $this->$email,
            'student_password'=> $hashed_password,
            'roll_no'=> $this->request->getPost('roll_no'),
            'department'=> $this->request->getPost('department'),
            'phone'=> $this->request->getPost('phone')
        ];
        $studentModel->insert($data);
        return redirect()->to('login')->with('success','Registration Successful ! Pls Login');
    }
    public function login()
    {
        return view('student/login');
    }
    public function authenticate(){
        $session = \Config\Services::session();
        $studentModel = new StudentModel();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('student_password');
        $data = $studentModel->where('email', $email)->first();
        if($data){
            $hashed_password = $data['student_password'];
            if(password_verify($password, $hashed_password)){
                $ses_data = [
                    'student_id'=> $data['id'],
                    'student_name'=> $data['name'],
                    'student_email' => $data['email'],
                    'isLoggedIn'=> TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('dashboard')->with('success','welcome back, '.$data['name'].'!');
            }else{
                  $session->setFlashdata('error', 'wrong password! pls try again');
                   return redirect()->to('login');
            }
        }else{
            $session->setFlashdata('error', 'this email is not register !');
                return redirect()->to('login');
            }
    }
    public function logout(){
        $session = session();
        $session->destroy();
        return redirect()->to('login');
    }
    public function myHistory()
    {
        $session = \Config\Services::session();
        if (!$session->get('isLoggedIn')) {
            return redirect()->to('login');
        }
        $student_id = $session->get('student_id');        
        $db = \Config\Database::connect();
        $builder = $db->table('allocations');
        $builder->select('allocations.allocation_date, allocations.return_date, allocations.status, inventory_items.item_name');
        $builder->join('inventory_items', 'inventory_items.id = allocations.item_id');
        $builder->where('allocations.student_id', $student_id); 
        $builder->orderBy('allocations.allocation_date', 'DESC');       
        $query = $builder->get();
        $data['history'] = $query->getResultArray();
        return view('student/history', $data);
    }
    public function changePasswordForm()
    {
        $session = \Config\Services::session();
        if (!$session->get('isLoggedIn')) {
            return redirect()->to('login');
        }
        return view('student/change_password');
    }
    public function updatePassword()
    {
        $session = \Config\Services::session();
        $studentModel = new StudentModel();
        
        $student_id = $session->get('student_id');
        $student = $studentModel->find($student_id);
        $old_password = $this->request->getPost('old_password');
        $new_password = $this->request->getPost('new_password');
        $confirm_password = $this->request->getPost('confirm_password');
        if ($new_password !== $confirm_password) {
            $session->setFlashdata('error', 'New Password and Confirm Password are not match !');
            return redirect()->to('change-password');
        }
        if (password_verify($old_password, $student['student_password'])) {
            $newData = [
                'student_password' => password_hash($new_password, PASSWORD_DEFAULT)
            ];
            $studentModel->update($student_id, $newData);
            
            $session->setFlashdata('success', 'your Password has successfully updated !');
            return redirect()->to('items'); 
        } else {
            $session->setFlashdata('error', 'Your Old Password is wrong !');
            return redirect()->to('change-password');
        }
    }
}
?>