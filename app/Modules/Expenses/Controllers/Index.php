<?php

namespace App\Modules\Expenses\Controllers;

use App\Controllers\BaseController;
use App\Modules\Expenses\Models\Expenses;
use App\Modules\Categories\Models\Categories;

class Index extends BaseController
{
    protected $parent_directory = "Modules\\Views\\index";
    protected $folder_directory = "Modules\\Expenses\\Views\\";
    protected $model;
    protected $categories;
    protected $data = [];
    protected $rules = [];

    public function __construct()
    {
        $this->model = new Expenses;
        $this->categories = new Categories;
    }

    public function save()
    {
        // Validate form input
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'name' => 'required|string',
            'amount' => 'required|numeric',
            'category_id' => 'required|integer',
            'user_id' => 'required|integer',
            'date' => 'required',
            'description' => 'required'
        ]);

        if (! $this->validate($validation->getRules())) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Retrieve form data
        $data = [
            'name' => $this->request->getPost('name'),
            'amount' => $this->request->getPost('amount'),
            'category_id' => $this->request->getPost('category_id'),
            'user_id' => $this->request->getPost('user_id'),
            'date' => $this->request->getPost('date'),
            'description' => $this->request->getPost('description')
        ];

        if ($this->model->save($data)) {
            return redirect()->to('/expenses')->with('message', 'Expense saved successfully.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Failed to save expense.');
        }
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
            return redirect()->to('/expenses')->with('message', 'Expense saved successfully.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Failed to save expense.');
        }
    }

    public function delete($id)
    {
        if ($this->model->delete($id)) {
            return redirect()->to('/expenses')->with('message', 'Expense deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to delete expense.');
        }
    }

    public function index()
    {
        $this->data['expenses'] = $this->model->getExpensesWithCategories();
        $this->data['categories'] = $this->categories->findAll();
        $this->data['page_title'] = 'Expenses';
        $this->data['page_header'] = 'Expenses';
        $this->data['contents'] = [
            $this->folder_directory . 'index',
        ];
        return self::render('index');
    }

    public function render(string $page): string
    {
        return view( $this->parent_directory, $this->data);
    }
}