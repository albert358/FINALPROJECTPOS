<?php

namespace App\Controllers;

use App\Models\MenuItemModel;
use App\Models\CategoryModel;
// No need to 'use CodeIgniter\Controller;' if extending App\Controllers\BaseController

class Menu extends BaseController // Assuming App\Controllers\BaseController is your custom base controller
{
    protected MenuItemModel $menuItemModel;
    protected CategoryModel $categoryModel;

    public function __construct()
    {
        // REMOVE THIS LINE: parent::__construct();
        // The BaseController/Controller setup is usually handled by the framework
        // unless your custom BaseController specifically defines a constructor
        // that you need to call.

        $this->menuItemModel = new MenuItemModel();
        $this->categoryModel = new CategoryModel();
        helper(['form', 'url']);
    }

    public function index()
    {
        $filterName = $this->request->getGet('name');
        $filterStatus = $this->request->getGet('status');
        $filterCategory = $this->request->getGet('category');

        // Start with the model instance for chaining queries
        $query = $this->menuItemModel;

        if ($filterName) {
            $query->like('name', $filterName);
        }

        if ($filterStatus) {
            $query->where('status', $filterStatus);
        }

        if ($filterCategory) {
            $query->where('category_id', $filterCategory);
        }

        $menuItems = $query->findAll();
        $allCategories = $this->categoryModel->findAll();
        $categoryMap = [];

        foreach ($allCategories as $cat) {
            $categoryMap[$cat['id']] = $cat['name'];
        }

        // Pass messages directly from session flashdata
        $message = session()->getFlashdata('message');
        $error = session()->getFlashdata('error');

        return view('admin/menu_list_view', [
            'page_title' => 'Menu Items',
            'menuItems' => $menuItems,
            'allCategories' => $allCategories,
            'categoryMap' => $categoryMap,
            'filterName' => $filterName,
            'filterStatus' => $filterStatus,
            'filterCategory' => $filterCategory,
            'message' => $message,
            'error' => $error
        ]);
    }

    public function new()
    {
        $categories = $this->categoryModel->findAll();

        return view('admin/menu_add_view', [
            'page_title' => 'Add Menu Item',
            'categories' => $categories,
            'errors' => session()->getFlashdata('errors'),
            'error' => session()->getFlashdata('error')
        ]);
    }

    public function create()
    {
        $rules = $this->menuItemModel->getValidationRules();

        $messages = [
            'name' => [
                'required' => 'The menu item name is required.',
                'max_length' => 'The menu item name cannot exceed 255 characters.'
            ],
            // ... add more custom messages as needed
        ];


        if (!$this->validate($rules, $messages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $imageFile = $this->request->getFile('item_image');
        $imageName = '';

        if ($imageFile && $imageFile->isValid() && !$imageFile->hasMoved()) {
            if ($imageFile->getSize() > 1024 * 1024) { // 1MB limit
                session()->setFlashdata('error', 'Image file is too large. Max size: 1MB.');
                return redirect()->back()->withInput();
            }

            $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
            if (!in_array($imageFile->getMimeType(), $allowedMimeTypes)) {
                session()->setFlashdata('error', 'Invalid image file type. Only JPG, PNG, GIF, WEBP are allowed.');
                return redirect()->back()->withInput();
            }

            $imageName = $imageFile->getRandomName();
            $uploadPath = FCPATH . 'uploads/menu_images/';
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }
            $imageFile->move($uploadPath, $imageName);
        }

        $data = [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'category_id' => $this->request->getPost('category_id'),
            'price' => $this->request->getPost('price'),
            'status' => $this->request->getPost('status'),
            'image' => $imageName
        ];

        if ($this->menuItemModel->save($data)) {
            session()->setFlashdata('message', 'Menu item added successfully.');
        } else {
            session()->setFlashdata('error', 'Failed to add menu item.');
        }

        return redirect()->to(base_url('menu'));
    }

    public function edit(int $id = null)
    {
        if ($id === null) {
            session()->setFlashdata('error', 'Menu item ID not provided.');
            return redirect()->to(base_url('menu'));
        }

        $menuItem = $this->menuItemModel->find($id);

        if (!$menuItem) {
            session()->setFlashdata('error', 'Menu item not found.');
            return redirect()->to(base_url('menu'));
        }

        $categories = $this->categoryModel->findAll();

        return view('admin/menu_edit_view', [
            'page_title' => 'Edit Menu Item',
            'menuItem' => $menuItem,
            'categories' => $categories,
            'errors' => session()->getFlashdata('errors'),
            'error' => session()->getFlashdata('error')
        ]);
    }

    public function update(int $id = null)
    {
        if ($id === null) {
            session()->setFlashdata('error', 'Menu item ID not provided.');
            return redirect()->to(base_url('menu'));
        }

        $menuItem = $this->menuItemModel->find($id);
        if (!$menuItem) {
            session()->setFlashdata('error', 'Menu item not found for update.');
            return redirect()->to(base_url('menu'));
        }

        $rules = [
            'name' => 'required|max_length[255]',
            'category_id' => 'required|integer',
            'price' => 'required|numeric|greater_than[0]',
            'description' => 'permit_empty|max_length[1000]',
            'status' => 'required|in_list[available,unavailable]',
            'item_image' => 'is_image[item_image]|max_size[item_image,1024]' // 1MB in KB
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $imageFile = $this->request->getFile('item_image');
        $imageName = $menuItem['image']; // Keep existing image by default

        if ($imageFile && $imageFile->isValid() && !$imageFile->hasMoved()) {
            if (!empty($menuItem['image'])) {
                $oldImagePath = FCPATH . 'uploads/menu_images/' . $menuItem['image'];
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $imageName = $imageFile->getRandomName();
            $uploadPath = FCPATH . 'uploads/menu_images/';
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }
            $imageFile->move($uploadPath, $imageName);
        }

        $data = [
            'id' => $id,
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'category_id' => $this->request->getPost('category_id'),
            'price' => $this->request->getPost('price'),
            'status' => $this->request->getPost('status'),
            'image' => $imageName
        ];

        if ($this->menuItemModel->save($data)) {
            session()->setFlashdata('message', 'Menu item updated successfully.');
        } else {
            session()->setFlashdata('error', 'Failed to update menu item.');
        }

        return redirect()->to(base_url('menu'));
    }

    public function delete(int $id = null)
    {
        if ($id === null) {
            session()->setFlashdata('error', 'Menu item ID not provided.');
            return redirect()->to(base_url('menu'));
        }

        $menuItem = $this->menuItemModel->find($id);

        if (!$menuItem) {
            session()->setFlashdata('error', 'Menu item not found.');
            return redirect()->to(base_url('menu'));
        }

        if (!empty($menuItem['image'])) {
            $imagePath = FCPATH . 'uploads/menu_images/' . $menuItem['image'];
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        if ($this->menuItemModel->delete($id)) {
            session()->setFlashdata('message', 'Menu item "' . esc($menuItem['name']) . '" deleted successfully.');
        } else {
            session()->setFlashdata('error', 'Failed to delete menu item "' . esc($menuItem['name']) . '". Please try again.');
        }

        return redirect()->to(base_url('menu'));
    }
}