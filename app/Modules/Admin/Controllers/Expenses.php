<?php

namespace App\Modules\Admin\Controllers;

use App\Controllers\BaseController;
use App\Modules\Expenses\Models\Expenses as ExpenseModel;
use App\Modules\Categories\Models\Categories;
use App\Modules\Activities\Models\Activities;

class Expenses extends BaseController
{
    protected $folder_directory = "Modules\\Admin\\Views\\";
    protected $model;
    protected $activities;
    protected $categories;
    protected $data = [];
    protected $rules = [];

    public function __construct()
    {
        $this->model = new ExpenseModel;
        $this->categories = new Categories;
        $this->activities = new Activities;
    }

    public function update($id)
    {
        // Validate form input
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'name' => 'required|string',
            'amount' => 'required|numeric',
            'category_id' => 'required|integer',
            'date' => 'required',
            'description' => 'required'
        ]);

        if (! $this->validate($validation->getRules())) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Retrieve form data
        $data = [
            'id' => $id,
            'name' => $this->request->getPost('name'),
            'amount' => $this->request->getPost('amount'),
            'category_id' => $this->request->getPost('category_id'),
            'date' => $this->request->getPost('date'),
            'description' => $this->request->getPost('description')
        ];

        if ($this->model->save($data)) {
            $userId = session()->get("user_id");
            $this->activities->save([
                "user_id"=>$userId,
                "activity"=> "updated a user's expense"
            ]);
            return redirect()->to('/admin/expenses')->with('message', 'Expense saved successfully.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Failed to save expense.');
        }
    }

    public function delete($id)
    {
        if ($this->model->where('id', $id)->purgeDeleted()) {
        $userId = session()->get("user_id");
            $this->activities->save([
                "user_id"=>$userId,
                "activity"=> "deleted a user's expense"
            ]);
            return redirect()->to('/admin/archived/expenses')->with('message', 'Expense deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to delete expense.');
        }
    }
    public function restore($id)
    {
        if ($this->model->update($id, ['deleted_at' => null])) {
        $userId = session()->get("user_id");
            $this->activities->save([
                "user_id"=>$userId,
                "activity"=> "restored a user's expense"
            ]);
            return redirect()->to('/admin/archived/expenses')->with('message', 'Expense restored successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to update expense.');
        }
    }

    
    public function archived()
    {
        $this->data['expenses'] = $this->model->getArchived();
        $this->data['categories'] = $this->categories->findAll();
        
        $this->data['page_title'] = 'Expenses';
        $this->data['page_header'] = 'Expenses';
        $this->data['contents'] = [
            $this->folder_directory . 'archived-expenses',
        ];
        return self::render();
    }
    
    public function view($id)
    {
        $this->data['expense'] = $this->model->find($id);
        $this->data['page_title'] = 'Expenses';
        $this->data['page_header'] = 'Expenses';
        $this->data['contents'] = [
            $this->folder_directory . 'view-expense',
        ];
        return self::render();
    }
    public function index()
    {
        $this->data['expenses'] = $this->model->getExpensesWithCategories(true);
        $this->data['categories'] = $this->categories->findAll();
        $this->data['page_title'] = 'Expenses';
        $this->data['page_header'] = 'Expenses';
        $this->data['contents'] = [
            $this->folder_directory . 'expenses',
        ];
        return self::render();
    }

    public function render(): string
    {
        return view( $this->folder_directory. "index", $this->data);
    }
}