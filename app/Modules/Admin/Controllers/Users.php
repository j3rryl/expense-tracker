<?php

namespace App\Modules\Admin\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Modules\Activities\Models\Activities;
use App\Modules\Expenses\Models\Expenses;
use App\Modules\Categories\Models\Categories;

class Users extends BaseController
{
    protected $folder_directory = "Modules\\Admin\\Views\\";
    protected $users;
    protected $activities;
    protected $expenses;
    protected $categories;
    protected $data = [];
    protected $rules = [];

    public function __construct()
    {
        $this->users = new UserModel;
        $this->activities = new Activities;
        $this->expenses = new Expenses;
        $this->categories = new Categories;

    }

    public function update($id)
    {
        // Validate form input
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'username' => [
            'label'  => 'Username',
            'rules'  => 'required|string|is_unique[users.username,id,{id}]',
            'errors' => [
                'is_unique' => 'The {field} is already taken.'
            ]
        ]
        ]);

        if (! $this->validate($validation->getRules())) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Retrieve form data
        $data = [
            'id' => $id,
            'username' => $this->request->getPost('username')
        ];

        if ($this->users->save($data)) {
            $userId = session()->get("user_id");
            $this->activities->save([
                "user_id"=>$userId,
                "activity"=> "updated a user"
            ]);
            return redirect()->to('/admin/users')->with('message', 'User saved successfully.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Failed to save user.');
        }
    }

    public function archive($id)
    {
        if ($this->users->delete($id)) {
        $userId = session()->get("user_id");
            $this->activities->save([
                "user_id"=>$userId,
                "activity"=> "archived a user"
            ]);
            return redirect()->to('/admin/users')->with('message', 'User archived successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to delete user.');
        }
    }

    public function delete($id)
    {
        if ($this->users->where('id', $id)->purgeDeleted()) {
        $userId = session()->get("user_id");
            $this->activities->save([
                "user_id"=>$userId,
                "activity"=> "deleted a user permanently"
            ]);
            return redirect()->to('/admin/archived/users')->with('message', 'User permanently deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to delete user.');
        }
    }
    public function restore($id)
    {
        if ($this->users->update($id, ['deleted_at' => null])) {
        $userId = session()->get("user_id");
            $this->activities->save([
                "user_id"=>$userId,
                "activity"=> "restored a user"
            ]);
            return redirect()->to('/admin/archived/users')->with('message', 'User restored successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to update user.');
        }
    }

    public function archived()
    {
        if(!user_id()) {
            return redirect()->route('login');
        }
        $userId = session()->get("user_id");
        $this->data['users'] = $this->users->where('users.id !=', $userId)->onlyDeleted()->findAll();
        $this->data['page_title'] = 'Admin - Users';
        $this->data['page_header'] = 'Users';
        $this->data['contents'] = [
            $this->folder_directory . 'archived-users',
        ];
        return self::render();
    }
    public function view($id)
    {
        if(!user_id()) {
            return redirect()->route('login');
        }
        $this->data['expenses'] = $this->expenses->getExpensesByUser($id);
        $this->data['categories'] = $this->categories->findAll();

        $this->data['page_title'] = 'Admin - Users';
        $this->data['page_header'] = 'User Expenses';
        $this->data['contents'] = [
            $this->folder_directory . 'expenses',
        ];
        return self::render();
    }
    public function index()
    {
        if(!user_id()) {
            return redirect()->route('login');
        }
        $userId = session()->get("user_id");
        $this->data['users'] = $this->users->where('users.id !=', $userId)->findAll();
        $this->data['page_title'] = 'Admin - Users';
        $this->data['page_header'] = 'Users';
        $this->data['contents'] = [
            $this->folder_directory . 'users',
        ];
        return self::render();
    }

    public function render(): string
    {
        return view( $this->folder_directory . "index", $this->data);
    }
}