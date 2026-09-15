<?php
namespace App\Controllers;
use App\Models\InventoryItemModel;
class InventoryController extends BaseController
{
    public function createItem(){
        return view("inventory/add_item_form");
    }
    public function saveItem(){
        $itemModel = new InventoryItemModel();
        $data = [
            'item_name' => $this->request->getPost('item_name'),
            'category' => $this->request->getPost('category'),
            'total_quantity' => $this->request->getPost('total_quantity'),
            'available_quantity' => $this->request->getPost('total_quantity'),
            'description'=> $this->request->getPost('description')
        ];
        $file = $this->request->getFile('image');
        if($file->isValid() && ! $file->hasMoved()){
            $newName = $file-> getRandomName();
            $file->move('uploads/items', $newName);
            $data['image'] = $newName;
        }
        $itemModel->insert($data);
        return redirect()->to('inventory/add-item')->with('success','new item inserted successfully');
    }
    public function editItem($id)
    {
        $itemModel = new InventoryItemModel();
        $data['item'] = $itemModel->find($id); 
        
        return view('inventory/edit_item_form', $data);
    }
    public function updateItem($id)
    {
        $itemModel = new InventoryItemModel();
        
        $data = [
            'item_name'          => $this->request->getPost('item_name'),
            'category'           => $this->request->getPost('category'),
            'available_quantity' => $this->request->getPost('total_quantity'),
            'description'        => $this->request->getPost('description')
        ];
        
        $itemModel->update($id, $data); // Update query chalayi
        
        return redirect()->to('items')->with('success', 'Item successfully update ho gaya!');
    }
    public function deleteItem($id)
    {
        $itemModel = new InventoryItemModel();
        $itemModel->delete($id); // Delete query chalayi
        
        return redirect()->to('items')->with('success', 'Item successfully delete ho gaya!');
    }
}
?>