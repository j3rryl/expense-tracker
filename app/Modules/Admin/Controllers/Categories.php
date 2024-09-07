<?php

namespace App\Modules\Admin\Controllers;

use App\Controllers\BaseController;
use App\Modules\Categories\Models\Categories as CategoryModel;

class Categories extends BaseController
{
    protected $folder_directory = "Modules\\Admin\\Views\\";
    protected $model;
    protected $data = [];
    protected $rules = [];

    public function __construct()
    {
        $this->model = new CategoryModel;
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