<?php

namespace App\Modules\Admin\Controllers;

use App\Controllers\BaseController;
use App\Modules\Categories\Models\Categories as CategoryModel;
use App\Modules\Activities\Models\Activities;

class Categories extends BaseController
{
    protected $folder_directory = "Modules\\Admin\\Views\\";
    protected $model;
    protected $activities;
    protected $data = [];
    protected $rules = [];

    public function __construct()
    {
        $this->model = new CategoryModel;
        $this->activities = new Activities;

    }

    public function archive($id)
    {
        if ($this->model->delete($id)) {
        $userId = session()->get("user_id");
            $this->activities->save([
                "user_id"=>$userId,
                "activity"=> "archived a user"
            ]);
            return redirect()->to('/admin/categories')->with('message', 'Category archived successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to archive category.');
        }
    }
    public function delete($id)
    {
        if ($this->model->where('id', $id)->purgeDeleted()) {
        $userId = session()->get("user_id");
            $this->activities->save([
                "user_id"=>$userId,
                "activity"=> "permanently deleted a category"
            ]);
            return redirect()->to('/admin/archived/categories')->with('message', 'Category permanently deleted.');
        } else {
            return redirect()->back()->with('error', 'Failed to delete category.');
        }
    }
    public function restore($id)
    {
        if ($this->model->update($id, ['deleted_at' => null])) {
        $userId = session()->get("user_id");
            $this->activities->save([
                "user_id"=>$userId,
                "activity"=> "restored a category"
            ]);
            return redirect()->to('/admin/archived/categories')->with('message', 'Category restored successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to update category.');
        }
    }

    
    public function archived()
    {
        $this->data['categories'] = $this->model->onlyDeleted()->findAll();
        
        $this->data['page_title'] = 'Categories';
        $this->data['page_header'] = 'Categories';
        $this->data['contents'] = [
            $this->folder_directory . 'archived-categories',
        ];
        return self::render();
    }
    
    public function save()
    {
        // Validate form input
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'name' => 'required|string'
        ]);

        if (! $this->validate($validation->getRules())) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Retrieve form data
        $data = [
            'name' => $this->request->getPost('name'),
        ];

        if ($this->model->save($data)) {
            $this->activities->save([
                "user_id"=>$this->request->getPost('user_id'),
                "activity"=> "created a category"
            ]);
            return redirect()->to('/admin/categories')->with('message', 'Category saved successfully.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Failed to save category.');
        }
    }
    public function update($id)
    {
        // Validate form input
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'name' => 'required|string',
        ]);

        if (! $this->validate($validation->getRules())) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Retrieve form data
        $data = [
            'id' => $id,
            'name' => $this->request->getPost('name'),
        ];

        if ($this->model->save($data)) {
            $userId = session()->get("user_id");
            $this->activities->save([
                "user_id"=>$userId,
                "activity"=> "updated a category"
            ]);
            return redirect()->to('/admin/categories')->with('message', 'Category saved successfully.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Failed to save category.');
        }
    }

    public function index()
    {
        $this->data['categories'] = $this->model->findAll();
        
        $this->data['page_title'] = 'Categories';
        $this->data['page_header'] = 'Categories';
        $this->data['contents'] = [
            $this->folder_directory . 'categories',
        ];
        return self::render('index');
    }

    public function render(): string
    {
        return view( $this->folder_directory."index", $this->data);
    }
}