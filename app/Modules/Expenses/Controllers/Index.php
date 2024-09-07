<?php

namespace App\Modules\Expenses\Controllers;

use App\Controllers\BaseController;
use App\Modules\Expenses\Models\Expenses;

class Index extends BaseController
{
    protected $parent_directory = "Modules\\Views\\index";
    protected $folder_directory = "Modules\\Expenses\\Views\\";
    protected $model;
    protected $data = [];
    protected $rules = [];

    public function __construct()
    {
        $this->model = new Expenses;
    }

    public function index()
    {
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