<?php

namespace App\Modules\Categories\Controllers;

use App\Controllers\BaseController;
use App\Modules\Categories\Models\Categories;

class Index extends BaseController
{
    protected $parent_directory = "Modules\\Views\\index";
    protected $folder_directory = "Modules\\Categories\\Views\\";
    protected $model;
    protected $data = [];
    protected $rules = [];

    public function __construct()
    {
        $this->model = new Categories;
    }

    public function index()
    {
        $this->data['page_title'] = 'Categories';
        $this->data['page_header'] = 'Categories';
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