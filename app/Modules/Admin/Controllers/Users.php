<?php

namespace App\Modules\Admin\Controllers;

use App\Controllers\BaseController;

class Users extends BaseController
{
    protected $folder_directory = "Modules\\Admin\\Views\\";
    protected $model;
    protected $data = [];
    protected $rules = [];

    public function __construct()
    {
    }

    public function index()
    {
        if(!user_id()) {
            return redirect()->route('login');
        }
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