<?php

namespace App\Modules\Dashboard\Controllers;

use App\Controllers\BaseController;

class Index extends BaseController
{
    protected $folder_directory = "Modules\\Dashboard\\Views\\";
    protected $parent_directory = "Modules\\Views\\index";
    protected $model;
    protected $data = [];
    protected $rules = [];

    public function __construct()
    {
    }

    public function index()
    {
        $this->data['page_title'] = 'Dashboard';
        $this->data['page_header'] = 'Dashboard';
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