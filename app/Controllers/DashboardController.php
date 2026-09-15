<?php
namespace App\Controllers;
class DashboardController extends BaseController
{
    public function index()
    {
        $session = \Config\Services::session();       
        if (!$session->get('isLoggedIn')) {
            $session->setFlashdata('error', 'Dashboard dekhne ke liye pehle Login karein.');
            return redirect()->to('login');
        }
        $student_id = $session->get('student_id');
        $db = \Config\Database::connect();
        $builder = $db->table('allocations');
        $builder->select('allocations.id as alloc_id, allocations.allocation_date, allocations.status, inventory_items.item_name, inventory_items.id as item_id');
        $builder->join('inventory_items', 'inventory_items.id = allocations.item_id');
        $builder->where('allocations.student_id', $student_id);
        $builder->where('allocations.status', 'Active');       
        $query = $builder->get();
        $data['my_items'] = $query->getResultArray();
        return view('dashboard/index', $data);
    }
    public function viewItems()
    {
        $session = \Config\Services::session();
        if (!$session->get('isLoggedIn') && !$session->get('isAdminLoggedIn')) {
            return redirect()->to('login');
        }

        $itemModel = new \App\Models\InventoryItemModel();
        $search = $this->request->getGet('search'); 
        if (!empty($search)) {
            $data['stationery_items'] = $itemModel->groupStart()
                                                  ->like('item_name', $search)
                                                  ->orLike('category', $search)
                                                  ->groupEnd()
                                                  ->findAll();
        } else {
            $data['stationery_items'] = $itemModel->findAll();
        }
        
        $data['search_query'] = $search; 
        return view('dashboard/items', $data);
    }
    public function borrowItem($item_id)
    {
        $session = \Config\Services::session();
        if (!$session->get('isLoggedIn')) {
            return redirect()->to('login');
        }
        $itemModel = new \App\Models\InventoryItemModel();
        $allocationModel = new \App\Models\AllocationModel();
        $student_id = $session->get('student_id');
        $item = $itemModel->find($item_id);
        if ($item['available_quantity'] > 0) {
            $allocData = [
                'student_id'         => $student_id,
                'item_id'            => $item_id,
                'quantity_allocated' => 1, 
                'allocation_date'    => date('Y-m-d'), 
                'status'             => 'Active'
            ];
            $allocationModel->insert($allocData);
            $newQuantity = $item['available_quantity'] - 1;
            $itemModel->update($item_id, ['available_quantity' => $newQuantity]);
            $session->setFlashdata('success', $item['item_name'] . ' successfully issue ho gaya!');
        } else {
            $session->setFlashdata('error', 'Sorry, yeh item out of stock hai!');
        }
        return redirect()->to('items');
    }
    public function returnItem($alloc_id, $item_id)
    {
        $session = \Config\Services::session();        
        $itemModel = new \App\Models\InventoryItemModel();
        $allocationModel = new \App\Models\AllocationModel();
        $allocationModel->update($alloc_id, ['status' => 'Returned', 'return_date' => date('Y-m-d')]);
        $item = $itemModel->find($item_id);
        if($item) {
            $newQuantity = $item['available_quantity'] + 1;
            $itemModel->update($item_id, ['available_quantity' => $newQuantity]);
        }
        $session->setFlashdata('success', 'Item successfully return ho gaya! Stock update kar diya gaya hai.');
        return redirect()->to('dashboard');
    }
}